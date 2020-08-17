@extends('layout.mainlayout')

@section('content')
<link rel="stylesheet" href="./css/expert/expert-4-2-0-list-articles.css">
<br>
<div class="article-wrapper">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9">
                <div class="col-md-12">
                    <div class="card article-card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-4 text-left">
                                    <h5 style="padding-bottom:0">Articles</h5>
                                </div>
                                <div class="col-md-8 text-right">
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
                                                @foreach($articleslive as $article)
                                                <div class"jumbotron" style="border-bottom: 2px solid #e7e9ee;">
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-4 text-center">

                                                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($article->article_image); ?>"
                                                                style="height:150px;width:100%" />

                                                        </div>
                                                        <div class="col-8 text-center">
                                                            <div class="col-md-12 text-left">
                                                                <h3><b>{{ $article->title }}</b></h3>
                                                            </div>
                                                            <div class="col-md-12 text-left">
                                                                <p>{{ $article->description }}</p>
                                                            </div>
                                                            <div class="col-md-12 text-right">
                                                                <div class="row">
                                                                    <div class="col-md-6 text-left">
                                                                        <h6>Published by - {{ $article->author }}
                                                                        </h6>
                                                                    </div>
                                                                    <div class="col-md-6 text-right">
                                                                        <form method="post" action="/user-view-article">
                                                                            @csrf
                                                                            <input type="hidden" name="article_id"
                                                                                value={{ $article->article_id }} />
                                                                            <button type="submit" class="btn ">
                                                                                View <i class="far fa-eye"></i>
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                </div>
                                                @endforeach
                                                <br>
                                            </div>
                                            <div class="container">

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
            <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">
                <div class="col-md-12">
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