@extends('expert.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/expert/expert-9-0-post-internship.css') }}">
<div class="col-12">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-9 offset-lg-0 no-gutters pl-4 pr-4">
            <div class="col-md-12">
                <div class="card dashboard-card ml-0 mr-0 mb-0 mb-sm-0 mb-md-0 mb-lg-4">
                    <div class="card-header">
                        <div class="col-12 pl-0 pr-0">
                            <div class="row">
                                <div class="col-8 text-left">
                                    <div style="margin-bottom: 0px"><i class="fas fa-columns"></i> Internship Form</div>
                                </div>
                                <div class="col-4 text-right">
                                    <a class="tab-edit-btn" href="/expertdashboard">
                                        <i class="fas fa-arrow-left"></i> Back
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body dashboard-card-body">
                        <form method="POST" action="/expert-post-internship" enctype="multipart/form-data">
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
                                <label>Title :</label>
                                <input type="text" name="job_title" class="form-control"
                                    placeholder="e.g Software Developer required with 1 year Experience."
                                    autocomplete="on" value="{{ old('job_title') }}">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Company :</label>
                                        <input type="text" name="job_company" class="form-control"
                                            placeholder="e.g Data Warrior Pvt LTD." autocomplete="on"
                                            value="{{ old('job_company') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Domain :</label>
                                        <input type="text" name="job_domain" class="form-control"
                                            placeholder="e.g Programming." autocomplete="on"
                                            value="{{ old('job_domain') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Designation :</label>
                                        <input type="text" name="job_designation" class="form-control"
                                            placeholder="e.g Software Developer." autocomplete="on"
                                            value="{{ old('job_designation') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Internship Location :</label>
                                        <input type="text" name="job_location" class="form-control"
                                            placeholder="e.g Borivali,Mumbai." autocomplete="on"
                                            value="{{ old('job_location') }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Skills Required :</label>
                                        <input type="text" name="job_skills_required" class="form-control"
                                            placeholder="e.g PHP/JS/CSS" autocomplete="on"
                                            value="{{ old('job_skills_required') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Stipend :</label>
                                        <input type="text" name="job_salary" class="form-control" placeholder="e.g 5000"
                                            autocomplete="on" value="{{ old('job_salary') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Internship Starts in:</label>
                                        <input type="text" name="job_starttime" class="form-control"
                                            placeholder="e.g 2 Weeks or Immediately" autocomplete="on"
                                            value="{{ old('job_salary') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Internship Apply By :</label>
                                        <input type="date" name="job_apply_by" class="form-control" placeholder=" "
                                            autocomplete="on" value="{{ old('job_salary') }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Internship Openings :</label>
                                        <input type="text" name="job_openings" class="form-control" placeholder="e.g 3."
                                            autocomplete="on" value="{{ old('job_openings') }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Internship Duration :</label>
                                        <input type="text" name="job_duration" class="form-control"
                                            placeholder="e.g 2 Years Bond" autocomplete="on"
                                            value="{{ old('job_duration') }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Internship Shift :</label>
                                        <input type="text" name="job_shift" class="form-control"
                                            placeholder="e.g Full Time " autocomplete="on"
                                            value="{{ old('job_shift') }}">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="job_type_id" value="2">
                            <div class="form-group">
                                <label>Company Website :</label>
                                <input type="text" name="job_companywebsite" class="form-control"
                                    placeholder="Eg. http://www.datawarriors.co.in" autocomplete="on"
                                    value="{{ old('job_companywebsite') }}">
                            </div>
                            <div class="form-group">
                                <label>Internship Summary/Description :</label>
                                <textarea name="job_description" class="form-control" id="description"
                                    placeholder="Eg. " autocomplete="on" rows="2"
                                    value="{{ old('job_description') }}"></textarea>
                            </div>
                            <br>
                            <div class="form-group col-md-12 text-center">
                                <button type="submit" class="btn tab-edit-btn">
                                    Submit
                                </button>
                                <br>
                                <br>
                                <a class="btn tab-edit-btn" href="/expertdashboard">
                                    <i class="fas fa-arrow-left"></i> Back
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-3 offset-lg-0 no-gutters pl-lg-0 pl-4 pr-4">
            <div class="col-md-12">
                <div class="card trending-card right-card ml-0 mr-0 mb-4 mb-sm-4 mb-md-4 mb-sm-0">
                    <div class="card-header">
                        <i class="fas fa-hashtag"></i> Last Job Posted
                    </div>
                    <div class="card-body">
                        no jobs posted
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
