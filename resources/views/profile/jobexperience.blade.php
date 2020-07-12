@extends('profile.profilelayout')

@section('profilecontent')


<link rel="stylesheet" href="./css/jobexperience.css">

<form method="POST" action="/updateJobexperience">
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
  <div class="card">
    <div class="card-body">
      <legend>Job Experience Details</legend>
      <div class="form-group">
        <label for="Fname">Profile</label>
        <input type="text" name='profile' required class="form-control" value={{old('profile')}}>
      </div>
      <div class="form-group">
        <label for="Lname">Organisation</label>
        <input type="text" name='organisation' required class="form-control" value={{old('oraganisation')}}>
      </div>
      <div class="form-group">
        <label for="InputEmail">Location</label>
        <input type="text" class="form-control" id="location" required name='location' value={{old('location')}}>
      </div>
      <div class="form-group">
        <label for="start_date">Start Date</label>

        <input type="date" name="startdate" required class="form-control" value={{old('start_date')}}>
      </div>

      <div class="form-group">
        <label for="end_date">End Date</label>
        <input type="date" name="enddate" required class="form-control" value={{old('end_date')}}>

      </div>

      <div class="form-group form-inline">

        <input type="checkbox" name="currentjob" id="currentjob" class="form-control" value="yes"> <label> Currently
          working</label>

      </div>
      <div class="form-group">
        <label>Description</label>
        <input type="textarea" class="form-control" id="description" required name='description'
          value={{old('description')}}>
      </div>
      @if($process=="internship")
      <div class="form-group">
        <input type="hidden" name="process" class="form-control" value="internship" />
      </div>

      @endif
      @if($process=="job")
      <div class="form-group">
        <input type="hidden" name="process" class="form-control" value="job" />
      </div>

      @endif

      <div class="form-group col-md-12 md-offset-4">

        <button type="submit" class="btn btn-primary">
          {{ __('Save') }}
        </button>

      </div>

</form>


</div>
</div>
<br>

<div class="card">
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Profile</th>
          <th scope="col">Organisation</th>
          <th scope="col">Location</th>
          <th scope="col">Description</th>
          <th scope="col">Current Job</th>
          <th scope="col">Start Date</th>
          <th scope="col">End Date</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($jobexp as $je)
        <tr>


          <td>{{$je->profile}}</td>
          <td>{{$je->organisation}}</td>
          <td>{{$je->location}}</td>
          <td>{{$je->description}}</td>
          <td>{{$je->currentjob}}</td>
          <td>{{substr($je->startdate,0,10)}}</td>
          <td>{{substr($je->enddate,0,10)}}</td>
          <td>
            <form method="POST" action="/deleteJobexperience">
              @csrf
              <input type="hidden" name="jobid" value={{$je->jobid}} />
              <button type="submit" class="btn btn-danger">Delete</button>
              @if($process=="internship")
              <div class="form-group">
                <input type="hidden" name="process" class="form-control" value="internship" />
              </div>

              @endif
              @if($process=="job")
              <div class="form-group">
                <input type="hidden" name="process" class="form-control" value="job" />
              </div>

              @endif
            </form>
          </td>

        </tr>
        @endforeach
      </tbody>
    </table>
    @if($process=="internship")
    <a href="/internshipfinal" class="btn btn-primary">View Internship form</a>
    @endif
    @if($process=="job")
    <a href="/jobfinal" class="btn btn-primary">View Internship form</a>
    @endif
  </div>
</div>
<br>
@endsection