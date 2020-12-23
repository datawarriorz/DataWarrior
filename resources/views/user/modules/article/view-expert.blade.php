@extends('user.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/user/user-5-0-profile.css') }}">
<br>
<div class="col-12 col-sm-12 col-md-8 col-lg-8 offset-md-2 ">
    <div class="card">
        <div class="card-header text-center">
            <h4>Expert</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-head">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-4 col-lg-3 text-center"
                                    style="padding-left: 0;padding-right:0">
                                    <div class="col-12" style="padding-left: 0;padding-right:0">
                                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($expertobj->ex_image); ?>"
                                            style="height:144px;width:144px;border-radius:50%" />
                                    </div>
                                </div>
                                <div
                                    class="col-12 col-sm-12 col-md-8 col-lg-9 text-md-left pl-4 pr-4 pt-4 pb-0 text-center">
                                    <div class=".justify-content-sm-center">
                                        <h5>{{ $expertobj->ex_firstname }} {{ $expertobj->ex_lastname }}</h5>
                                        <h6>{{ $expertobj->email }}</h6>
                                        <br>
                                        <h6>{{ $expertobj->ex_aboutme }}</h6>
                                        <br>
                                        <h6>{{ $expertobj->ex_description }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link profilenav active" id="userdetails-tab" data-toggle="tab"
                                    href="#userdetails" role="tab" aria-controls="userdetails" aria-selected="true">
                                    Articles Published
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="userdetails" role="tabpanel"
                            aria-labelledby="home-tab">
                            <div class="container pl-0 pr-0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="min-width: 70px;">Sr. No</th>
                                            <th scope="col" style="min-width: 180px;">Artile Title</th>
                                            <th scope="col" style="min-width: 280px;">Description</th>
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; ?>
                                        @foreach($articleslive as $article)
                                            <?php $i++; ?>
                                            <tr>
                                                <td><?php echo $i;?>
                                                </td>
                                                <td>
                                                    {{ $article->title }}
                                                </td>
                                                <td>
                                                    {{ $article->description }}
                                                </td>
                                                <td class="text-center">
                                                    <form method="post" action="/user-expert-view-article">
                                                        @csrf
                                                        <input type="hidden" name="article_id"
                                                            value={{ $article->article_id }} />
                                                        <button type="submit" class="btn tab-edit-btn">
                                                            View <i class="far fa-eye"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
                                    <a class="btn tab-edit-btn" href="/eshome">Go Back</a>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<br>
@endsection
