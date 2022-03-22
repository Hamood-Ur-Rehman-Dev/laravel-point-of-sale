<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/admin');
});

Auth::routes([
    'register' => false
]);

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/pos', [HomeController::class, 'pos'])->name('pos');

    Route::resource('products', ProductController::class);
    Route::resource('orders', OrderController::class);

    Route::middleware(['check_admin'])->group(function(){
        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [SettingController::class, 'store'])->name('settings.store');

        Route::resource('users', UserController::class);
    });
});

Route::view("pos", "pos");
Route::view("receipt", "receipt");
Route::view("qr", "qr_scanner");
