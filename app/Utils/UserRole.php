<?php

namespace App\Utils;

class UserRole
{
    const ADMIN = 0;
    const CASHIER = 1;

    const ALL = [
        self::ADMIN => "Admin",
        self::CASHIER => "Cashier"
    ];
}