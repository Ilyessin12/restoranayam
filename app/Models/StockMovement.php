<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'product_id',
        'movement_type',
        'quantity',
        'movement_date',
    ];
    
    // Relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}