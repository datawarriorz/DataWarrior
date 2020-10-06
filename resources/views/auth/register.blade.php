@extends('user.layout.masterlayout')

@section('content')
<br>
<br>
<link rel="stylesheet" href="{{ asset('css/user/registerform.css') }}" />
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h5> Register</h5>
                </div>
                <div class="col-md-8 offset-md-4">
                    <div class="container loginContainer">
                        <br>
                        <div id="gSignInWrapper">
                            <form action="login/google" method="GET">
                                <button type="submit" class="googleButton"
                                    style="background-image: url(images/btn_google_signin_light_normal_web.png); width: 191px;height: 46px;border: 0px;background-color: white;">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @if(count($errors))
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.
                                <br />
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="firstname">First Name :</label>
                                    <input type="text" class="form-control" name="firstname" placeholder="Eg. Ashay"
                                        id="firstname" value={{ old('firstname') }}>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Last Name :</label>
                                    <input type="text" class="form-control" name="lastname" placeholder="Eg. Patil"
                                        id="lastname" value={{ old('lastname') }}>
                                </div>
                            </div>
                            {{-- <div class="col-md-4">
                                <div class="form-group">
                                    <label>Image :</label>
                                    <div class="upload-btn-wrapper">
                                        <textarea id="uploadFile" class="disableInputField" placeholder="Choose File"
                                            disabled="disabled" rows="2" autocomplete="off">
                                                    </textarea>
                                        <label class="fileUpload form-control">
                                            <input id="uploadBtn" enctype="multipart/form-data" type="file"
                                                name="u_image" class="upload" />
                                            <span class="uploadBtn">Upload / Browse File ..</span>
                                        </label>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <div class="form-group">
                            <label for="email">Email address :</label>
                            <input type="email" class="form-control" name="email" aria-describedby="emailHelp"
                                placeholder="Eg. abc@gmail.com" id="email" value={{ old('email') }}>
                            <small name="emailHelp" class="form-text text-muted">
                                We'll never share your email with anyone else.
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="mobileno">Mobile No. :</label>
                            <input type="text" class="form-control" name="contact_no" placeholder="9920940893"
                                id="contact_no" value={{ old('contact_no') }}>
                        </div>
                        <div class="form-group">
                            <label for="dob">Date of Birth :</label>
                            <input type="date" class="form-control" value={{ old('dateofbirth') }}
                                name="date_of_birth" id="dateofbirth">
                        </div>
                        <div class="form-group">
                            <label for="password">Password :</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="confirm">Confirm password :</label>
                            <input type="password" class="form-control" name="confirm" id="confirm"
                                placeholder="Confirm Password">
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="newsletter" id="newsletter" class="form-control" value="yes">
                            <label> Click here to subscribe to our newsletter </label>

                        </div>
                        <div class="form-group">
                            <label for="referral_code">Referral Code :</label>
                            <input type="text" class="form-control" name="referral_code" id="referral_code"
                                value={{ old('referral_code') }}>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 text-right">
                                <a class="btn tab-edit-btn" href="/">
                                    <i class="fas fa-arrow-left"></i> Back
                                </a>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 text-left">
                                <button type=" submit" class="btn tab-edit-btn">
                                    Submit
                                </button>
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
@endsection
