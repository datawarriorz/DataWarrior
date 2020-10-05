@extends('expert.layout.masterlayout')

@section('content')

<link rel="stylesheet" href="./css/expert/expert-5-3-edit-experience.css">

<div class="col-12 col-sm-12 col-md-8 col-lg-8 offset-md-2">
    <div class="card">
        <div class="card-header text-center">
            <h4>Experience Details</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="/expert-experience-add">
                <div class="form-group">
                    <label for="Fname">Profile :</label>
                    <input type="text" name="exp_profile" class="form-control" required
                        placeholder="Eg. Software Developer" autocomplete="on"
                        value={{ old('exp_profile') }}>
                </div>
                <div class="form-group">
                    <label for="Lname">Organisation :</label>
                    <input type="text" name="exp_organisation" class="form-control" required
                        placeholder="Eg. ABC Private Limited" autocomplete="on"
                        value={{ old('exp_organisation') }}>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Location :</label>
                    <input type="text" name="exp_location" class="form-control" required placeholder="Eg. Mumbai"
                        autocomplete="on" id="location" value={{ old('exp_location') }}>
                </div>
                <div class="form-group form-inline">
                    <label>Currently Working ?</label>
                    <input type="checkbox" name="exp_currentjob" class="form-control" id="currentjob" value="yes"
                        onclick="onCheckCounselling(this);" style="margin-left: 8px;margin-top: 2px;">
                </div>
                <div class="form-group">
                    <label for="start_date">Start Date :</label>
                    <input type="text" name="exp_startdate" class="form-control" required id="jobstartdate"
                        onfocus="(this.type='date')" placeholder="Click here to Select Date."
                        value={{ old('exp_startdate') }}>
                </div>
                <div class="form-group">
                    <label for="end_date">End Date :</label>
                    <input type="text" name="exp_enddate" class="form-control" id="jobenddate"
                        onfocus="(this.type='date')" placeholder="Click here to Select Date."
                        value={{ old('exp_enddate') }}>
                </div>
                <div class="form-group">
                    <label>Description
                        <small class="text-muted">
                            (Optional)
                        </small> :
                    </label>
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
                <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12 text-center">
                    <div class="row text-center">
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
    <div class="card">
        <div class="card-body" style="overflow-x: scroll">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Profile</th>
                        <th scope="col">Organisation</th>
                        <th scope="col">Location</th>
                        <th scope="col">Description</th>
                        <th scope="col" style="min-width: 113px">Current Job</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($experienceobj as $je)
                        <tr>
                            <td>{{ $je->exp_profile }}</td>
                            <td>{{ $je->exp_organisation }}</td>
                            <td>{{ $je->exp_location }}</td>
                            <td>{{ $je->exp_description }}</td>
                            <td>@if(is_null($je->exp_currentjob)) No @else {{ $je->exp_currentjob }} @endif</td>
                            <td>{{ substr($je->exp_startdate,0,10) }}</td>
                            <td>{{ substr($je->exp_enddate,0,10) }}</td>
                            <td class="text-center">
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
</div>
@endsection
