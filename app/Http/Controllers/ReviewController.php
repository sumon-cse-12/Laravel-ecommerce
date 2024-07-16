<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\Review;
class ReviewController extends Controller
{
   public function add_review(Request $request){

    $request->validate([
        'customer_id' => 'required|integer|exists:customers,id',
        'product_id' => 'required',
        'rating' => 'required|integer|min:1|max:5',
        'review_text' => 'required|string|max:1000',
        'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image
    ]);
    $customer = Customer::findOrFail($request->customer_id);

    $fileName = '';
    if ($request->hasFile('product_image')) {
        $file = $request->file('product_image');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('/uploads'), $fileName);
    }
    // Save the review
    $review = new Review();
    $review->customer_id = $request->customer_id;
    $review->product_id = $request->product_id;
    $review->rating = $request->rating;
    $review->review_text = $request->review_text;
    $review->review_image = $fileName;
    $review->save();

    return redirect()->back()->with('success', 'Review submitted successfully!');
   }
}
