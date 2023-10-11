@extends('layouts.guest')

@section('content')
    <div class="card-body login-card-body shadow-none">
        <div class="login-logo mb-4">
            {{-- <a href="/">{{ config('app.name', 'Laravel') }}</a> --}}
            <img src="{{ asset('images/logo.png') }}" alt="AdminLTE Logo" width="70"
                class="brand-image img-circle elevation-3" style="opacity: .8">
        </div>
        <h6 class="mb-0 text-center bold"><b>{{ __('MUSHOLLA AL MUHAJIRIN') }}</b></h6>
        <p class="login-box-msg">{{ __('Silahkan login terlebih dahulu untuk masuk ke sistem') }}</p>

        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="{{ __('Email') }}" required autofocus>
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                @error('username')
                    <span class="error invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="{{ __('Password') }}" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                @error('password')
                    <span class="error invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-success btn-block">{{ __('Login') }}</button>
        </form>
    </div>
@endsection
