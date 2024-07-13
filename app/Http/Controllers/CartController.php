<?php

namespace App\Http\Controllers;


use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
//     public function addToCart(Request $request){

//         $cart = session()->get('cart');

//         $data = $request->session()->all();
//         $product = Product::findOrFail($request->product_id);
//         if(!$product){
//             return response()->json([
//                 'status' => 'false',
//                 'message'=> 'Product Not Found'
//             ]);
//         }

//         if (isset($cart[$product->id])) {
//             $cart[$product->id]['quantity'] += 1;
//         } else {
//             $cart[$product->id] = [
//                 "id" => $product->id,
//                 "name" => $product->name,
//                 "quantity" => 1,
//                 "price" => 670,
//                 "discount_price" => $request->product_price,
//                 "weight" => $request->product_weight
//             ];
//         }
//         session()->put('cart', $cart);
//         return response()->json(['status' => 'true','message' => 'Product added to your cart']);


// }

public function addToCart(Request $request){
    // dd($request->all());
    // Retrieve the cart from the session
    $cart = session()->get('cart');

    // Find the product by its ID
    $product = Product::find($request->product_id);

    // Check if the product exists
    if(!$product){
        return response()->json([
            'status' => 'false',
            'message'=> 'Product Not Found'
        ]);
    }

    // Generate a unique identifier for the cart item
    $product_id = trim($product->id);
    $product_weight = trim(str_replace(' ', '_', $request->product_weight));
    $cartItemId = $product_id . '_' . $product_weight;
    // If the cart already contains this item, increment its quantity
    if (isset($cart[$cartItemId])) {
        $cart[$cartItemId]['quantity'] += 1;
    } else {
        // Otherwise, add a new item to the cart
        $cart[$cartItemId] = [
            "id" => $product->id,
            "name" => $product->name,
            "quantity" => 1,
            "price" => 670,
            "discount_price" => $request->product_price,
            "weight" => $request->product_weight,
            "cart_item" => $cartItemId,
        ];
    }

    // Update the cart in the session
    session()->put('cart', $cart);

    // Return a response indicating success
    return response()->json(['status' => 'true','message' => 'Product added to your cart']);
}

    public function cart(){
        $data['cart_products'] = [];
        if(session()->has('cart')){
            $data['cart_products'] = session()->get('cart');
        }

        return view('frontend.cart', $data);
    }
    public function update_cart(Request $request){
        if(session()->has('cart')){
            $cart = session()->get('cart');
            // dd($cart);
            // Check if the item with the given rowId already exists in the cart
            $existingItem = $cart[$request->rowId] ?? null;
            $product = Product::find($request->product_id);
            if($existingItem) {
                // If the item exists, update its quantity
                if($existingItem['quantity']>$request->quantity){
                    // dd('papapa');
                    $existingItem['quantity'] -= 1;
                }else{
                    $existingItem['quantity'] += 1;
                }

                $cart[$request->rowId] = $existingItem;
            } else {
                // If the item doesn't exist, add it to the cart
                $cart[$request->rowId] = [
                    "id" => $request->rowId,
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->regular_price,
                    "discount_price" => $product->discount_price,
                    "weight" => $product->weight,
                    "cart_item" => $existingItem
                ];
            }
        } else {
            // If the cart doesn't exist in the session, create a new one
            $cart = [
                $request->rowId => [
                    "id" => $request->rowId,
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->regular_price,
                    "discount_price" => $product->discount_price,
                    "weight" => $request->product_weight
                ]
            ];
        }

        // Update the cart in the session
        session()->put('cart', $cart);

        // Retrieve the updated cart from the session
        $cart = session()->get('cart');
       $message = 'Cart updated successfully';
    //    session()->flash('success', $message);
       return response ()->json([
        'status'=> true,
        'message'=> $message
       ]);

    }
    public function update_c3art(Request $request) {
        $cart = session()->get('cart', []);

        dd($cart);

        $existingItem = $cart[$request->rowId] ?? null;

        if ($existingItem) {
            // Update quantity
            $existingItem['quantity'] = $request->quantity > $existingItem['quantity'] ? $existingItem['quantity'] + 1 : $existingItem['quantity'] - 1;
        } else {
            // Add new item to cart
            $product = Product::find($request->rowId);

            if (!$product) {
                return response()->json([
                    'status' => false,
                    'message'=> 'Product not found'
                ]);
            }

            $cart[$request->rowId] = [
                "id" => $request->rowId,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->regular_price,
                "discount_price" => $product->discount_price,
                "weight" => $product->weight
            ];
        }

        session()->put('cart', $cart);

        return response()->json([
            'status'=> true,
            'message'=> 'Cart updated successfully'
        ]);
    }

    public function delete_cart(Request $request){
        // $itemInfo = Cart::find($request->rowId);
        // $itemInfo = Cart::get($request->rowId);
        // if($itemInfo == null){
        //     $error_message = 'Item Not Found';
        //     session()->flash('error', $error_message);
        //     return response()->json([
        //         'status'=> false,
        //         'message'=> $error_message
        //     ]);
        // }
        // Cart::remove($request->rowId);
        if(session()->has('cart')){
            $cart = session()->get('cart');

            // Check if the item with the given rowId exists in the cart
            if(isset($cart[$request->rowId])) {
                // Remove the item from the cart
                unset($cart[$request->rowId]);

                // Update the cart in the session
                session()->put('cart', $cart);
            }
        }

        $message = 'Cart deleted successfully';
        session()->flash('success', $message);
        return response ()->json([
         'status'=> true,
         'message'=> $message
        ]);

     }

     public function checkout(){
        $data['cart_products'] = [];
        if(session()->has('cart')){
            $data['cart_products'] = session()->get('cart');
        }
            return view('frontend.checkout',$data);
     }
}
