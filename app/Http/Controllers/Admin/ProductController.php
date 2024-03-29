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
    // public function store(Request $request){
    //     // dd($request->all());
    //     $request->validate([
    //         'name' => 'required',
    //         'short_description' => 'required',
    //         'description' => 'required',
    //         'category_id' => 'required',
    //         'product_image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'discount_price' => 'required',
    //         'weight' => 'required',
    //         'status' => 'required|in:in_stock,stock_out',
    //     ]);

    //     $request['slug']=Str::slug($request->name, '-');
    //     $product = new Product();
    //     $product->name = $request->name;
    //     $product->slug = $request['slug'];
    //     $product->description = $request->description;
    //     $product->short_description = $request->short_description;
    //     $product->category_id = $request->category_id;
    //     $product->status = $request->status;   
    //     $all_images = [];
    //     foreach ($request->file('product_image') as $key => $file) {
    //         $product_image_name = time() . $key . '.' . $file->getClientOriginalExtension();
    //         $file->move(public_path('/uploads'), $product_image_name);
    //         $all_images[] = ['image' => $product_image_name];
    //     }
    //     $product->image = json_encode($all_images);
    //     $all_variant_images = [];
    //     foreach ($request->file('variant_image') as $key => $file) {
    //         $product_variant_image_name = time() . $key . '.v' . $file->getClientOriginalExtension();
    //         $file->move(public_path('/uploads'), $product_variant_image_name);
    //         $all_variant_images[] = ['variant_image' => $product_variant_image_name];
    //     }
    //     $product_variant = new ProductVariation();
    //     $product->variant_image = json_encode($all_variant_images);
        
    //     $product_variant->weight = $request->weight;   
    //     $product_variant->discount_price = $request->discount_price;   
    //     $product_variant->type = $request->type;   
    //     $product_variant->regular_price = $request->regular_price;   
    //     $product->meta_description = $request->meta_description;   
    //     $product->meta_keywords = $request->meta_keywords;   
    //     $product->save();
        
    //     return back()->with('success', 'Product successfully created');
    // }

   // Import DB facade

    // public function store(Request $request) {
    //     $request->validate([
    //         'name' => 'required',
    //         'short_description' => 'required',
    //         'description' => 'required',
    //         'category_id' => 'required',
    //         'product_image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'discount_price.*' => 'required',
    //         'weight.*' => 'required',
    //         'status' => 'required|in:in_stock,stock_out',
    //     ]);
    
    //     $request['slug'] = Str::slug($request->name, '-');
        
    //     // Start a database transaction
    //     DB::beginTransaction();
        
    //     try {
    //         // Save Product
    //         $product = new Product();
    //         $product->name = $request->name;
    //         $product->slug = $request['slug'];
    //         $product->description = $request->description;
    //         $product->short_description = $request->short_description;
    //         $product->category_id = $request->category_id;
    //         $product->status = $request->status;
    //         $product->meta_description = $request->meta_description;
    //         $product->meta_keywords = $request->meta_keywords;
    
    //         // Save Product Images
    //         $all_images = [];
    //         foreach ($request->file('product_image') as $key => $file) {
    //             $product_image_name = time() . $key . '.' . $file->getClientOriginalExtension();
    //             $file->move(public_path('/uploads'), $product_image_name);
    //             $all_images[] = ['image' => $product_image_name];
    //         }
    //         $product->image = json_encode($all_images);
            
    //         $product->save();
    
    //         // Save Product Variations
    //         foreach ($request->weight as $key => $weight) {
    //             $product_variant = new ProductVariation();
    //             $product_variant->product_id = $product->id; // Assuming product_id is a foreign key
    //             $product_variant->weight = $request->weight[$key];
    //             $product_variant->discount_price = $request->discount_price[$key];
    //             $product_variant->type = $request->type[$key];
    //             $product_variant->category_id = $request->category_id;
    //             $product_variant->regular_price = $request->regular_price[$key];
              
    //             // Save Product Variant Images
    //             $all_variant_images = [];
    //             foreach ($request->file('variant_image_name') as $file) {
    //                 $product_variant_image_name = time() . $key . '.v' . $file->getClientOriginalExtension();
    //                 $file->move(public_path('/uploads'), $product_variant_image_name);
    //                 $all_variant_images[] = ['variant_image' => $product_variant_image_name];
    //             }
    //             $product_variant->variant_image = json_encode($all_variant_images);
    //             dd( $product_variant);
    //             $product_variant->save();
    //         }
    
    //         // Commit the transaction if all operations succeed
    //         DB::commit();
            
    //         return back()->with('success', 'Product successfully created');
    //     } catch (\Exception $e) {
    //         dd($e);
    //         // Rollback the transaction if an error occurs
    //         DB::rollback();
    //         return back()->with('error', 'Error occurred while creating the product.');
    //     }
    // }
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
        
        // Start a database transaction
        DB::beginTransaction();
        
        try {
            // Save Product
            $product = new Product();
            $product->name = $request->name;
            $product->slug = $request['slug'];
            $product->description = $request->description;
            $product->short_description = $request->short_description;
            $product->category_id = $request->category_id;
            $product->status = $request->status;
            $product->meta_description = $request->meta_description;
            $product->meta_keywords = $request->meta_keywords;
    
            // Save Product Images
            $all_images = [];
            foreach ($request->file('product_image') as $key => $file) {
                $product_image_name = time() . $key . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('/uploads'), $product_image_name);
                $all_images[] = ['image' => $product_image_name];
            }
            $product->image = json_encode($all_images);
            
            $product->save();
    
            // Save Product Variations
            foreach ($request->weight as $key => $weight) {
                $product_variant = new ProductVariation();
                $product_variant->product_id = $product->id; // Assuming product_id is a foreign key
                $product_variant->weight = $request->weight[$key];
                $product_variant->discount_price = $request->discount_price[$key];
                $product_variant->type = $request->type[$key];
                $product_variant->category_id = $request->category_id;
                $product_variant->regular_price = $request->regular_price[$key];
              
                // Save Product Variant Images
                if ($request->hasFile('variant_image_name')) {
                    $product_variant_image_name = time() . $key . '_v.' . $request->file('variant_image_name')[$key]->getClientOriginalExtension();
                    $request->file('variant_image_name')[$key]->move(public_path('/uploads'), $product_variant_image_name);
                    $product_variant->variant_image = json_encode(['variant_image' => $product_variant_image_name]);
                }
                
                $product_variant->save();
            }
    
            // Commit the transaction if all operations succeed
            DB::commit();
            
            return back()->with('success', 'Product successfully created');
        } catch (\Exception $e) {
            // Rollback the transaction if an error occurs
            DB::rollback();
            return back()->with('error', 'Error occurred while creating the product.');
        }
    }
    
    
    
    
    public function getAll(){
        $products = Product::all();
        // dd($products->get());
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

    // public function update(Product $product,Request $request){
    //     $request->validate([
    //         'name' => 'required',
    //         'short_description' => 'required',
    //         'description' => 'required',
    //         'category_id' => 'required',
    //         'discount_price' => 'required',
    //         'weight' => 'required',
    //         'status'=>'required|in:in_stock,stock_out'
    //     ]);

    //     $request['slug'] = Str::slug($request->name, '-');
        
    //     // Start a database transaction
    //     DB::beginTransaction();
        
    //     try {
    //             $product = Product::find($product->id);

    //                         // Update the attributes of the product
    //             $product->update([
    //                 'name' => $request->name,
    //                 'slug' => $request['slug'],
    //                 'description' => $request->description,
    //                 'short_description' => $request->short_description,
    //                 'category_id' => $request->category_id,
    //                 'status' => $request->status,
    //                 'meta_description' => $request->meta_description,
    //                 'meta_keywords' => $request->meta_keywords,
    //                 ]);
    
    //     if ($request->hasFile('product_image')) {
    //         $productImages = [];
    //         foreach ($request->file('product_image') as $key => $file) {
    //             $product_image_name = time() . $key . '.' . $file->getClientOriginalExtension();
    //             $file->move(public_path('/uploads'), $product_image_name);
    //             $productImages[] = ['image' => $product_image_name];
    //         }
    //         $product->update(['image' => json_encode($productImages)]);
    //     }

    //     $product_variants = ProductVariation::where('product_id',$product->id)->pluck('product_id');
    //     foreach ($request->weight as $key => $weight) {
    //         $product_variant = ProductVariation::find($product_variants);
    //         dd( $product_variant);
    //         $product_variant->product_id = $product_variant->product_id; // Assuming product_id is a foreign key
    //         $product_variant->weight = $request->weight[$key];
    //         $product_variant->discount_price = $request->discount_price[$key];
    //         $product_variant->type = $request->type[$key];
    //         $product_variant->category_id = $request->category_id;
    //         $product_variant->regular_price = $request->regular_price[$key];

    //         // Save Product Variant Images
    //         if ($request->hasFile('variant_image_name')) {
    //             $product_variant_image_name = time() . $key . '_v.' . $request->file('variant_image_name')[$key]->getClientOriginalExtension();
    //             $request->file('variant_image_name')[$key]->move(public_path('/uploads'), $product_variant_image_name);
    //             $product_variant->variant_image = json_encode(['variant_image' => $product_variant_image_name]);
    //         }

    //         // Save the ProductVariation instance
    //         $product_variant->save();
    //     }

    
    //         // Commit the transaction if all operations succeed
    //         DB::commit();
            
    //         return back()->with('success', 'Product successfully updated');
    //     } catch (\Exception $e) {
    //         dd($e);
    //         // Rollback the transaction if an error occurs
    //         DB::rollback();
    //         return back()->with('error', 'Error occurred while creating the product.');
    //     }
    // }
    public function update(Product $product,Request $request) {
        // dd($request->all());
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
    
        $request['slug'] = Str::slug($request->name, '-');
    
        // Start a database transaction
        DB::beginTransaction();
    
        try {
            // Find the product by ID
            $product = Product::findOrFail($product->id);
    
            // Update Product
            $product->name = $request->name;
            $product->slug = $request['slug'];
            $product->description = $request->description;
            $product->short_description = $request->short_description;
            $product->category_id = $request->category_id;
            $product->status = $request->status;
            $product->meta_description = $request->meta_description;
            $product->meta_keywords = $request->meta_keywords;
    
            // Update Product Images
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
            if($request->weight){
                foreach ($request->weight as $key => $weight) {
                    $product_variant = ProductVariation::where('product_id', $product->id)
                        ->where('weight', $request->weight[$key])
                        ->first();
                    if ($product_variant) {
                        $product_variant->discount_price = $request->discount_price[$key];
                        $product_variant->type = $request->type[$key];
                        $product_variant->category_id = $request->category_id;
                        $product_variant->regular_price = $request->regular_price[$key];
                        $product_variant->weight = $request->weight[$key];
                        $product_variant->save();
                    } else {
                        // Handle the case where the product variant doesn't exist
                        // You might want to create a new product variant in this case
                    }
                }
            }
            
        
    
            // Commit the transaction if all operations succeed
            DB::commit();
    
            return back()->with('success', 'Product successfully updated');
        } catch (\Exception $e) {
            dd($e);
            // Rollback the transaction if an error occurs
            DB::rollback();
            return back()->with('error', 'Error occurred while updating the product.');
        }
    }
    
    public function update_product(Product $product, Request $request) {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'discount_price' => 'required',
            'weight' => 'required',
            'status' => 'required|in:in_stock,stock_out'
        ]);
    
        $request['slug'] = Str::slug($request->name, '-');
    
        // Start a database transaction
        DB::beginTransaction();
    
        try {
            $product = Product::find($product->id);
    
            // Update the attributes of the product
            $product->update([
                'name' => $request->name,
                'slug' => $request['slug'],
                'description' => $request->description,
                'short_description' => $request->short_description,
                'category_id' => $request->category_id,
                'status' => $request->status,
                'meta_description' => $request->meta_description,
                'meta_keywords' => $request->meta_keywords,
            ]);
    
            // Update or create product images
            if ($request->hasFile('product_image')) {
                $productImages = [];
                foreach ($request->file('product_image') as $key => $file) {
                    $product_image_name = time() . $key . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('/uploads'), $product_image_name);
                    $productImages[] = ['image' => $product_image_name];
                }
                $product->update(['image' => json_encode($productImages)]);
            }
    
                $tessstt=[];
                // dd($request->weight);
            // Update or create product variants
            $product_variants = ProductVariation::where('product_id', $product->id)->get();

            foreach ($request->weight as $key => $weight) {
              
                $product_variant = $product_variants->where('weight', $weight)->first();
            if ($product_variant) {
                // dd('psppsps');
                $product_variant->update([
                    'weight' => $request->weight[$key],
                    'discount_price' => $request->discount_price[$key],
                    'type' => $request->type[$key],
                    'category_id' => $request->category_id,
                    'regular_price' => $request->regular_price[$key],
                ]);
                // Save Product Variant Images if provided
                if ($request->hasFile('variant_image_name') && $request->file('variant_image_name')[$key]) {
                    $product_variant_image_name = time() . $key . '_v.' . $request->file('variant_image_name')[$key]->getClientOriginalExtension();
                    $request->file('variant_image_name')[$key]->move(public_path('/uploads'), $product_variant_image_name);
                    $product_variant->variant_image = json_encode(['variant_image' => $product_variant_image_name]);
                    $product_variant->save();
                }
            }
        }

            // Commit the transaction if all operations succeed
            DB::commit();
    
            return back()->with('success', 'Product successfully updated');
        } catch (\Exception $e) {
            // Rollback the transaction if an error occurs
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