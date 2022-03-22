@extends('layouts.admin')

@section('title', 'Update Settings')
@section('content-header', 'Update Settings')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('settings.store') }}" method="post">
                @csrf

                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="app_name">App name</label>
                        <input type="text" name="app_name" class="form-control @error('app_name') is-invalid @enderror" id="app_name"
                               placeholder="App name" value="{{ old('app_name', config('settings.app_name')) }}">
                        @error('app_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="currency_symbol">Currency symbol</label>
                        <input type="text" name="currency_symbol" class="form-control @error('currency_symbol') is-invalid @enderror" id="currency_symbol"
                               placeholder="Currency symbol" value="{{ old('currency_symbol', config('settings.currency_symbol')) }}">
                        @error('currency_symbol')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="app_description">App description</label>
                        <textarea name="app_description" class="form-control @error('app_description') is-invalid @enderror" id="app_description"
                                  placeholder="App description">{{ old('app_description', config('settings.app_description')) }}</textarea>
                        @error('app_description')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                </div>

                <hr>
                <h2>Theme Settings</h2>
                <div class="form-row">
                    <code class="p-3 bg-light text-danger w-100">
                        Available Colors:
                        <br>
                        Light, Dark, Primary, Secondary, Cyan, Blue, Red, Lime, Warning, Danger, Info
                    </code>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="sidebar_bg">Sidebar Background</label>
                        <input type="text" name="sidebar_bg" class="form-control @error('sidebar_bg') is-invalid @enderror" id="sidebar_bg"
                               placeholder="light, dark, etc.." value="{{ old('sidebar_bg', config('settings.sidebar_bg')) }}">
                        @error('sidebar_bg')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="sidebar_fg">Sidebar Foreground</label>
                        <input type="text" name="sidebar_fg" class="form-control @error('sidebar_fg') is-invalid @enderror" id="sidebar_fg"
                               placeholder="warning, primary, etc.." value="{{ old('sidebar_fg', config('settings.sidebar_fg')) }}">
                        @error('sidebar_fg')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="navbar_bg">Navbar Background</label>
                        <input type="text" name="navbar_bg" class="form-control @error('navbar_bg') is-invalid @enderror" id="navbar_bg"
                               placeholder="light, dark, etc.." value="{{ old('navbar_bg', config('settings.navbar_bg')) }}">
                        @error('navbar_bg')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="navbar_fg">Navbar Foreground</label>
                        <input type="text" name="navbar_fg" class="form-control @error('navbar_fg') is-invalid @enderror" id="navbar_fg"
                               placeholder="warning, primary, etc.." value="{{ old('navbar_fg', config('settings.navbar_fg')) }}">
                        @error('navbar_fg')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Change Setting</button>
            </form>
        </div>
    </div>
@endsection
