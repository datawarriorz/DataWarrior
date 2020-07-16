@extends('layout.mainlayout')

@section('content')
<link rel="stylesheet" href="./css/home.css" />
<br>
<div class="container carousel-container">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <!-- <li data-target="#carouselExampleIndicators" data-slide-to="4"></li> -->
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="./images/slider3.jpeg" alt="First slide" />
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="./images/slider5.jpeg" alt="Second slide" />
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="./images/slider4.jpeg" alt="Third slide" />
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="./images/slider2.jpeg" alt="Forth slide" />
            </div>
            <!-- <div class="carousel-item">
                <img class="d-block w-100" src="./images/slider5.jpg" alt="Fifth slide" />
            </div> -->
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span aria-hidden="true">
                <i class="fas fa-arrow-circle-left"></i>
            </span>
            <span class="sr-only">Previous

            </span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span aria-hidden="true">
                <i class="fas fa-arrow-circle-right"></i>
            </span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<div class="container search-container text-center" style="width: 100%;">
    <div class="row">
        <form action="" style="width: 100%;">
            <div class="input-group">
                <div class="input-group-prepend">
                    <button class="btn btn-outline-dark rounded-left btn1 disabled" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                <input type="text" class="form-control input-group-append" placeholder="Search..."
                    aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button type="button" class="btn btn2"><span>SEARCH</span></button></a>
                </div>
            </div>
        </form>
    </div>
</div>
<hr class="seperator2">
<div class="content-container">
    <div class="container content1 text-center">
        <div class="container text-center">
            <h1>SERVICES</h1>
        </div>
        <br>
        <div class="row container-column">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="container-items">
                        <h5 class="container-items-header">- Internships -</h5>
                        <p>"Explore yourself...be an intern!"<br><a href="/internship">Click here for
                                details</a></p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="container-items">
                        <h5 class="container-items-header">- Certification -</h5>
                        <p>"Growth...through continuous learning"<br><a href="/certification">Click here for
                                details</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="container-items">
                        <h5 class="container-items-header">- Jobs -</h5>
                        <p>"Somewhere...someone is looking for you"<br><a href="/job">Click here for
                                details</a></p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="container-items">
                        <h5 class="container-items-header">- Projects -</h5>
                        <p>"Change the world...one project at a time"<br><a href="#">Coming Soon</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection