@extends('user.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="./css/user/user-8-1-view-article.css">
<div class="col-12 col-sm-12 col-md-10 offset-md-1" style="background-color: white;">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/user-list-articles">Articles</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ substr($article_obj->title,0,15) }}...</li>
            </ol>
        </nav>
        <h2 class="text-xl lg:text-3xl leading-tight text-gray-800 font-bold mt-2">
            {{ $article_obj->title }}
        </h2>
        <br>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-8">
            <div class="jumbotron">
                <div class="col-md-12 text-left">
                    <h6>By - {{ $article_obj->author }}</h6>
                </div>
                <div class="col-md-12 text-right">
                    <h6>Published on - <?php echo date_format($article_obj->created_at,"d M' Y");?></h6>
                </div>
                <br>
                <div class="col-md-12">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($article_obj->article_image); ?>"
                        style="height:280px;width:100%;border-radius:10px" />
                </div>
                <br>
                <div class="col-md-12 text-left">
                    <strong><?php echo nl2br($article_obj->description ); ?></strong>
                </div>
                <br>
                <div class="col-md-12 text-left">
                    <?php echo nl2br($article_obj->content); ?>
                </div>
                <br>
                <div class="col-md-12 text-center">
                    <a href="user-list-articles" <button type="submit" class="btn tab-edit-btn">
                        Go Back
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-4">
            <div class="">
                <div class="text-center" Style="padding:0.5rem;border-bottom:1px solid grey">
                    <h5>Trending Articles</h5>
                </div>
                <div class="text-center">
                    Coming Soon
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
