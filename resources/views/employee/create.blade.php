@extends('layouts.admin')

@section('title', 'Add Employee')
@section('content-header', 'Add Employee')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
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
                                                <input type="file" class="custom-file-input" name="avatar" id="image" onchange="imagePreview(event)">
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                            @error('avatar')
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
                                                   placeholder="i.e John Doe" value="{{ old('name') }}">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="phone">Phone</label>
                                            <input type="text" phone="phone" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                                   placeholder="i.e +44xxxxxxxxx" value="{{ old('phone') }}">
                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                                   placeholder="i.e john@pos.com" value="{{ old('email') }}">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password"
                                                   placeholder="i.e StrongPassword123" value="{{ old('password') }}">
                                            @error('password')
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
