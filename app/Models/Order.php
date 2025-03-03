<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_date',
        'total_price',
        'status',
        // Add any other fields your order table has
    ];
    
    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // Relationship with OrderDetails
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}