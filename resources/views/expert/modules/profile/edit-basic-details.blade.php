@extends('expert.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="./css/expert/expert-5-1-edit-basic-details.css" />
<div class="col-12 col-sm-12 col-md-8 col-lg-8 offset-md-2">
    <div class="card">
        <div class="card-header text-center">
            <h4>Personal Details</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="/expert-profile-edit" style="padding: 14px;">
                <div class="form-group">
                    <label>First Name :</label>
                    <input type="text" name='ex_firstname' required class="form-control"
                        value="{{ $expert->ex_firstname }}">
                </div>
                <div class="form-group">
                    <label>Last Name :</label>
                    <input type="text" name='ex_lastname' required class="form-control"
                        value="{{ $expert->ex_lastname }}">
                </div>
                <div class="form-group">
                    <label>Email Address
                        <small class="text-muted">
                            (We'll never share your email with anyone else)
                        </small>:
                    </label>
                    <input type="email" class="form-control" id="email" required name='email'
                        aria-describedby="emailHelp" placeholder="Enter email" value="{{ $expert->email }}">
                </div>
                <div class="form-group">
                    <label>About Me :</label>
                    <input type="text" name='ex_aboutme' required class="form-control"
                        value="{{ $expert->ex_aboutme }}">
                </div>
                <div class="form-group">
                    <label>Description <small class="text-muted">(Optional)</small> :
                    </label>
                    <input type="text" name='ex_description' class="form-control" value="{{ $expert->ex_description }}">
                </div>
                <div class="form-group">
                    <label>Country Code :</label><br />
                    <input name="ex_contactcode" required class="form-control" value="{{ $expert->ex_contactcode }}">
                </div>
                <div class="form-group">
                    <label>Phone Number :</label><br />
                    <input name="ex_contactno" type="tel" pattern="^\d{10}" required class="form-control"
                        value="{{ $expert->ex_contactno }}">
                </div>
                <div class="form-group">
                    <label>Date of Birth :</label>
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

                <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12 text-center">
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Reset Your Password?') }}
                    </a>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 text-right">
                            <a class="btn expert-btn1" href="/expert-profile">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 text-left">
                            <button type=" submit" class="btn expert-btn1">
                                Save <i class="far fa-save"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection