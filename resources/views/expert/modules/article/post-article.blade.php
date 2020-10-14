@extends('expert.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/expert/expert-6-0-post-article.css') }}">
<div class="col-12">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-9 offset-lg-0 no-gutters pl-4 pr-4">
            <div class="col-md-12">
                <div class="card dashboard-card ml-0 mr-0 mb-0 mb-sm-0 mb-md-0 mb-lg-4">
                    <div class="card-header">
                        <div class="col-12 pl-0 pr-0">
                            <div class="row">
                                <div class="col-8 text-left">
                                    <div style="margin-bottom: 0px"><i class="fas fa-columns"></i> Article Form</div>
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
                        <form method="POST" action="/expert-postarticle" enctype="multipart/form-data">
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
                                            <input type="text" name="title" class="form-control" placeholder="Eg. "
                                                autocomplete="on" value="{{ old('title') }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Author :</label>
                                            <input type="text" name="author" class="form-control" placeholder="Eg. "
                                                autocomplete="on" value="{{ old('author') }}">
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
                                                        name="article_image" class="upload" />
                                                    <span class="uploadBtn">Upload / Browse File ..</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Summary / Description :</label>
                                    <textarea name="description" class="form-control" id="description"
                                        placeholder="Eg. " autocomplete="on"
                                        rows="2">{{ old('description') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Content :</label>
                                    <textarea name="content" class="form-control" id="content" placeholder="Eg. "
                                        autocomplete="on" rows="10">{{ old('content') }}</textarea>
                                </div>
                                <div class="form-group col-md-12 text-center">
                                    <br>
                                    <button type="submit" class="btn tab-edit-btn">
                                        Submit & Preview Article <i class="far fa-eye"></i>
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
                        <i class="fas fa-hashtag"></i> Lastest Articles
                    </div>
                    <div class="card-body">
                        no articles posted
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
