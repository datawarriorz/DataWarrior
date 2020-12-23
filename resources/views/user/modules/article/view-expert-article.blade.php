@extends('user.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/user/user-4-2-1-view-article.css') }}">
<br>
<div class="dashboard-wrapper">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-9">
                <div class="col-md-12">
                    <div class="card dashboard-card">
                        <div class="card-header">
                            <h5>Article #{{ $article_obj->article_id }}</h5>
                        </div>
                        <div class="card-body dashboard-card-body">
                            <div class="row">
                                <div class="col-md-12 text-left">
                                    <div class="jumbotron" style="background-color: white;padding: 0rem 2rem;">
                                        <div class="col-md-12 text-left">
                                            <h2 class="text-xl lg:text-3xl leading-tight text-gray-800 font-bold mt-2">
                                                {{ $article_obj->title }}
                                            </h2>
                                        </div>
                                        <div class="col-md-12 text-left">
                                            <h6>By - {{ $article_obj->author }}</h6>
                                        </div>
                                        <div class="col-md-12 text-right">
                                            <h6>Published on - {{ $article_obj->created_at }}</h6>
                                        </div>
                                        <br>
                                        <div class="col-md-12">
                                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($article_obj->article_image); ?>"
                                                style="height:280px;width:100%" />
                                        </div>
                                        <br>
                                        <div class="col-md-12 text-left">
                                            <strong>{{ $article_obj->description }}</strong>
                                        </div>
                                        <br>
                                        <div class="col-md-12 text-left">
                                            {{ $article_obj->content }}
                                        </div>
                                        <br>
                                        <div class="col-md-12 text-center">
                                            <form method="post" action="/user-view-expert">
                                                @csrf
                                                <input type="hidden" name="ex_id"
                                                    value={{ $article_obj->creator_id }} />
                                                <button type="submit" class="btn tab-edit-btn">
                                                    Go Back
                                                </button>
                                            </form>
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
<br>
@endsection
