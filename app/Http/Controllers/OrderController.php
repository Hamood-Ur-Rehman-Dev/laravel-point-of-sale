<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Models\Order;
use App\Models\Product;
use App\Utils\CustomeHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function __construct()
    {
        // Only Allow Cashiers To See ALL, Create New and Show One Product
        $this->middleware('check_admin')->except(['index','create','store','show']);
    }

    public function index(Request $request) {
        $orders = new Order();

        if (!auth()->user()->isAdmin){
            $orders = $orders->where('user_id', auth()->id());
        }

        if($request->start_date) {
            $orders = $orders->where('created_at', '>=', $request->start_date);
        }
        if($request->end_date) {
            $orders = $orders->where('created_at', '<=', $request->end_date . ' 23:59:59');
        }

        $orders = $orders->with(['items'])->latest()->paginate(10);

        $total = $orders->map(function($i) {
            return $i->total();
        })->sum();

        return view('orders.index', compact('orders', 'total'));
    }

    public function store(OrderStoreRequest $request)
    {
        $items = $request->items;
        $quantities = $request->quantities;
        $prices = $request->prices;

        $response = (object)[
            'status'    => false,
            'message'   => "No Items In Cart"
        ];

        $order = Order::create([
            'ref' => CustomeHelper::generatorOrderRef(),
            'user_id' => auth()->id()
        ]);

        $response->message = "";

        for ($i=0, $iMax = count($items); $i < $iMax; $i++){
            $product     = Product::find($items[$i]);
            $ordered_qty = $quantities[$i];

            // Product Quantity Should Be Greater Than 0
            if($product && $product->quantity > 0){

                // Order Quantity Should Be Less Than or Equal To Product Quantity
                if($ordered_qty > $product->quantity){
                    $ordered_qty = $product->quantity;
                    $response->message .= " only ". $product->quantity . " '" . $product->name. "' are added to order," ;
                }

                $order->items()->create([
                    'price' => $prices[$i],
                    'quantity' => $ordered_qty,
                    'product_id' => $items[$i],
                ]);

                $updated_product_data = [
                    'quantity' => $product->quantity - $quantities[$i]
                ];

                $product->update($updated_product_data);
            }

        }


        $response->status   = true;
        $response->message  = "Order Created," . $response->message;
        $response->order    = $order;

        return response()->json($response);
    }

    public function show(Order $order){
        return view('orders.show', compact('order'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return JsonResponse
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
