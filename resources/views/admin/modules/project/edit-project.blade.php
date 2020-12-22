@extends('admin.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin/admin-7-3-edit-project.css') }}" />
<div class="content-wrapper" id="mycontent-wrapper">
    <div class="col-md-12" style="position: inherit;">
        <div class="row">
            <div class="col-md-12">
                <div class="card dashboard-card">
                    <div class="card-header text-center">
                        <div class="col-12 pl-0 pr-0">
                            <div class="row">
                                <div class="col-2 text-left">
                                    <div style="margin-bottom: 0px">
                                        <i class="fas fa-arrow-right open-icon" id="myopen-icon"
                                            onclick="openNav()"></i>
                                        <i class="fas fa-arrow-left close-icon" id="myclose-icon"
                                            onclick="closeNav()"></i>
                                        <i class="fas fa-arrow-right m-open-icon" id="m-myopen-icon"
                                            onclick="mopenNav()"></i>
                                    </div>
                                </div>
                                <div class="col-8 text-center">
                                    Edit Project Details
                                </div>
                                <div class="col-2 text-left">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/admin-edit-project-data" enctype="multipart/form-data">
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
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label>Project Name :</label>
                                            <input type="text" name="project_name" class="form-control"
                                                placeholder="Eg. Festo - Find College Festivals" autocomplete="on"
                                                value="{{ $p->project_name }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Price :</label>
                                            <input type="text" name="project_price" class="form-control"
                                                placeholder="Eg. 1400" autocomplete="on"
                                                value="{{ $p->project_price }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Image :</label>
                                            <div class="upload-btn-wrapper">
                                                <textarea id="uploadFile" class="disableInputField"
                                                    placeholder="Choose File" disabled="disabled" rows="2"
                                                    autocomplete="off"></textarea>
                                                <label class="fileUpload form-control">
                                                    <input id="uploadBtn" enctype="multipart/form-data" type="file"
                                                        name="project_image" class="upload" />
                                                    <span class="uploadBtn">Upload / Browse File ..</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="project_id" value="{{ $p->project_id }}" />
                            </div>
                            <div class="form-group">
                                <label>Summary / Description :</label>
                                <textarea name="project_description" class="form-control" id="project_description" autocomplete="on" rows="4">{{ $p->project_description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Domain :</label>
                                <select class="form-control custom-select col-md-12" name="project_domain">
                                @if($p->project_domain== "data science")
                                    <option selected value="data science">Data Science</option>
                                    <option value="iot">IOT</option>
                                    <option value="programming">Programming</option>
                                    <option value="networking">Networking</option>
                                @elseif($p->project_domain== "iot")
                                    <option value="data science">Data Science</option>
                                    <option selected value="iot">IOT</option>
                                    <option value="programming">Programming</option>
                                    <option value="networking">Networking</option>
                                @elseif($p->project_domain == "programming")
                                    <option value="data science">Data Science</option>
                                    <option value="iot">IOT</option>
                                    <option selected value="programming">Programming</option>
                                    <option value="networking">Networking</option>
                                @elseif($p->project_domain == "networking")
                                    <option value="data science">Data Science</option>
                                    <option value="iot">IOT</option>
                                    <option value="programming">Programming</option>
                                    <option selected value="networking">Networking</option>    
                                @endif
                                </select>
                            </div>
                            <div class="form-group col-md-12 text-center">
                                <button type="submit" class="btn tab-edit-btn">
                                    Update & Preview Project
                                </button>
                                <br>
                                <br>
                                <a class="btn tab-edit-btn" href="/admin-manage-projects">
                                    <i class="fas fa-arrow-left"></i> Back
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
