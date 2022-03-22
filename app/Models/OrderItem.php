<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable =[
        'price',
        'quantity',
        'product_id',
        'order_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getFormattedPriceAttribute(): string
    {
        return config('settings.currency_symbol') . ' ' . number_format($this->price, 2);
    }
}
