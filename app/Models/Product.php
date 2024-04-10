<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'slug','image', 'short_description','description', 'meta_title','meta_description', 'meta_keywords', 'status','offer'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function variations()
    {
        return $this->hasMany(ProductVariation::class, 'product_id', 'id');
    }
}
