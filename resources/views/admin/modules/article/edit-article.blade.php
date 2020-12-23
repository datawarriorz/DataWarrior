@extends('admin.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin/admin-6-3-edit-article.css') }}" />
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
                                    <strong>Edit Article Details</strong>
                                </div>
                                <div class="col-2 text-left">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/admin-edit-article" enctype="multipart/form-data">
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
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="article_id" value="{{ $article->article_id }}" />
                            </div>
                            <div class="form-group">
                                <label>Summary / Description :</label>
                                <textarea name="description" class="form-control" id="description" autocomplete="on"
                                    rows="4">{{ $article->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Content :</label>
                                <textarea name="content" class="form-control" id="content" autocomplete="on"
                                    rows="10">{{ $article->content }}</textarea>
                            </div>
                            <div class="form-group col-md-12 text-center">
                                <button type="submit" class="btn tab-edit-btn">
                                    Update & Preview Article <i class="far fa-eye"></i>
                                </button>
                                <br>
                                <br>
                                <a class="btn tab-edit-btn" href="/admin-manage-articles">
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
