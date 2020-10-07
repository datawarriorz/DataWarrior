@extends('expert.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="./css/expert/expert-4-3-0-post-job.css">
<div class="col-12">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-9 offset-lg-0 no-gutters pl-4 pr-4">
            <div class="col-md-12">
                <div class="card dashboard-card ml-0 mr-0 mb-0 mb-sm-0 mb-md-0 mb-lg-4">
                    <div class="card-header">
                        <div class="col-12 pl-0 pr-0">
                            <div class="row">
                                <div class="col-6 text-left">
                                    <div style="margin-bottom: 0px"><i class="fas fa-columns"></i> Job Form</div>
                                </div>
                                <div class="col-6 text-right">
                                    <a class="tab-edit-btn" href="/expertdashboard">
                                        <i class="fas fa-arrow-left"></i> Back
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body dashboard-card-body">
                        <form method="POST" action="/expert-post-certification" enctype="multipart/form-data">
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
                            <div class="col-md-12" style="padding: 0px;">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label>Title :</label>
                                            <input type="text" name="cert_title" class="form-control" placeholder="Eg. "
                                                autocomplete="on" value={{ old('cert_title') }}>
                                        </div>
                                        <div class="form-group">
                                            <label>Price :</label>
                                            <input type="text" name="cert_price" class="form-control" placeholder="Eg. "
                                                autocomplete="on" value={{ old('cert_price') }}>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Image :</label>
                                            <div class="upload-btn-wrapper">
                                                <textarea id="uploadFile" class="disableInputField"
                                                    placeholder="Choose File" disabled="disabled" rows="2"
                                                    autocomplete="off">
                                                    </textarea>
                                                <label class="fileUpload form-control">
                                                    <input id="uploadBtn" enctype="multipart/form-data" type="file"
                                                        name="cert_image" class="upload" />
                                                    <span class="uploadBtn">Upload / Browse File ..</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Summary / Description :</label>
                                    <textarea name="cert_description" class="form-control" id="cert_description"
                                        placeholder="Eg. " autocomplete="on" rows="2"
                                        value={{ old('cert_description') }}></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Pre - Requiste :</label>
                                    <textarea name="cert_prerequisites" class="form-control" id="cert_prerequisites"
                                        placeholder="Eg. " autocomplete="on" rows="2"
                                        value={{ old('cert_prerequisites') }}></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Provider :</label>
                                    <input type="text" name="cert_provider" class="form-control" placeholder="Eg. "
                                        autocomplete="on" value={{ old('cert_provider') }}>
                                </div>
                                <div class="form-group">
                                    <label>Domain :</label>
                                    <input type="text" name="cert_domain" class="form-control" placeholder="Eg. "
                                        autocomplete="on" value={{ old('cert_domain') }}>
                                </div>
                                <div class="form-group">
                                    <label>Validation Period :</label>
                                    <input type="text" name="cert_validationperiod" class="form-control"
                                        placeholder="Eg. " autocomplete="on"
                                        value={{ old('cert_validationperiod ') }}>
                                </div>


                                <div class="form-group col-md-12 text-center">
                                    <br>
                                    <button type="submit" class="btn tab-edit-btn" style="font-weight: 600">
                                        Post Certification <i class="far fa-eye"></i>
                                    </button>
                                    <br>
                                    <br>
                                    <a class="btn tab-edit-btn" href="/expertdashboard">
                                        <i class="fas fa-arrow-left"></i> Back
                                    </a>
                                </div>
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
{{-- <div class="col-md-8 offset-md-2">
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
    <input type="text" name="job_domain" class="form-control" placeholder="Eg. " autocomplete="on"
        value={{ old('job_domain') }}>
</div>
<div class="form-group">
    <label>Designation :</label>
    <input type="text" name="job_designation" class="form-control" placeholder="Eg. " autocomplete="on"
        value={{ old('job_designation') }}>
</div>
<div class="form-group">
    <label>Job Location :</label>
    <input type="text" name="job_location" class="form-control" placeholder="Eg. " autocomplete="on"
        value={{ old('job_location') }}>
</div>
<div class="form-group">
    <label>Job Shift :</label>
    <input type="text" name="job_shift" class="form-control" placeholder="Eg. " autocomplete="on"
        value={{ old('job_shift') }}>
</div>
<div class="form-group">
    <label>Job Openings :</label>
    <input type="text" name="job_openings" class="form-control" placeholder="Eg. " autocomplete="on"
        value={{ old('job_openings') }}>
</div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label>Company :</label>
        <input type="text" name="job_company" class="form-control" placeholder="Eg. " autocomplete="on"
            value={{ old('job_company') }}>
    </div>
    <div class="form-group">
        <label>Skills Required :</label>
        <input type="text" name="job_skills_required" class="form-control" placeholder="Eg. " autocomplete="on"
            value={{ old('job_skills_required') }}>
    </div>
    <div class="form-group">
        <label>Salary :</label>
        <input type="text" name="job_salary" class="form-control" placeholder="Eg. " autocomplete="on"
            value={{ old('job_salary') }}>
    </div>
    <div class="form-group">
        <label>Job Duration :</label>
        <input type="text" name="job_duration" class="form-control" placeholder="Eg. " autocomplete="on"
            value={{ old('job_duration') }}>
    </div>
    <div class="form-group">
        <label>Job Starts in:</label>
        <input type="text" name="job_starttime" class="form-control" placeholder="Eg. " autocomplete="on"
            value={{ old('job_salary') }}>
    </div>
    <div class="form-group">
        <label>Job Apply By :</label>
        <input type="date" name="job_apply_by" class="form-control" placeholder="Eg. " autocomplete="on"
            value={{ old('job_salary') }}>
    </div>
</div>
</div>
<input type="hidden" name="job_type_id" value="1">
<div class="form-group">
    <label>Company Website :</label>
    <input type="text" name="job_companywebsite" class="form-control" placeholder="Eg. " autocomplete="on"
        value={{ old('job_companywebsite') }}>
</div>
<div class="form-group">
    <label>Job Summary/Description :</label>
    <textarea name="job_description" class="form-control" id="description" placeholder="Eg. " autocomplete="on" rows="2"
        value={{ old('job_description') }}></textarea>
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
</div>
</div>
</form>
</div> --}}
@endsection
