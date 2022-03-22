<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'barcode',
        'price',
        'quantity',
        'status'
    ];

    public function getFormattedPriceAttribute(): string
    {
        return config('settings.currency_symbol') . ' ' . number_format($this->price, 2);
    }
}
