@extends('user.layout.masterlayout')

@section('content')

<link rel="stylesheet" href="./css/user/user-5-3-edit-experience.css">
<br>
<div class="col-md-8 offset-md-2">
    <div class="card">
        <div class="card-header text-center">
            <h4>Job Experience Details</h4>
        </div>
        <div class="card-body">
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
                <div class="form-group">
                    <label for="Fname">Profile :</label>
                    <input type="text" name="profile" class="form-control" placeholder="Eg. Software Developer"
                        autocomplete="on" value={{ old('profile') }}>
                </div>
                <div class="form-group">
                    <label for="Lname">Organisation :</label>
                    <input type="text" name="organisation" class="form-control" placeholder="Eg. ABC Private Limited"
                        autocomplete="on" value={{ old('oraganisation') }}>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Location :</label>
                    <input type="text" name="location" class="form-control" placeholder="Eg. Mumbai" autocomplete="on"
                        id="location" value={{ old('location') }}>
                </div>
                <div class="form-group form-inline">
                    <label>Currently Working ?</label>
                    <input type="checkbox" name="currentjob" class="form-control" id="currentjob" value="yes"
                        onclick="onCheckCounselling(this);" style="margin-left: 8px;margin-top: 2px;">
                </div>
                <div class="form-group">
                    <label for="start_date">Start Date :</label>
                    <input type="text" name="startdate" class="form-control" id="jobstartdate"
                        onfocus="(this.type='date')" placeholder="Click here to Select Date."
                        value={{ old('start_date') }}>
                </div>
                <div class="form-group">
                    <label for="end_date">End Date :</label>
                    <input type="text" name="enddate" class="form-control" id="jobenddate" onfocus="(this.type='date')"
                        placeholder="Click here to Select Date." value={{ old('end_date') }}>
                </div>
                <div class="form-group">
                    <label>Description :</label>
                    <textarea name="description" class="form-control" id="description" placeholder="Eg. Mumbai"
                        autocomplete="on" rows="4" value={{ old('description') }}></textarea>
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
            </form>
        </div>
    </div>
    <br>
    <div class="card" style="margin-top: 0">
        <div class="card-body" style="overflow-x: scroll">
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
                            <td>{{ $je->profile }}</td>
                            <td>{{ $je->organisation }}</td>
                            <td>{{ $je->location }}</td>
                            <td>{{ $je->description }}</td>
                            <td>{{ $je->currentjob }}</td>
                            <td>{{ substr($je->startdate,0,10) }}</td>
                            <td>{{ substr($je->enddate,0,10) }}</td>
                            <td>
                                <form method="POST" action="/deleteJobexperience">
                                    @csrf
                                    <input type="hidden" name="jobid" value={{ $je->jobid }} />
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    @if($process=="internship")
                                        <div class="form-group">
                                            <input type="hidden" name="process" class="form-control"
                                                value="internship" />
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
            <div class="form-group col-md-12">
                @if($process=="internship")
                    <a href="/internshipfinal" class="btn job_btn">View Internship form</a>
                @endif
                @if($process=="job")
                    <a href="/jobfinal" class="btn job_btn">View Job Application form</a>
                @endif
            </div>
        </div>
    </div>
</div>
<br>
@endsection
