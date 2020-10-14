@extends('admin.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin/admin-6-2-view-article.css') }}">
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
                                    Article #{{ $article->article_id }}
                                </div>
                                <div class="col-2 text-left">
                                </div>
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
                                        <strong><?php echo nl2br( $article->description); ?></strong>
                                    </div>
                                    <br>
                                    <div class="col-md-10 offset-md-1 text-left">
                                        <?php echo nl2br($article->content); ?>
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
                                                    value="{{ $article->article_id }}" />
                                                <button type="submit" class="btn tab-edit-btn">
                                                    Publish <i class="far fa-eye"></i>
                                                </button>
                                            </form>
                                        @endif
                                        @if($article->status == 'published')
                                            <form method="POST" action="/admin-takedown-article">
                                                @csrf
                                                <input type="hidden" name="article_id"
                                                    value="{{ $article->article_id }}" />
                                                <button type=" submit" class="btn tab-edit-btn">
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
