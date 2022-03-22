@extends('layouts.admin')

@section('title', 'Order Details')
@section('content-header', 'Order Details')
@section('content-actions')
    <a href="{{route('orders.index')}}" class="btn btn-primary">All Orders</a>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5>#{{$order->ref}}</h5>
                            <b>{{$order->created_at->format('M d, Y - H:i a')}}</b>
                            <h4>{{$order->formattedTotal}}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4>
                            Cashier: {{$order->user->name}}
                        </h4>
                        <ul style="list-style: none;" class="p-0">
                            @foreach($order->items as $order_item)
                                <li class="d-flex align-items-center mb-2 bg-light p-2">
                                    <div class="mr-2">
                                        <img src="{{\Illuminate\Support\Facades\Storage::url($order_item->product->image)}}" alt="Image" style="width: 100px" class="img-fluid">
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between w-100">
                                        <div>
                                            <h4>{{$order_item->product->name}}</h4>
                                            <p>{{$order_item->formatted_price}} <small>x {{$order_item->quantity}}</small></p>
                                        </div>
                                        <h4>{{config('settings.currency_symbol') . ' ' . number_format($order_item->price * $order_item->quantity, 2)}}</h4>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection