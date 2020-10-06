@extends('expert.layout.masterlayout')

@section('content')

<link rel="stylesheet" href="./css/expert/expert-4-1-3-edit-article.css">
<br>
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
                    <a class="btn tab-edit-btn" href="/expert-listarticles">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection