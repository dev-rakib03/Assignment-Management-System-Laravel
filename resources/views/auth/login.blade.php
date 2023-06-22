@extends('frontend.layouts.app')
@section('title','Login')
@section('css')
<link rel="stylesheet" href="{{ asset('/') }}backend/css/login.css" >
@endsection
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-5 mx-auto">
          <div class="myform form ">
            <div class="logo mb-3">
              <div class="col-md-12 text-center">
                <h1>{{ __('Login') }}</h1>
              </div>
            </div>
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">{{ __('Email Address') }}</label>
                    <input type="email" id="email" placeholder="Enter email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input type="password" id="password" placeholder="Enter Password"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
                <div class="col-md-12 text-center ">
                    <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Login</button>
                </div>
                @if (Route::has('password.request'))
                    <div class="form-group text-center ">
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                @endif
              </form>
          </div>
      </div>
    </div>
</div>
@endsection
