<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function total()
    {
        return $this->items->map(function ($i){
            return $i->price * $i->quantity;
        })->sum();
    }

    public function getFormattedTotalAttribute()
    {
        return config('settings.currency_symbol') . ' ' . number_format($this->total(), 2);
    }

}
