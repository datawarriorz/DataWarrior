@extends('expert.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/expert/expert-7-0-post-certification.css') }}">
<div class="col-12">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-9 offset-lg-0 no-gutters pl-4 pr-4">
            <div class="col-md-12">
                <div class="card dashboard-card ml-0 mr-0 mb-0 mb-sm-0 mb-md-0 mb-lg-4">
                    <div class="card-header">
                        <div class="col-12 pl-0 pr-0">
                            <div class="row">
                                <div class="col-8 text-left">
                                    <div style="margin-bottom: 0px"><i class="fas fa-columns"></i> Certification Form
                                    </div>
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
                                                autocomplete="on" value="{{ old('cert_title') }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Price :</label>
                                            <input type="text" name="cert_price" class="form-control" placeholder="Eg. "
                                                autocomplete="on" value="{{ old('cert_price') }}">
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
                                        placeholder="Eg. " autocomplete="on" rows="2">{{ old('cert_description') }}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label>Pre - Requiste :</label>
                                    <textarea name="cert_prerequisites" class="form-control" id="cert_prerequisites"
                                        placeholder="Eg. " autocomplete="on" rows="2">{{ old('cert_prerequisites') }}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label>Provider :</label>
                                    <input type="text" name="cert_provider" class="form-control" placeholder="Eg. "
                                        autocomplete="on" value="{{ old('cert_provider') }}">
                                </div>
                                <div class="form-group">
                                    <label>Domain :</label>
                                    <input type="text" name="cert_domain" class="form-control" placeholder="Eg. "
                                        autocomplete="on" value="{{ old('cert_domain') }}">
                                </div>
                                <div class="form-group">
                                    <label>Validation Period :</label>
                                    <input type="text" name="cert_validationperiod" class="form-control"
                                        placeholder="Eg. " autocomplete="on"
                                        value="{{ old('cert_validationperiod') }}">
                                </div>

                                <div class="form-group col-md-12 text-center">
                                    <br>
                                    <button type="submit" class="btn tab-edit-btn">
                                        Post Certification</i>
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
@endsection
