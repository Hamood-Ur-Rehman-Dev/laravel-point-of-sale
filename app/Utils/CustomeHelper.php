<?php

namespace App\Utils;

use App\Models\Order;

class CustomeHelper
{
    public static function generatorOrderRef()
    {
        $str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        do{
            $o_ref   = substr(str_shuffle($str),0, 3) . '-' . substr(str_shuffle($str),0, 3) . '-' . substr(str_shuffle($str),0, 3);
            $exists = Order::where('ref',$o_ref)->exists();
        }while($exists);
        return $o_ref;
    }
}