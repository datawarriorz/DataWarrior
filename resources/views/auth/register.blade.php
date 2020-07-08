@extends('layout.mainlayout')

@section('content')
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
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
                    <form method="POST" action="{{ route('register') }}">
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
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" name="firstname" placeholder="Ex. Pat"
                                id="firstname" value={{old('firstname')}}>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" name="lastname" placeholder="Ex. Patil"
                                id="lastname" value={{old('lastname')}}>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" name="email" aria-describedby="emailHelp"
                                placeholder="Ex. example@datawarriors.co.in" id="email" value={{old('email')}}>
                            <small name="emailHelp" class="form-text text-muted">We'll never share your email with
                                anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="mobileno">Mobile No.</label>
                            <input type="text" class="form-control" name="contact_no" placeholder="555-555-5555"
                                id="contact_no" value={{old('contact_no')}}>
                        </div>
                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input type="date" class="form-control" value={{old('dateofbirth')}} name="dateofbirth"
                                id="dateofbirth">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="confirm">Confirm password</label>
                            <input type="password" class="form-control" name="confirm" id="confirm"
                                placeholder="Confirm Password">
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>
                </div>
            </div>
            </fieldset>
            </form>

        </div>
    </div>
</div>
<br>
<br>
@endsection