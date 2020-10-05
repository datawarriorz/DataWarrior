@extends('admin.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin/admin-4-1-post-article.css') }}" />
<div class="content-wrapper" id="mycontent-wrapper">
    <div class="col-md-12" style="position: inherit;">
        <div class="row">
            <div class="col-md-12">
                <div class="card dashboard-card">
                    <div class="card-header">
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
                                    Article Form
                                </div>
                                <div class="col-2 text-left">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body dashboard-card-body">
                        <br>
                        <form method="POST" action="/admin-postarticle" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12" style="padding: 0px;">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label>Title :</label>
                                            <input type="text" name="title" class="form-control" placeholder="Eg. "
                                                autocomplete="on" value={{ old('title') }}>
                                        </div>
                                        <div class="form-group">
                                            <label>Author :</label>
                                            <input type="text" name="author" class="form-control" placeholder="Eg. "
                                                autocomplete="on" value={{ old('author') }}>
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
                                        placeholder="Eg. " autocomplete="on" rows="2"
                                        value={{ old('description') }}></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Content :</label>
                                    <textarea name="content" class="form-control" id="content" placeholder="Eg. "
                                        autocomplete="on" rows="10"
                                        value={{ old('content') }}></textarea>
                                </div>
                                <div class="form-group col-md-12 text-center">
                                    <button type="submit" class="btn tab-edit-btn">
                                        Submit & Preview Article <i class="far fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- <div class="col-md-3">
                <div class="col-md-12">
                    <div class="card notification-card right-card">
                        <div class="card-header">
                            <i class="far fa-bell"></i> Notifications
                        </div>
                        <div class="card-body">
                            empty
                        </div>
                    </div>
                    <div class="card trending-card right-card">
                        <div class="card-header">
                            <i class="fas fa-hashtag"></i> Trending Articles
                        </div>
                        <div class="card-body">
                            no articles
                        </div>
                    </div>
                    <div class="card views-card right-card">
                        <div class="card-header">
                            <i class="far fa-eye"></i> Total Views
                        </div>
                        <div class="card-body">
                            no views
                        </div>
                    </div>
                </div>
            </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
