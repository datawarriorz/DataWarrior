@extends('profile.profilelayout')

@section('profilecontent')
<link rel="stylesheet" href="./css/editprofile.css" />
<form method="POST" action="/updateuserdetails">
  <br>

  <div class="card">
    <div class="card-header text-center">
      <h4>Personal Details</h4>
    </div>
    <div class="card-body">
      <div class="form-group">
        <label for="Fname">First Name</label>
        <input type="text" name='first_name' required class="form-control" value="{{$user->first_name}}">
      </div>
      <div class="form-group">
        <label for="Lname">Last Name</label>
        <input type="text" name='last_name' required class="form-control" value="{{$user->last_name}}">
      </div>
      <div class="form-group">
        <label for="InputEmail">Email address</label>
        <input type="email" class="form-control" id="email" required name='email' aria-describedby="emailHelp"
          placeholder="Enter email" value="{{$user->email}}">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="phonenum">Phone Number</label><br />
        <input name="contact_no" type="tel" pattern="^\d{10}" required class="form-control"
          value="{{$user->contact_no}}">
      </div>
      <div class="form-group">
        <label for="DOB">Date of Birth</label>
        <input type="date" name="date_of_birth" class="form-control" value="{{substr($user->date_of_birth,0,10)}}">
      </div>
      <div class="form-group form-inline">
        <legend>Gender</legend>
        <div class="form-check">
          <label class="form-check-label">
            <input type="radio" class="form-check-input" name="gender" id="gender" value="Male" <?php if (strncmp($user->gender, "Male", 4)==0) {
    echo "checked";
}?>>
            Male
          </label>
        </div>
        <div class="form-check" style="margin-left: 20px">
          <label class="form-check-label">
            <input type="radio" class="form-check-input" name="gender" id="gender" value="Female" <?php if (strncmp($user->gender, "Female", 6)==0) {
    echo "checked";
}?>>
            Female
          </label>
        </div>
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