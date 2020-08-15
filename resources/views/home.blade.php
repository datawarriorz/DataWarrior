@extends('layout.mainlayout')

@section('content')
<link rel="stylesheet" href="./css/main/home.css" />
<div class="jumbotron" style="">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-5">
                <div class="col-12 logo-image">
                    <img class="logo" src="./images/justlogo2.png" alt="Logo" />
                </div>
            </div>
            <div class="col-sm-12 col-md-9 col-lg-7">
                <div class="data-wrapper" style="">
                    <div class="col-12">
                        <h3>Excel your career with the help of our Experts</h3>
                        <h1 class="text-color"><b>Become a Data Warrior!</b></h1>
                    </div>
                    <br>
                    <div class="col-12 text-orange">
                        <a class="register-link" href="{{ route('register') }}">
                            <button type="button" class="btn register-btn">
                                Join Us!
                            </button>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="col-sm-12 col-md-12 col-lg-12 text-center">
    <h2>What is Data Warrior?</h2>
    <br>
</div>
{{-- <div class="container search-container text-center">
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
</div> --}}
<br>
<hr class="seperator2">
<br>
<div class="container carousel-container">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            {{-- <li data-target="#carouselExampleIndicators" data-slide-to="4"></li> --}}
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
            {{-- <div class="carousel-item">
                <img class="d-block w-100" src="./images/slider5.jpg" alt="Fifth slide" />
            </div> --}}
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span aria-hidden="true">
                <i class="fas fa-arrow-circle-left"></i>
            </span>
            <span class="sr-only">
                Previous
            </span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span aria-hidden="true">
                <i class="fas fa-arrow-circle-right"></i>
            </span>
            <span class="sr-only">
                Next
            </span>
        </a>
    </div>
</div>
<br>
<br>
<hr class="seperator2">
<div class="content-container">
    <div class="container content1 text-center">
        <div class="container text-center">
            <h1>SERVICES</h1>
        </div>
        <br>
        <div class="row container-column">

            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="container-items">
                    <h5 class="container-items-header">- Internships -</h5>
                    <p>"Explore yourself...be an intern!"<br>
                        <a href="/internship">
                            Click here for details
                        </a>
                    </p>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="container-items">
                    <h5 class="container-items-header">- Certification -</h5>
                    <p>"Growth...through continuous learning"<br>
                        <a href="/certification">
                            Click here for details
                        </a>
                    </p>
                </div>

            </div>
        </div>
        <div class="row container-column">

            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="container-items">
                    <h5 class="container-items-header">- Jobs -</h5>
                    <p>"Somewhere...someone is looking for you"<br>
                        <a href="/job">
                            Click here for details
                        </a>
                    </p>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="container-items">
                    <h5 class="container-items-header">- Expert Articles -</h5>
                    <p>"Read articles written by our expert"<br>
                        <a href="/view-articles-u">
                            Click here for details
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<hr class="seperator2">

<div class="content-container">
    <div class="container content1 text-center">
        <div class="container text-center">
            <h2>MEET OUR EXPERTS</h2>
        </div>
        <br>
        <div class="row container-column">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="container-items2" style="overflow-x: scroll">
                    {{-- <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <img src="http://cps-static.rovicorp.com/3/JPG_400/MI0003/711/MI0003711195.jpg?partner=allrovi.com"
                                            style="height:144px;width:144px;border-radius:50%" />
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <br>
                                        <h5>Varun</h5>
                                        <p>Business Analytics, NLP and Image Analytics.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <img src="http://cps-static.rovicorp.com/3/JPG_400/MI0003/711/MI0003711195.jpg?partner=allrovi.com"
                                            style="height:144px;width:144px;border-radius:50%" />
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <br>
                                        <h5>Rajesh Kapoor</h5>
                                        <p>Data Science</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <img src="http://cps-static.rovicorp.com/3/JPG_400/MI0003/711/MI0003711195.jpg?partner=allrovi.com"
                                            style="height:144px;width:144px;border-radius:50%" />
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <br>
                                        <h5>Ashay Patil</h5>
                                        <p>Angular</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a> --}}
                    <div class="container-fluid d-cards">
                        <div class="row flex-nowrap ">
                            <div class="col-3">
                                <div class="card card-block">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center"
                                        style="padding-top: 18px;">
                                        <img style="height:144px;width:144px;border-radius:50%" alt="..."
                                            src="http://cps-static.rovicorp.com/3/JPG_400/MI0003/711/MI0003711195.jpg?partner=allrovi.com" />
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Varun</h5>
                                        <p class="card-text">Business Analytics, NLP and Image Analytics.</p>
                                        <a href="#" class="btn btn-primary">View More Info</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card card-block">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center"
                                        style="padding-top: 18px;">
                                        <img style="height:144px;width:144px;border-radius:50%" alt="..."
                                            src="http://cps-static.rovicorp.com/3/JPG_400/MI0003/711/MI0003711195.jpg?partner=allrovi.com" />
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Rajesh Kapoor</h5>
                                        <p class="card-text">Business Analytics, Data Science</p>
                                        <a href="#" class="btn btn-primary">View More Info</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card card-block">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center"
                                        style="padding-top: 18px;">
                                        <img style="height:144px;width:144px;border-radius:50%" alt="..."
                                            src="http://cps-static.rovicorp.com/3/JPG_400/MI0003/711/MI0003711195.jpg?partner=allrovi.com" />
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Ashay Patil</h5>
                                        <p class="card-text">PHP Developer, Laravel Expert</p>
                                        <a href="#" class="btn btn-primary">View More Info</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card card-block">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center"
                                        style="padding-top: 18px;">
                                        <img style="height:144px;width:144px;border-radius:50%" alt="..."
                                            src="http://cps-static.rovicorp.com/3/JPG_400/MI0003/711/MI0003711195.jpg?partner=allrovi.com" />
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Ashay Patil</h5>
                                        <p class="card-text">PHP Developer, Laravel Expert</p>
                                        <a href="#" class="btn btn-primary">View More Info</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card card-block">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center"
                                        style="padding-top: 18px;">
                                        <img style="height:144px;width:144px;border-radius:50%" alt="..."
                                            src="http://cps-static.rovicorp.com/3/JPG_400/MI0003/711/MI0003711195.jpg?partner=allrovi.com" />
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Ashay Patil</h5>
                                        <p class="card-text">PHP Developer, Laravel Expert</p>
                                        <a href="#" class="btn btn-primary">View More Info</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card card-block">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center"
                                        style="padding-top: 18px;">
                                        <img style="height:144px;width:144px;border-radius:50%" alt="..."
                                            src="http://cps-static.rovicorp.com/3/JPG_400/MI0003/711/MI0003711195.jpg?partner=allrovi.com" />
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Ashay Patil</h5>
                                        <p class="card-text">PHP Developer, Laravel Expert</p>
                                        <a href="#" class="btn btn-primary">View More Info</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid m-cards">
                        <div class="row flex-nowrap">
                            <div class="col-12">
                                <div class="card card-block">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center"
                                        style="padding-top: 18px;">
                                        <img style="height:144px;width:144px;border-radius:50%" alt="..."
                                            src="http://cps-static.rovicorp.com/3/JPG_400/MI0003/711/MI0003711195.jpg?partner=allrovi.com" />
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Varun</h5>
                                        <p class="card-text">Business Analytics, NLP and Image Analytics.</p>
                                        <a href="#" class="btn btn-primary">View More Info</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card card-block">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center"
                                        style="padding-top: 18px;">
                                        <img style="height:144px;width:144px;border-radius:50%" alt="..."
                                            src="http://cps-static.rovicorp.com/3/JPG_400/MI0003/711/MI0003711195.jpg?partner=allrovi.com" />
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Rajesh Kapoor</h5>
                                        <p class="card-text">Business Analytics, Data Science</p>
                                        <a href="#" class="btn btn-primary">View More Info</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card card-block">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center"
                                        style="padding-top: 18px;">
                                        <img style="height:144px;width:144px;border-radius:50%" alt="..."
                                            src="http://cps-static.rovicorp.com/3/JPG_400/MI0003/711/MI0003711195.jpg?partner=allrovi.com" />
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Ashay Patil</h5>
                                        <p class="card-text">PHP Developer, Laravel Expert</p>
                                        <a href="#" class="btn btn-primary">View More Info</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card card-block">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center"
                                        style="padding-top: 18px;">
                                        <img style="height:144px;width:144px;border-radius:50%" alt="..."
                                            src="http://cps-static.rovicorp.com/3/JPG_400/MI0003/711/MI0003711195.jpg?partner=allrovi.com" />
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Ashay Patil</h5>
                                        <p class="card-text">PHP Developer, Laravel Expert</p>
                                        <a href="#" class="btn btn-primary">View More Info</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card card-block">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center"
                                        style="padding-top: 18px;">
                                        <img style="height:144px;width:144px;border-radius:50%" alt="..."
                                            src="http://cps-static.rovicorp.com/3/JPG_400/MI0003/711/MI0003711195.jpg?partner=allrovi.com" />
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Ashay Patil</h5>
                                        <p class="card-text">PHP Developer, Laravel Expert</p>
                                        <a href="#" class="btn btn-primary">View More Info</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card card-block">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center"
                                        style="padding-top: 18px;">
                                        <img style="height:144px;width:144px;border-radius:50%" alt="..."
                                            src="http://cps-static.rovicorp.com/3/JPG_400/MI0003/711/MI0003711195.jpg?partner=allrovi.com" />
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Ashay Patil</h5>
                                        <p class="card-text">PHP Developer, Laravel Expert</p>
                                        <a href="#" class="btn btn-primary">View More Info</a>
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