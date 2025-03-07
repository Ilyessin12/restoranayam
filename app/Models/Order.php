<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_date',
        'total',
        'status',
    ];

    // ✅ Cast order_date as a Carbon instance
    protected $casts = [
        'order_date' => 'datetime',
    ];

    // ✅ If needed, create a formatted date accessor
    public function getFormattedOrderDateAttribute()
    {
        return Carbon::parse($this->order_date)->format('Y-m-d');
    }
	
	public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
