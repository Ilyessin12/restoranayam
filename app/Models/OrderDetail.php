<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'subtotal',
        // Add any other fields your order_details table has
    ];
    
    // Relationship with Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    
    // Relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}