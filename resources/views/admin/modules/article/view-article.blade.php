@extends('admin.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="./css/expert/expert-4-2-1-view-article.css">
<div class="content-wrapper" id="mycontent-wrapper">
    <div class="col-md-12" style="position: inherit;">
        <div class="row">
            <div class="col-md-12">
                <div class="card dashboard-card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4 text-left">
                                <div style="margin-bottom: 0px">
                                    <i class="fas fa-columns open-icon" id="myopen-icon" onclick="openNav()"></i>
                                    <i class="fas fa-columns close-icon" id="myclose-icon" onclick="closeNav()"></i>
                                    <i class="fas fa-columns m-open-icon" id="m-myopen-icon" onclick="mopenNav()"></i>
                                    Article #{{ $article->article_id }}
                                </div>
                            </div>
                            <div class="col-md-8 text-right">
                                <a href="/admin-manage-articles">
                                    <button type="button" class="btn tab-edit-btn">
                                        <i class="fas fa-arrow-left"></i> Go Back
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body dashboard-card-body">
                        <div class="row">
                            <div class="col-md-12 text-left">
                                <div class="jumbotron" style="padding: 1rem 1rem;">
                                    <div class="col-md-10 offset-md-1 text-left">
                                        <h2 class="text-xl lg:text-3xl leading-tight text-gray-800 font-bold mt-2">
                                            {{ $article->title }}
                                        </h2>
                                    </div>
                                    <div class="col-md-10 offset-md-1 text-left">
                                        <h6>By - {{ $article->author }}</h6>
                                    </div>
                                    <br>
                                    <div class="col-md-10 offset-md-1 text-left">
                                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($article->article_image); ?>"
                                            style="height:340px;width:100%" />
                                    </div>
                                    <br>
                                    <div class="col-md-10 offset-md-1 text-left">
                                        <strong>{{ $article->description }}</strong>
                                    </div>
                                    <br>
                                    <div class="col-md-10 offset-md-1 text-left">
                                        {{ $article->content }}
                                    </div>
                                    <br>
                                    <div class="col-md-10 offset-md-1 text-right">
                                        <h6>Published On - {{ $article->created_at }}</h6>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        @if($article->status == 'review')
                                            <form method="POST" action="/admin-publish-article">
                                                @csrf
                                                <input type="hidden" name="article_id"
                                                    value={{ $article->article_id }} />
                                                <button type="submit" class="btn ">
                                                    Publish <i class="far fa-eye"></i>
                                                </button>
                                            </form>
                                        @endif
                                        @if($article->status == 'published')
                                            <form method="POST" action="/admin-takedown-article">
                                                @csrf
                                                <input type="hidden" name="article_id"
                                                    value={{ $article->article_id }} />
                                                <button type="submit" class="btn expert-btn1">
                                                    Take Down <i class="far fa-eye"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
