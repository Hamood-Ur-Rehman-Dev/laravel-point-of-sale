<?php

namespace App\Models;

use App\Utils\UserRole;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'avatar', 'name', 'email', 'password', 'role', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullname()
    {
        return $this->username;
    }

    public function getIsAdminAttribute()
    {
        return $this->role === UserRole::ADMIN;
    }

    public function getUserAvatarAttribute()
    {
        if(Storage::disk('public')->exists($this->avatar)){
            return Storage::url($this->avatar);
        }
        return 'https://ui-avatars.com/api/?rounded=true&name=' . $this->name;
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
