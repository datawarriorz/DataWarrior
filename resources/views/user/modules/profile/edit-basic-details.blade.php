@extends('user.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="./css/user/user-5-1-edit-basic-details.css" />
<br>
<div class="contaner col-md-8 offset-md-2">
    <div class="card">
        <div class="card-header text-center">
            <h4>Personal Details</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="/updateuserdetails" enctype="multipart/form-data">
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
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="Fname">First Name</label>
                            <input type="text" name='first_name' required class="form-control"
                                value="{{ $user->first_name }}">
                        </div>
                        <div class="form-group">
                            <label for="Lname">Last Name</label>
                            <input type="text" name='last_name' class="form-control" value="{{ $user->last_name }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Image :</label>
                            <div class="upload-btn-wrapper">
                                <textarea id="uploadFile" class="disableInputField" placeholder="Choose File"
                                    disabled="disabled" rows="2" autocomplete="off">
                                    </textarea>
                                <label class="fileUpload form-control">
                                    <input id="uploadBtn" enctype="multipart/form-data" type="file" name="u_image"
                                        class="upload" />
                                    <span class="uploadBtn">Upload / Browse File ..</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Email Address
                        <small class="text-muted">
                            (We'll never share your email with anyone else)
                        </small>:
                    </label>
                    <input type="email" class="form-control" id="email" disabled required name='email'
                        aria-describedby="emailHelp" placeholder="Enter email" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label>Phone Number</label><br />
                    <input name="contact_no" type="tel" pattern="^\d{10}" class="form-control"
                        value="{{ $user->contact_no }}">
                </div>
                <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="date" name="date_of_birth" class="form-control"
                        value="{{ substr($user->date_of_birth,0,10) }}">
                </div>
                <div class="form-group form-inline">
                    <label>Gender</label>
                    <div class="form-check" style="margin-left: 20px">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" id="gender" value="Male"
                                <?php if (strncmp($user->gender, "Male", 4)==0) {echo "checked";}?>>
                            Male
                        </label>
                    </div>
                    <div class="form-check" style="margin-left: 20px">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" id="gender" value="Female"
                                <?php if (strncmp($user->gender, "Female", 6)==0) {echo "checked";}?>>
                            Female
                        </label>
                    </div>
                </div>
                <div class="form-group form-inline">
                    <label>Subscribe to our newsletter</label>
                    <div class="form-check" style="margin-left: 20px">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="newsletter" id="subscription" value="yes"
                                <?php if (strncmp($subscription->newsletter,"yes", 3)==0) {echo "checked";}?>>
                            Yes
                        </label>
                    </div>
                    <div class="form-check" style="margin-left: 20px">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="newsletter" id="subscription" value="no"
                                <?php if (strncmp($subscription->newsletter,"no", 2)==0) {echo "checked";}?>>
                            No
                        </label>
                    </div>
                </div>
                <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12 text-center">
                    <div class="row text-center">
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 text-right">
                            <a class="btn tab-edit-btn" href="/viewprofile">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 text-left">
                            <button type="submit" class="btn tab-edit-btn">
                                Save <i class="far fa-save"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-12 text-center">
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Reset Your Password?') }}
                    </a>
                </div>
                <br>
            </form>
        </div>
    </div>
</div>
@endsection
