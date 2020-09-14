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
                                    <div style="margin-bottom: 0px"><i class="fas fa-columns"></i> Edit Job Details
                                    </div>
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
                        <form method="POST" action="/expert-post-job" enctype="multipart/form-data">
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
                                    autocomplete="on" value={{ old('job_title') }}>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Company :</label>
                                        <input type="text" name="job_company" class="form-control"
                                            placeholder="e.g Data Warrior Pvt LTD." autocomplete="on"
                                            value={{ old('job_company') }}>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Domain :</label>
                                        <input type="text" name="job_domain" class="form-control"
                                            placeholder="e.g Programming." autocomplete="on"
                                            value={{ old('job_domain') }}>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Designation :</label>
                                        <input type="text" name="job_designation" class="form-control"
                                            placeholder="e.g Software Developer." autocomplete="on"
                                            value={{ old('job_designation') }}>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Job Location :</label>
                                        <input type="text" name="job_location" class="form-control"
                                            placeholder="e.g Borivali,Mumbai." autocomplete="on"
                                            value={{ old('job_location') }}>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Skills Required :</label>
                                        <input type="text" name="job_skills_required" class="form-control"
                                            placeholder="e.g PHP/JS/CSS" autocomplete="on"
                                            value={{ old('job_skills_required') }}>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Salary :</label>
                                        <input type="text" name="job_salary" class="form-control" placeholder="e.g 5000"
                                            autocomplete="on" value={{ old('job_salary') }}>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Job Starts in:</label>
                                        <input type="text" name="job_starttime" class="form-control"
                                            placeholder="e.g 2 Weeks or Immediately" autocomplete="on"
                                            value={{ old('job_salary') }}>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Job Apply By :</label>
                                        <input type="date" name="job_apply_by" class="form-control" placeholder=" "
                                            autocomplete="on" value={{ old('job_salary') }}>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Job Openings :</label>
                                        <input type="text" name="job_openings" class="form-control" placeholder="e.g 3."
                                            autocomplete="on" value={{ old('job_openings') }}>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Job Duration :</label>
                                        <input type="text" name="job_duration" class="form-control"
                                            placeholder="e.g 2 Years Bond" autocomplete="on"
                                            value={{ old('job_duration') }}>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Job Shift :</label>
                                        <input type="text" name="job_shift" class="form-control"
                                            placeholder="e.g Full Time " autocomplete="on" value={{ old('job_shift') }}>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="job_type_id" value="1">
                            <div class="form-group">
                                <label>Company Website :</label>
                                <input type="text" name="job_companywebsite" class="form-control"
                                    placeholder="Eg. http://www.datawarriors.co.in" autocomplete="on"
                                    value={{ old('job_companywebsite') }}>
                            </div>
                            <div class="form-group">
                                <label>Job Summary/Description :</label>
                                <textarea name="job_description" class="form-control" id="description"
                                    placeholder="Eg. " autocomplete="on" rows="2"
                                    value={{ old('job_description') }}></textarea>
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
<div class="contaner col-md-8 offset-md-2">
    <div class="card">
        <div class="card-header text-center">
            <h4>Article Details</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="/expert-edit-article" enctype="multipart/form-data">
                @csrf
                @if (count($errors))
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <br />
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <br>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label>Title :</label>
                                <input type="text" name="title" class="form-control" placeholder="Eg. "
                                    autocomplete="on" value="{{ $article->title }}">
                            </div>
                            <div class="form-group">
                                <label>Author :</label>
                                <input type="text" name="author" class="form-control" placeholder="Eg. "
                                    autocomplete="on" value="{{ $article->author }}">
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
                                        <input id="uploadBtn" enctype="multipart/form-data" type="file"
                                            name="article_image" class="upload" />
                                        <span class="uploadBtn">Upload / Browse File ..</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="hidden" name="article_id" value={{ $article->article_id }} />
                </div>
                <div class="form-group">
                    <label>Summary / Description :</label>
                    <textarea name="description" class="form-control" id="description" autocomplete="on"
                        rows="4">{{ $article->description }}</textarea>
                </div>
                <div class="form-group">
                    <label>Content :</label>
                    <textarea name="content" class="form-control" id="content" autocomplete="on"
                        rows="10"><?php echo utf8_decode($article->content); ?></textarea>
                </div>
                <div class="form-group col-md-12 text-center">
                    <button type="submit" class="btn tab-edit-btn" style="font-weight: 600">
                        Update & Preview Article <i class="far fa-eye"></i>
                    </button>
                    <br>
                    <br>
                    <a class="btn expert-btn1" href="/expert-listarticles">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection