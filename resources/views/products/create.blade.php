@extends('layouts.admin')

@section('title', 'Create Product')
@section('content-header', 'Create Product')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body text-center">
                                    <label for="image">
                                        <img src="{{asset('images/no_image.jpg')}}" class="img-preview img-fluid rounded-circle" style="height: 150px; width: 150px; object-fit: cover" alt="Product Image">
                                    </label>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="custom-file text-left">
                                                <input type="file" class="custom-file-input" name="image" id="image" onchange="imagePreview(event)">
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                            @error('image')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                                                   placeholder="i.e Burger" value="{{ old('name') }}">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="barcode">Barcode</label>
                                            <input type="text" name="barcode" class="form-control @error('barcode') is-invalid @enderror" id="barcode"
                                                   placeholder="i.e 115476291" value="{{ old('barcode') }}">
                                            @error('barcode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="price">Price</label>
                                            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price"
                                                   placeholder="i.e 100" value="{{ old('price') }}">
                                            @error('price')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="quantity">Quantity</label>
                                            <input type="number" min="0" name="quantity" class="form-control @error('quantity') is-invalid @enderror" id="quantity"
                                                   placeholder="i.e 10" value="{{ old('quantity') }}">
                                            @error('quantity')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="status">Status</label>
                                            <select name="status" class="form-control @error('status') is-invalid @enderror" id="status">
                                                <option value="1" {{ old('status') === 1 ? 'selected' : ''}}>Active</option>
                                                <option value="0" {{ old('status') === 0 ? 'selected' : ''}}>Inactive</option>
                                            </select>
                                            @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label for="description">Description</label>
                                            <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                                      id="description"
                                                      placeholder="i.e some details about product">{{ old('description') }}</textarea>
                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success">Create</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection