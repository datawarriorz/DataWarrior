@extends('layout.adminlayout')

@section('content')
<link rel="stylesheet" href="./css/expert-postarticle.css">
<link rel="stylesheet" href="./css/expert-master.css">
<div class="col-md-8 offset-md-2">
    <div>
        <form method="POST" action="/admin-postarticle" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header text-center">
                    Article Form
                </div>
                <div class="card-body">
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
                        <div class="form-group">
                            <label>Summary / Description :</label>
                            <textarea name="description" class="form-control" id="description" placeholder="Eg. "
                                autocomplete="on" rows="2" value={{ old('description') }}></textarea>
                        </div>
                        <div class="form-group">
                            <label>Content :</label>
                            <textarea name="content" class="form-control" id="content" placeholder="Eg. "
                                autocomplete="on" rows="10" value={{ old('content') }}></textarea>
                        </div>
                        <div class="form-group col-md-12 text-center">
                            <button type="submit" class="btn tab-edit-btn">
                                Submit & Preview Article <i class="far fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
