@extends('layout.expertlayout')

@section('content')
<link rel="stylesheet" href="./css/expert/expert-6-0-post-job.css">
<div class="col-md-8 offset-md-2">
    <form method="POST" action="/expert-post-job" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header text-center">
                Job Form
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Title :</label>
                            <input type="text" name="job_title" class="form-control" placeholder="Eg. "
                                autocomplete="on" value={{ old('job_title') }}>
                        </div>
                        <div class="form-group">
                            <label>Domain :</label>
                            <input type="text" name="job_domain" class="form-control" placeholder="Eg. "
                                autocomplete="on" value={{ old('job_domain') }}>
                        </div>
                        <div class="form-group">
                            <label>Designation :</label>
                            <input type="text" name="job_designation" class="form-control" placeholder="Eg. "
                                autocomplete="on" value={{ old('job_designation') }}>
                        </div>
                        <div class="form-group">
                            <label>Job Location :</label>
                            <input type="text" name="job_location" class="form-control" placeholder="Eg. "
                                autocomplete="on" value={{ old('job_location') }}>
                        </div>
                        <div class="form-group">
                            <label>Job Shift :</label>
                            <input type="text" name="job_shift" class="form-control" placeholder="Eg. "
                                autocomplete="on" value={{ old('job_shift') }}>
                        </div>
                        <div class="form-group">
                            <label>Job Openings :</label>
                            <input type="text" name="job_openings" class="form-control" placeholder="Eg. "
                                autocomplete="on" value={{ old('job_openings') }}>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Company :</label>
                            <input type="text" name="job_company" class="form-control" placeholder="Eg. "
                                autocomplete="on" value={{ old('job_company') }}>
                        </div>
                        <div class="form-group">
                            <label>Skills Required :</label>
                            <input type="text" name="job_skills_required" class="form-control" placeholder="Eg. "
                                autocomplete="on" value={{ old('job_skills_required') }}>
                        </div>
                        <div class="form-group">
                            <label>Salary :</label>
                            <input type="text" name="job_salary" class="form-control" placeholder="Eg. "
                                autocomplete="on" value={{ old('job_salary') }}>
                        </div>
                        <div class="form-group">
                            <label>Job Duration :</label>
                            <input type="text" name="job_duration" class="form-control" placeholder="Eg. "
                                autocomplete="on" value={{ old('job_duration') }}>
                        </div>
                        <div class="form-group">
                            <label>Job Starts in:</label>
                            <input type="text" name="job_starttime" class="form-control" placeholder="Eg. "
                                autocomplete="on" value={{ old('job_salary') }}>
                        </div>
                        <div class="form-group">
                            <label>Job Apply By :</label>
                            <input type="date" name="job_apply_by" class="form-control" placeholder="Eg. "
                                autocomplete="on" value={{ old('job_salary') }}>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="job_type_id" value="1">
                <div class="form-group">
                    <label>Company Website :</label>
                    <input type="text" name="job_companywebsite" class="form-control" placeholder="Eg. "
                        autocomplete="on" value={{ old('job_companywebsite') }}>
                </div>
                <div class="form-group">
                    <label>Job Summary/Description :</label>
                    <textarea name="job_description" class="form-control" id="description" placeholder="Eg. "
                        autocomplete="on" rows="2" value={{ old('job_description') }}></textarea>
                </div>
                <br>
                <div class="form-group col-md-12 text-center">
                    <button type="submit" class="btn expert-btn1">
                        Submit
                    </button>
                    <br>
                    <br>
                    <a class="btn expert-btn1" href="/expertdashboard">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection