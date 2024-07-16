<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['customer_id', 'product_id', 'review_text', 'rating', 'review_image'];

    use HasFactory;

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
