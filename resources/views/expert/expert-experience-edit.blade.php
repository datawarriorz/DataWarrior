@extends('layout.expertlayout')

@section('content')

<link rel="stylesheet" href="./css/expert/expert-experience.css">

<br>
<div class="card">
    <div class="card-header text-center">
        <h4>Experience Details</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="/expert-experience-add">
            <div class="form-group">
                <label for="Fname">Profile :</label>
                <input type="text" name="exp_profile" class="form-control" placeholder="Eg. Software Developer"
                    autocomplete="on" value={{ old('exp_profile') }}>
            </div>
            <div class="form-group">
                <label for="Lname">Organisation :</label>
                <input type="text" name="exp_organisation" class="form-control" placeholder="Eg. ABC Private Limited"
                    autocomplete="on" value={{ old('exp_organisation') }}>
            </div>
            <div class="form-group">
                <label for="InputEmail">Location :</label>
                <input type="text" name="exp_location" class="form-control" placeholder="Eg. Mumbai" autocomplete="on"
                    id="location" value={{ old('exp_location') }}>
            </div>
            <div class="form-group form-inline">
                <label>Currently Working ?</label>
                <input type="checkbox" name="exp_currentjob" class="form-control" id="currentjob" value="yes"
                    onclick="onCheckCounselling(this);" style="margin-left: 8px;margin-top: 2px;">
            </div>
            <div class="form-group">
                <label for="start_date">Start Date :</label>
                <input type="text" name="exp_startdate" class="form-control" id="jobstartdate"
                    onfocus="(this.type='date')" placeholder="Click here to Select Date."
                    value={{ old('exp_startdate') }}>
            </div>
            <div class="form-group">
                <label for="end_date">End Date :</label>
                <input type="text" name="exp_enddate" class="form-control" id="jobenddate" onfocus="(this.type='date')"
                    placeholder="Click here to Select Date." value={{ old('exp_enddate') }}>
            </div>
            <div class="form-group">
                <label>Description :</label>
                <textarea name="exp_description" class="form-control" id="description" placeholder="Eg. Mumbai"
                    autocomplete="on" rows="4" value={{ old('exp_description') }}></textarea>
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
            <div class="form-group col-md-12 text-center">
                <button type="submit" class="btn job_btn">
                    Save <i class="far fa-save"></i>
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
                @foreach($experienceobj as $je)
                    <tr>
                        <td>{{ $je->exp_profile }}</td>
                        <td>{{ $je->exp_organisation }}</td>
                        <td>{{ $je->exp_location }}</td>
                        <td>{{ $je->exp_description }}</td>
                        <td>{{ $je->exp_currentjob }}</td>
                        <td>{{ substr($je->exp_startdate,0,10) }}</td>
                        <td>{{ substr($je->exp_enddate,0,10) }}</td>
                        <td>
                            <form method="POST" action="/expert-experience-delete">
                                @csrf
                                <input type="hidden" name="exp_id" value={{ $je->exp_id }} />
                                <button type="submit" class="btn btn-danger">Delete</button>

                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<br>
@endsection
