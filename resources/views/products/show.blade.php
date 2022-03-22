@extends('layouts.admin')

@section('title', 'Show Product')
@section('content-header', 'Show Product')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{Storage::url($product->image)}}" class="img-preview img-fluid rounded-circle" style="height: 150px; width: 150px; object-fit: cover" alt="Product Image">
                    <hr>
                    <h5>
                        {{$product->name}}
                    </h5>
                    <small class="badge badge-pill badge-warning">#{{$product->barcode}}</small>
                    <br>
                    <span class="badge badge-pill badge-primary">{{$product->formattedprice}}</span>
                    <span class="badge badge-pill badge-dark">Qty {{$product->quantity}}</span>
                    <span class="badge badge-pill badge-{{$product->status? 'success' : 'danger'}}">{{$product->status? 'Active' : 'InActive'}}</span>
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="card">
                <div class="card-body">
                    <h4>Description</h4>
                    <p>
                        {{$product->description}}
                    </p>
                    <hr>
                    <div class="row">
                        <div class="col-4">
                            <div class="card bg-blue">
                                <div class="card-body">
                                    <h5>Total Profit</h5>
                                    <p class="d-flex align-items-center justify-content-between p-0 m-0">
                                        <i class="fa fas fa-chart-bar"></i>
                                        <b>{{$total_profit}}</b>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card bg-red">
                                <div class="card-body">
                                    <h5>Total Sales</h5>
                                    <p class="d-flex align-items-center justify-content-between p-0 m-0">
                                        <i class="fa fas fa-chart-line"></i>
                                        <b>{{$total_sales}}</b>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card bg-info">
                                <div class="card-body">
                                    <h5>Total Orders</h5>
                                    <p class="d-flex align-items-center justify-content-between p-0 m-0">
                                        <i class="fa fas fa-boxes"></i>
                                        <b>{{$total_orders}}</b>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')

@endsection