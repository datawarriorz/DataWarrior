@extends('user.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/user/user-4-login.css') }}" />
<div class="login-wrapper col-12 pt-4 pb-4">
    <div class="col-12 col-sm-12 col-md-8 offset-md-2 pt-4 pb-4 no-gutters"
        style="background-color: white;border-radius:10px;">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-7" style="background-color: white">
                <div class="card-body text-center text-md-left">
                    <div class="jumbotron" style="background-color: white">
                        <?php session_start(); ?>
                        @if(Session::get('process')==null)
                        {{ Session::forget('process') }}
                        
                            <h1>Welcome Data Warrior!</h1>
                            <br>
                            <h6>Sign-In to apply for internship, jobs or to obtain a certification.</h6>
                        @endif
                        @if(Session::get('process')=="ihome")
                        {{ Session::forget('process') }}
                        {{  Session::put('processcont', 'ihome') }}
                            <h1>Looking for Internships?</h1>
                            <br>
                            <p>
                                We provide internships in the domains of data science, information technology (CSE &amp;
                                IT), sales, marketing and finance -for BA, BSc, BCom, B Tech, MCA, MBA, and M Tech students.
                            </p>
                            <b>Sign-In to avail our services.</b>
                            
                        @endif
                        @if(Session::get('process')=="chome")
                        {{ Session::forget('process') }}
                        {{  Session::put('processcont', 'chome') }}
                            <h1>Looking to do Certification?</h1>
                            <br>
                            <p>
                                We offer IBM as well as inhouse certifications from our experts. We also give free
                                advice on the best certification for a particular job profile.
                            </p>
                            <b>Sign-In to avail our services.</b>
                            
                        @endif
                        @if(Session::get('process')=="jhome")
                        {{ Session::forget('process') }}
                        {{  Session::put('processcont', 'jhome') }}
                            <h1>Looking for Jobs?</h1>
                            <br>
                            <p>
                                We are in touch with over 100 corporates to get jobs for young professionals and
                                energetic freshers.
                                Even in turbulent post COVID19 scenario, we have facilitated many job
                                opportunities.
                            </p>
                            <b>Sign up to avail our services.</b>
                           
                        @endif
                        @if(Session::get('process')=="phome")
                        {{ Session::forget('process') }}
                        {{  Session::put('processcont', 'phome') }}
                            Projects are an essential activity for all professional. We offer live projects for BA, BSc,
                            B
                            Tech, MCA, MBA, and M Tech students. We also design and implement projects for
                            corporates and industry requirements. Sign up to avail of our services.
                           
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-5" style="background-color: white">
                <div class="card-body text-center">
                    <div class="container loginContainer text-center">
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
@endsection
