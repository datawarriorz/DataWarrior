@extends('expert.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/expert/expert-6-2-view-article.css') }}">
<div class="dashboard-wrapper">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-9">
                <div class="col-md-12">
                    <div class="card dashboard-card">
                        <div class="card-header">
                            <div class="col-12 pl-0 pr-0">
                                <div class="row">
                                    <div class="col-6 text-left">
                                        <div style="margin-bottom: 0px">
                                            <h5><i class="fas fa-columns"></i> Article #{{ $article->article_id }}
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a class="tab-edit-btn" href="/expert-listarticles">
                                            <i class="fas fa-arrow-left"></i> Back
                                        </a>
                                    </div>
                                </div>
                            </div>
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
                                            <h6>Published on - <?php echo date_format($article->created_at,"d M' Y");?>
                                            </h6>
                                        </div>
                                        <br>
                                        <div class="col-md-12">
                                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($article->article_image); ?>"
                                                style="height:280px;width:100%" />
                                        </div>
                                        <br>
                                        <div class="col-md-12 text-left">
                                            <strong><?php echo nl2br($article->description); ?></strong>
                                        </div>
                                        <br>
                                        <div class="col-md-12 text-left article-content">
                                            <?php echo nl2br($article->content); ?>
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
