<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index(){
    
        return view('admin.product.index');
    }
    public function create(){
        $data['categories'] = Category::where('status','active')->get();
        return view('admin.product.create',$data);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'product_image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'discount_price.*' => 'required',
            'weight.*' => 'required',
            'status' => 'required|in:in_stock,stock_out',
        ]);
    
        $request['slug'] = Str::slug($request->name, '-');
        DB::beginTransaction();
        
        try {
            $product = new Product();
            $product->name = $request->name;
            $product->slug = $request['slug'];
            $product->description = $request->description;
            $product->short_description = $request->short_description;
            $product->category_id = $request->category_id;
            $product->status = $request->status;
            $product->meta_title = $request->meta_title;
            $product->meta_description = $request->meta_description;
            $product->meta_keywords = $request->meta_keywords;

            $all_images = [];
            foreach ($request->file('product_image') as $key => $file) {
                $product_image_name = time() . $key . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('/uploads'), $product_image_name);
                $all_images[] = ['image' => $product_image_name];
            }
            $product->image = json_encode($all_images);
            
            $product->save();
            $productVariantsData = [];

            foreach ($request->weight as $key => $weight) {
                $productVariantsData[] = [
                    'product_id' => $product->id, 
                    'weight' => $request->weight[$key],
                    'discount_price' => $request->discount_price[$key],
                    'type' => $request->type[$key],
                    'category_id' => $request->category_id,
                    'regular_price' => $request->regular_price[$key]
                ];
            }

            ProductVariation::insert($productVariantsData);
            DB::commit();
            
            return back()->with('success', 'Product successfully created');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Error occurred while creating the product.');
        }
    }
    
    
    public function getAll(){
        $products = Product::all();
        return datatables()->of($products)
        
        ->addColumn('name', function ($q) {
    
            return $q->name;
        })

            ->addColumn('description', function ($q) {
                $limit =  (strip_tags($q->description));
                return substr($limit,0,100);
            })
            ->addColumn('image', function ($q) {
                $image = '<img class="img-demo-setting" src="'.asset('uploads/'.$q->image).'" alt="">';
                return $image;
            })

            ->addColumn('created_at', function ($q) {
                $time = new Carbon($q->created_at);
               
                return $time;
            })

            ->addColumn('action',function($q){   
                return '
                <a class="btn btn-info btn-sm m-1" href=' . route('admin.product.edit', [$q->id]) . '><i class="fas fa-edit" aria-hidden="true"></i></a>'.
                                        '<a class="btn btn-danger btn-sm" href="#" data-message="Are you sure you want to delete ?"
                                        data-action='.route('admin.product.destroy',[$q]).'
                                        data-input={"_method":"delete"}
                                        data-toggle="modal" data-target="#modal-confirm" ><i class="fa fa-times-circle" aria-hidden="true"></i></a>' ;
            })
            ->rawColumns(['image','action'])
            ->toJson();
    }
    public function edit(Product $product)
    {   $data['categories'] = Category::where('status','active')->get();
        $data['product'] = $product;
        $data['productVariations'] = $product->variations()->get();
        return view('admin.product.edit', $data);
    }

    public function update(Product $product,Request $request) {
        $request->validate([
            'name' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'product_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'discount_price.*' => 'required',
            'weight.*' => 'required',
            'status' => 'required|in:in_stock,stock_out',
        ]);
        DB::beginTransaction();
    
        try {
            $product = Product::findOrFail($product->id);
            $product->name = $request->name;
            $product->slug = Str::slug($request->name, '-');
            $product->description = $request->description;
            $product->short_description = $request->short_description;
            $product->category_id = $request->category_id;
            $product->status = $request->status;
            $product->meta_title = $request->meta_title;
            $product->meta_description = $request->meta_description;
            $product->meta_keywords = $request->meta_keywords;

            if ($request->hasFile('product_image')) {
                $all_images = [];
                foreach ($request->file('product_image') as $key => $file) {
                    $product_image_name = time() . $key . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('/uploads'), $product_image_name);
                    $all_images[] = ['image' => $product_image_name];
                }
                $product->image = json_encode($all_images);
            }
    
            $product->save();
            ProductVariation::where('product_id', $product->id)->delete();
            $productVariantsData = [];
            foreach ($request->weight as $key => $weight) {
                $productVariantsData[] = [
                    'product_id' => $product->id,
                    'weight' => $request->weight[$key],
                    'discount_price' => $request->discount_price[$key],
                    'type' => $request->type[$key],
                    'category_id' => $request->category_id,
                    'regular_price' => $request->regular_price[$key]
                ];
            }
            ProductVariation::insert($productVariantsData);
            DB::commit();
    
            return back()->with('success', 'Product successfully updated');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Error occurred while updating the product.');
        }
    }

    public function destroy(Product $product){
        DB::beginTransaction();
        try{
            $product = Product::find($product->id);
            $product_variant = ProductVariation::where('product_id', $product->id)->delete();
            $product->delete();

            DB::commit();
            return back()->with('success', 'Product successfully deleted');

        }
        catch(\Exception $e){
              // Rollback the transaction if an error occurs
              DB::rollback();
              return back()->with('error', 'Error occurred while updating the product.');

        }
    }
}