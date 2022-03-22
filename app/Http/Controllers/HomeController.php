<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->isAdmin){
            $orders = Order::with(['items'])->get();
        }else{
            $orders = auth()->user()->orders;
        }

        $customers_count = User::count();

        return view('home', [
            'orders_count' => $orders->count(),
            'income' => $orders->map(function($i) {
                return $i->total();
            })->sum(),
            'income_today' => $orders->where('created_at', '>=', date('Y-m-d').' 00:00:00')->map(function($i) {
                return $i->total();
            })->sum(),
            'customers_count' => $customers_count
        ]);
    }

    public function pos(){
        $products = Product::all();
        return view('cart.pos', compact('products'));
    }
}
