<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_order_id','product_id','quantity','price','weight'
    ];
    public function customer_order(){
        return $this->belongsTo(CustomerOrder::class, 'customer_order_id', 'id')->withDefault();
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id')->withDefault();
    }
}
