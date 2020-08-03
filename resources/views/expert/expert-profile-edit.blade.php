@extends('profile.profilelayout')

@section('profilecontent')
<link rel="stylesheet" href="./css/expert/profile-edit.css" />
<br>
<div class="card">
    <div class="card-header text-center">
        <h4>Personal Details</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="/expert-profile-edit">
            <div class="form-group">
                <label for="Fname">First Name</label>
                <input type="text" name='ex_firstname' required class="form-control"
                    value="{{ $expert->ex_firstname }}">
            </div>
            <div class="form-group">
                <label for="Lname">Last Name</label>
                <input type="text" name='ex_lastname' required class="form-control"
                    value="{{ $expert->ex_lastname }}">
            </div>
            <div class="form-group">
                <label for="InputEmail">Email address</label>
                <input type="email" class="form-control" id="email" required name='email' aria-describedby="emailHelp"
                    placeholder="Enter email" value="{{ $expert->email }}">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>
            <div class="form-group">
                <label for="Fname">About</label>
                <input type="text" name='ex_aboutme' required class="form-control" value="{{ $expert->ex_aboutme }}">
            </div>
            <div class="form-group">
                <label for="Fname">Description</label>
                <input type="text" name='ex_description' required class="form-control"
                    value="{{ $expert->ex_description }}">
            </div>
            <div class="form-group">
                <label for="phonenum">Country Code</label><br />
                <input name="ex_contactcode" required class="form-control" value="{{ $expert->ex_contactcode }}">
            </div>
            <div class="form-group">
                <label for="phonenum">Phone Number</label><br />
                <input name="ex_contactno" type="tel" pattern="^\d{10}" required class="form-control"
                    value="{{ $expert->ex_contactno }}">
            </div>
            <div class="form-group">
                <label for="DOB">Date of Birth</label>
                <input type="date" name="ex_dateofbirth" class="form-control"
                    value="{{ substr($expert->ex_dateofbirth,0,10) }}">
            </div>

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
            <br>
            <div class="form-group col-md-12 text-center">
                <button type="submit" class="btn job_btn">
                    Save <i class="far fa-save"></i>
                </button>
                <br>
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Reset Your Password?') }}
                </a>
            </div>
        </form>
    </div>
</div>
<br>
@endsection
