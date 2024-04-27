<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id','category_id','image','weight','regular_price', 'discount_price','type'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id')->withDefault();
    }
}
