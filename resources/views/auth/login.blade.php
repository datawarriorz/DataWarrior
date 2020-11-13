@extends('user.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/user/user-4-login.css') }}" />
<br>
<div class="col-12">
    <div class="row">
        <div class="col-12 col-md-8 col-lg-9 no-gutters">
            <div class="" style="background-color: white">
                <div class="card-body text-center">
                    <div class="jumbotron">
                         <?php session_start(); ?>
                         {{ Session::get('process') }}
                         {{ Session::forget('process') }}
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 col-lg-3 pl-0">
            <div class="" style="background-color: white">
                <div class="card-body text-center">
                    <div class="container loginContainer text-center">
                        <br>
                        <div id="gSignInWrapper">
                            <form action="login/google" method="GET">
                                <button type="submit" class="googleButton google-wrap"
                                    style="background-image: url(images/btn_google_signin_light_normal_web.png);">
                            </form>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        <p>or</p>
                        @csrf
                        <div>
                            <div class="form-group row">
                                <div class="col-10 offset-1 text-center">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="far fa-envelope"></i></div>
                                        </div>
                                        <input id="email" type="email" placeholder="Email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email"
                                            autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-10 offset-1 text-center">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-key"></i></div>
                                        </div>
                                        <input id="password" type="password" placeholder="Password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-10 offset-md-1">
                                    <div class="form-check custom-control">
                                        <input class="form-check-input custom-checkbox" type="checkbox" name="remember"
                                            id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-10 offset-md-1">
                                    <button type="submit" class="btn tab-edit-btn">
                                        {{ __('Sign in') }}
                                    </button>
                                    @if(Route::has('password.request'))
                                        <br>
                                        <br>
                                        <a class="btn btn-link"
                                            href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
@endsection
