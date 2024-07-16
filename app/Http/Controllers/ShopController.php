<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ShopController extends Controller
{
   public function index(Request $request, $categorySlug = null){
      $categorySelected = '';
      $categories= Category::where('status','active')->get();
      $products = Product::orderBy('name','ASC');
      if(!empty($categorySlug)){
         $category = Category::where("slug", $categorySlug)->first();
         $products = $products->where('category_id',$category->id)->get();
         $data['products'] = $products;
         $categorySelected = $category->id;
      }else{
         $data['products'] = $products->get();
      }
      $data['categories'] = $categories;
      $data['categorySelected'] = $categorySelected;
    return view('frontend.shop',$data);
   }
   public function product($slug){
      $product = Product::where('slug', $slug)->first();
      if(!$product){
        abort(404);
      }
      $data['categories'] = Category::all();
      $data['products'] = Product::where('status','in_stock')->limit(5)->get();
      $data['product'] = $product;


      $releted_products = Product::with('variations')->get();
      $data['releted_products'] = $releted_products;
      $data['reviews'] = Review::where('product_id', $product->id)->get();
      return view('frontend.product',$data);
   }
}
