@extends('admin.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin/admin-7-0-post-project.css') }}" />
<div class="content-wrapper" id="mycontent-wrapper">
    <div class="col-md-12" style="position: inherit;">
        <div class="row">
            <div class="col-md-12">
                <div class="card dashboard-card">
                    <div class="card-header">
                        <div class="col-12 pl-0 pr-0">
                            <div class="row">
                                <div class="col-3 text-left">
                                    <div style="margin-bottom: 0px">
                                        <i class="fas fa-arrow-right open-icon" id="myopen-icon"
                                            onclick="openNav()"></i>
                                        <i class="fas fa-arrow-left close-icon" id="myclose-icon"
                                            onclick="closeNav()"></i>
                                        <i class="fas fa-arrow-right m-open-icon" id="m-myopen-icon"
                                            onclick="mopenNav()"></i>
                                    </div>
                                </div>
                                <div class="col-6 text-center">
                                    Project Form
                                </div>
                                <div class="col-3 text-right">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body dashboard-card-body">
                        <br>
                        <form method="POST" action="/admin-post-project-data" enctype="multipart/form-data">
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
                                            <label>Project Name / Technology Used:</label>
                                            <input type="text" name="project_name" class="form-control"
                                                placeholder="Eg. Festo - Find College Festivals / PHP" autocomplete="on"
                                                value="{{ old('project_name') }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Project Price in Rs:</label>
                                            <input type="text" name="project_price" class="form-control"
                                                placeholder="Eg. 1200" autocomplete="on"
                                                value="{{ old('project_price') }}">
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
                                                        name="project_image" class="upload" />
                                                    <span class="uploadBtn">Upload / Browse File ..</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Summary / Description :</label>
                                    <textarea name="project_description" class="form-control" id="project_description"
                                        autocomplete="on" rows="6">
                                        {{ old('project_description') }}
                                    </textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label>Drive Link :</label>
                                            <input type="text" name="project_link" class="form-control"
                                                id="project_link" placeholder="" autocomplete="on"
                                                value="{{ old('project_link') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Domain :</label>
                                            <select class="form-control custom-select col-md-12" name="project_domain">
                                                <option value="data science">Data Science</option>
                                                <option value="iot">IOT</option>
                                                <option value="programming">Programming</option>
                                                <option value="networking">Networking</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-12 text-center">
                                    <button type="submit" class="btn tab-edit-btn">
                                        Submit & Preview Project <i class="far fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
