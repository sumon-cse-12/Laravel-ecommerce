<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOrder extends Model
{
    use HasFactory;
    // protected $table = 'customer_orders';
    protected $fillable = [
        'customer_id','first_name', 'last_name', 'email','postal_code','address','city', 'mobile', 'order_notes','delivery_type','shipping','total','status'
    ];
    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id', 'id')->withDefault();
    }
     // Assuming the table name is 'customer_orders'

    // Define the relationship with order items
    public function order_items()
    {
        return $this->hasMany(OrderItem::class, 'customer_order_id');
    }
}
