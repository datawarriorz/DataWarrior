@extends('user.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/user/user-8-0-list-articles.css') }}">
<div class="article-wrapper">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9">
                <div class="col-md-12">
                    <div class="card article-card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-4 text-left">
                                    <h5 style="padding-bottom:0">Articles</h5>
                                </div>
                                <div class="col-8 text-right">
                                    <a href="/" style="text-decoration: none;color:white">
                                        <i class="fas fa-arrow-left"></i> Go Back
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body dashboard-card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link profilenav active" id="articles-tab" data-toggle="tab"
                                                href="#articles" role="tab" aria-controls="articles"
                                                aria-selected="true">
                                                <h5>Latest</h5>
                                            </a>
                                        </li>
                                        {{-- <li class="nav-item">
                                            <a class="nav-link profilenav" id="certification-tab" data-toggle="tab"
                                                href="#certification" role="tab" aria-controls="certification"
                                                aria-selected="false">
                                                <h5>On Review</h5>
                                            </a>
                                        </li> --}}
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="tab-content profile-tab" id="myTabContent">
                                        <div class="tab-pane fade show active" id="articles" role="tabpanel"
                                            aria-labelledby="home-tab">
                                            <div class="container">
                                                <br>
                                                @foreach($articleslive as $article)
                                                    <form method="post" action="/user-view-article">
                                                        <button type="submit" style="background-color: white;
                                                        border: none; outline: none;">
                                                            @csrf
                                                            <input type="hidden" name="article_id"
                                                                value={{ $article->article_id }} />
                                                            <div class="jumbotron"
                                                                style="border-bottom: 2px solid #e7e9ee;">
                                                                <div class="row">
                                                                    <div
                                                                        class="col-xs-12 col-sm-12 col-md-4 text-center">
                                                                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($article->article_image); ?>"
                                                                            style="height:150px;width:100%;border-radius: 11px;" />
                                                                    </div>
                                                                    <div
                                                                        class="col-xs-12 col-sm-12 col-md-8 text-center">
                                                                        <div class="col-md-12 pl-0 pr-0 pt-1 text-left">
                                                                            <h4>{{ $article->title }}</h4>
                                                                        </div>
                                                                        <div class="col-md-12 pl-0 pr-0 pt-1 text-left">
                                                                            <p>Published by - {{ $article->author }}
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-12 pl-0 pr-0 text-left">
                                                                            <p> <?php echo nl2br($article->description); ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </button>
                                                    </form>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="certification" role="tabpanel"
                                            aria-labelledby="education-tab">
                                            <br>
                                            <div class="container" style="overflow-x: scroll">
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 pl-lg-0">
                <div class="col-md-12 pl-lg-0">
                    <div class="card feed-card">
                        <div class="card-header text-center">
                            <h5>Our Certifications</h5>
                        </div>
                        <div class="card-body">
                            @foreach($cert_obj as $cert)
                                <div class"jumbotron" style="border-bottom: 2px solid #e7e9ee;">
                                    <div class="col-md-12 text-left">
                                        <br>
                                        <a href="/certification" style="color:Black">
                                            <h6><b>{{ $cert->title }}</b></h6>
                                            <p> - By {{ $cert->provider }}</p>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection
