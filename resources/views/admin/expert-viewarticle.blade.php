@extends('layout.expertlayout')

@section('content')
<link rel="stylesheet" href="./css/expert-viewarticles.css">
<link rel="stylesheet" href="./css/expert-master.css">
<div class="dashboard-wrapper">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-9">
                <div class="col-md-12">
                    <div class="card dashboard-card">
                        <div class="card-header">
                            <h5>Article #{{ $article->article_id }}</h5>
                        </div>
                        <div class="card-body dashboard-card-body">
                            <div class="row">
                                <div class="col-md-12 text-left">
                                    <div class="jumbotron">
                                        <div class="col-md-12 text-left">
                                            <h2 class="text-xl lg:text-3xl leading-tight text-gray-800 font-bold mt-2">
                                                {{ $article->title }}
                                            </h2>
                                        </div>
                                        <div class="col-md-12 text-left">
                                            <h6>By - {{ $article->author }}</h6>
                                        </div>
                                        <div class="col-md-12 text-right">
                                            <h6>Published - {{ $article->created_at }}</h6>
                                        </div>
                                        <br>
                                        <div class="col-md-12">
                                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($article->article_image); ?>"
                                                style="height:280px;width:100%" />
                                        </div>
                                        <br>
                                        <div class="col-md-12 text-left">
                                            <strong>{{ $article->description }}</strong>
                                        </div>
                                        <br>
                                        <div class="col-md-12 text-left">
                                            {{ $article->content }}
                                        </div>
                                        <br>
                                        <div class="col-md-12 text-center">
                                            <a href="/expert-listarticles">
                                                <button type="button" class="btn tab-edit-btn">
                                                    View More Articles
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="col-md-12">
                    <div class="card feed-card">
                        <div class="card-header">
                            <h5>Trending Articles</h5>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
