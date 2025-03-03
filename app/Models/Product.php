<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        // Add any other fields your product table has
    ];
    
    // Relationship with OrderDetails
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
    
    // Relationship with StockMovements
    public function stockMovements()
    {
        return $this->hasMany(StockMovement::class);
    }
}