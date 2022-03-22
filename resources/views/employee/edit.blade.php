@extends('layouts.admin')

@section('title', 'Update Employee')
@section('content-header', 'Update Employee')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body text-center">
                                    <label for="image">
                                        <img src="{{$user->user_avatar}}" class="img-preview img-fluid rounded-circle" style="height: 150px; width: 150px; object-fit: cover" alt="Employee Avatar">
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
                                                   placeholder="i.e John Doe" value="{{ old('name', $user->name) }}">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="phone">Phone</label>
                                            <input name="phone" type="text" phone="phone" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                                   placeholder="i.e +44xxxxxxxxx" value="{{ old('phone', $user->phone) }}">
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
                                                   placeholder="i.e john@pos.com" value="{{ old('email', $user->email) }}">
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
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

{{--    <div class="card">--}}
{{--        <div class="card-body">--}}

{{--            <form action="{{ route('employee.update', $customer) }}" method="POST" enctype="multipart/form-data">--}}
{{--                @csrf--}}
{{--                @method('PUT')--}}

{{--                <div class="form-group">--}}
{{--                    <label for="first_name">First Name</label>--}}
{{--                    <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror"--}}
{{--                           id="first_name"--}}
{{--                           placeholder="First Name" value="{{ old('first_name', $customer->first_name) }}">--}}
{{--                    @error('first_name')--}}
{{--                    <span class="invalid-feedback" role="alert">--}}
{{--                        <strong>{{ $message }}</strong>--}}
{{--                    </span>--}}
{{--                    @enderror--}}
{{--                </div>--}}

{{--                <div class="form-group">--}}
{{--                    <label for="last_name">Last Name</label>--}}
{{--                    <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror"--}}
{{--                           id="last_name"--}}
{{--                           placeholder="Last Name" value="{{ old('last_name', $customer->last_name) }}">--}}
{{--                    @error('last_name')--}}
{{--                    <span class="invalid-feedback" role="alert">--}}
{{--                        <strong>{{ $message }}</strong>--}}
{{--                    </span>--}}
{{--                    @enderror--}}
{{--                </div>--}}

{{--                <div class="form-group">--}}
{{--                    <label for="email">Email</label>--}}
{{--                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email"--}}
{{--                           placeholder="Email" value="{{ old('email', $customer->email) }}">--}}
{{--                    @error('email')--}}
{{--                    <span class="invalid-feedback" role="alert">--}}
{{--                        <strong>{{ $message }}</strong>--}}
{{--                    </span>--}}
{{--                    @enderror--}}
{{--                </div>--}}

{{--                <div class="form-group">--}}
{{--                    <label for="phone">Phone</label>--}}
{{--                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone"--}}
{{--                           placeholder="Phone" value="{{ old('phone', $customer->phone) }}">--}}
{{--                    @error('phone')--}}
{{--                    <span class="invalid-feedback" role="alert">--}}
{{--                        <strong>{{ $message }}</strong>--}}
{{--                    </span>--}}
{{--                    @enderror--}}
{{--                </div>--}}

{{--                <div class="form-group">--}}
{{--                    <label for="address">Address</label>--}}
{{--                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"--}}
{{--                           id="address"--}}
{{--                           placeholder="Address" value="{{ old('address', $customer->address) }}">--}}
{{--                    @error('address')--}}
{{--                    <span class="invalid-feedback" role="alert">--}}
{{--                        <strong>{{ $message }}</strong>--}}
{{--                    </span>--}}
{{--                    @enderror--}}
{{--                </div>--}}

{{--                <div class="form-group">--}}
{{--                    <label for="avatar">Avatar</label>--}}
{{--                    <div class="custom-file">--}}
{{--                        <input type="file" class="custom-file-input" name="avatar" id="avatar">--}}
{{--                        <label class="custom-file-label" for="avatar">Choose file</label>--}}
{{--                    </div>--}}
{{--                    @error('avatar')--}}
{{--                    <span class="invalid-feedback" role="alert">--}}
{{--                    <strong>{{ $message }}</strong>--}}
{{--                </span>--}}
{{--                    @enderror--}}
{{--                </div>--}}


{{--                <button class="btn btn-primary" type="submit">Update</button>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection

@section('js')
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection
