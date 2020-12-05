@extends('user.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/user/user-10-0-es-home.css') }}" />
<link rel="stylesheet" href="{{ asset('css/user/user-9-0-certification-home.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/home.css') }}" />
<div class="container" style="padding-top:17px;">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="carousel-image d-block w-100" style="border-radius:5px;" src="./images/certification1.png"
                    alt="First slide">
                <div class="carousel-caption">
                    <div class="primary_heading" style="color:#394c66">
                        Expert Speak
                    </div>
                    <div class="secondary_heading d-none d-md-block" style="color:#2a546c"> Talk to our experts
                        <br class="d-block d-sm-none"> and get <br> more knowledge about the industry
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
{{-- <hr class="seperator2"> --}}
<div class="content-container">
    <div class="container content1 text-center">
        <div class="container text-center">
            <h2>Meet our Experts</h2>
        </div>
        <br>
        <div class="row container-column">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="container-items2" style="overflow-x: scroll">
                    <div class="container-fluid d-cards">
                        <div class="row flex-nowrap ">
                            @foreach($expertsobj as $ex)
                                <div class="col-3">
                                    <div class="card card-block">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center"
                                            style="padding-top: 18px;">
                                            <img class="home-expert-dp"
                                                src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($ex->ex_image); ?>"
                                                style="height:144px;width:144px;border-radius:50%" />
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                {{ $ex->ex_firstname }} {{ $ex->ex_lastname }}
                                            </h5>
                                            <p class="card-text">{{ $ex->ex_aboutme }}</p>
                                            <form method="POST" action="/user-view-expert">
                                                @csrf
                                                <input type="hidden" value="{{ $ex->ex_id }}" name="ex_id">
                                                <button type="submit" class="btn btn-primary">View More Info</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="container-fluid m-cards">
                        <div class="row flex-nowrap">
                            @foreach($expertsobj as $ex)
                                <div class="col-12">
                                    <div class="card card-block">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center"
                                            style="padding-top: 18px;">
                                            <img class="home-expert-dp"
                                                src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($ex->ex_image); ?>"
                                                style="height:144px;width:144px;border-radius:50%" />
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                {{ $ex->ex_firstname }} {{ $ex->ex_lastname }}
                                            </h5>
                                            <p class="card-text">{{ $ex->ex_aboutme }}</p>
                                            <form method="POST" action="/user-view-expert">
                                                @csrf
                                                <input type="hidden" value="{{ $ex->ex_id }}" name="ex_id">
                                                <button type="submit" class="btn btn-primary">View More Info</button>
                                            </form>
                                        </div>
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
@endsection
