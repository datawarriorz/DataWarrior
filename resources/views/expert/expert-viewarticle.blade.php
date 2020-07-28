@extends('layout.expertlayout')

@section('content')
<link rel="stylesheet" href="./css/expert-listarticles.css">
<div class="dashboard-wrapper">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-9">
                <div class="col-md-12">
                    <div class="card dashboard-card">
                        <div class="card-header">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8 ">
                                        <h5>Title - {{ $article->title }}</h5>
                                    </div>
                                    <div class="col-md-4 text-right">
                                        <h5>By - {{ $article->author }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body dashboard-card-body">
                            <br>
                            <div class="row">
                                <div class="col-md-12 text-left">
                                    <h6>Introduction</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-left">
                                    {{ $article->description }}
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <img
                                        src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($article->article_image); ?>" />
                                    <?php echo ($article->content)?>
                                </div>
                            </div>
                            <br>
                            <div class=" row">
                                <div class="col-md-12 text-right">
                                    <h6>{{ $article->created_at }}</h6>
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
                            <h5>Feed</h5>
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
