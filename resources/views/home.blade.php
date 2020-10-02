@extends('layout.mainlayout')

@section('content')
<link rel="stylesheet" href="./css/main/home.css" />
<div class="jumbotron" style="">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-5">
                <div class="col-12 logo-image">
                    <img class="logo" src="./images/justlogo2.png" alt="Logo" />
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-7">
                <div class="data-wrapper" style="">
                    <div class="col-12">
                        <h3>Maximize your potential</h3>
                        <h1 class="text-orange"><b>Be a Data Warrior <img width="30rem" height="auto"
                                    src="./images/torch1.png" alt="Logo" /></b></h1>
                    </div>
                    <br>
                    <div class="col-12">
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
<br><br>
{{-- <hr class="seperator2">
<div class="col-sm-12 col-md-12 col-lg-12 text-center">
    <h2>The Code of DataWarrior</h2>
    <br>
    <div class="col-12 col-sm-12 col-md-8 offset-md-2 text-center">
        <p>A DataWarrior seeks to use data & information technology (IT) for a
            better career.</p>
        <p> He counters the anxiety that students and
            professionals face by being more informed and skilled at his chosen
            technology through learning and the sharing of ideas.
        </p>
        <p>The DataWarrior knows that every professional challenge can be
            overcome through knowledge, training and wisdom.
        </p>
        <br>
    </div>
</div> --}}
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
{{-- <hr class="seperator2">
<div class="container carousel-container">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
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
            <div class="carousel-item">
                <img class="d-block w-100" src="./images/slider5.jpg" alt="Fifth slide" />
            </div>
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
<br> --}}
<hr class="seperator2">
<br>
<div class="content-container">
    <div class="container content1 text-center">
        <div class="container text-center">
            <h2 style="font-weight:600">KNOWLEDGE FORUM</h2>
            <br>
            <br>
        </div>
        <div class="row container-column">
            <div class="col-md-4">
                <div class="knowledge-items">
                    {{-- style="background-image: linear-gradient(225deg,#fdfdfd,#7BBAD2);" --}}
                    <img src="./images/blogs.png" alt="First slide" height="100%">
                    <h6 class="knowledge-items-header">BLOGS</h6>
                </div>
            </div>
            <div class="col-md-4">
                <div class="knowledge-items">
                    {{-- style="background-image: linear-gradient(225deg,#eff0ea,#a8f4b8);" --}}
                    <img src="./images/expertspeak.png" alt="First slide" height="100%">
                    <h6 class="knowledge-items-header">EXPERT SPEAK</h6>
                </div>
            </div>
            <div class=" col-md-4">
                <a href="/user-list-articles" style="text-decoration:none">
                    <div class="knowledge-items">
                        {{-- style="background-image: linear-gradient(225deg,#fff,#f4e88c);" --}}
                        <img src="./images/article.png" alt="First slide" height="100%">
                        <h6 class="knowledge-items-header">ARTICLES</h6>
                    </div>
                </a>
            </div>
        </div>
    </div>
    {{-- <hr class="seperator2"> --}}
    <div class="content-container">
        <div class="container content1 text-center">
            <div class="container text-center">
                <h2 style="font-weight:600">SERVICES WE OFFER...</h2>
                <br>
                <br>
            </div>
            <div class="row container-column">
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="container-items">
                        <img src="./images/internship.png" height="100px" />
                        <h5 class="container-items-header"><small>INTERNSHIPS</small></h5>
                        <p class="container-items-desc">Explore yourself!<br> Become an Intern.
                            <br>
                            <br>
                            <a href="">
                                <small><strong>KNOW MORE ></strong></small>
                            </a>
                        </p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="container-items">
                        <img src="./images/certification.png" height="100px" />
                        <h5 class="container-items-header"><small>CERTIFICATIONS</small></h5>
                        <p class="container-items-desc">
                            Growth...through continuous learning
                            <br>
                            <br>
                            <a href="/certification">
                                <small><strong>KNOW MORE ></strong></small>
                            </a>
                        </p>
                    </div>

                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="container-items">
                        <img src="./images/jobs.png" height="100px" />
                        <h5 class="container-items-header"><small>JOBS</small></h5>
                        <p class="container-items-desc">
                            Somewhere...someone is looking for you
                            <br>
                            <br>
                            <a href="/jhome">
                                <small><strong>KNOW MORE ></strong></small>
                            </a>
                        </p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="container-items">
                        <img src="./images/projects.png" height="100px" />
                        <h5 class="container-items-header"><small>PROJECTS</small></h5>
                        <p class="container-items-desc">
                            Have an idea? Let us help you develop it
                            <br>
                            <br>
                            <small><b>COMING SOON</b></small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--<hr class="seperator2">
 <div class="content-container">
    <div class="container content1 text-center">
        <div class="container text-center">
            <h2>Meet our Experts</h2>
        </div>
        <br>
        <div class="row container-column">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="container-items2" style="overflow-x: hidden">
                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
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
                    </a>
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
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center" style="padding-top: 18px;">
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
</div> --}}
<div id="content">
    <section class="specialization-courses">
        <div class="container text-center">
            <h2 style="font-weight:600">FEATURED</h2>
            <br>
            <br>
        </div>
        <div class="row">
            <div class="col-xs-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1">
                <div class="specialization-card">
                    <div class="image-holder"></div>
                    <div class="w-100-on-sm"></div>
                    <div class="details-box">
                        <div class="content-box">
                            <p class="training-name">DATA SCIENCE</p>
                            <label class="training-info">Learn and build a career in Data Science</label>
                            <div class="gradient-horizontal-rule"></div>
                            <label class="duration"><strong>Some of the courses we offer:</strong></label>
                            {{-- <hr class="light-rule"> --}}
                            {{-- <label class="training-list-title">This specialization includes 4 trainings:</label> --}}
                            <div class="training-list">
                                <div>
                                    <div class="list-numbering-container">
                                        <div></div>
                                    </div>
                                    <div>Programming with R</div>
                                </div>
                                <div>
                                    <div class="list-numbering-container">
                                        <div></div>
                                    </div>
                                    <div>Machine Learning with R</div>
                                </div>
                                <div>
                                    <div class="list-numbering-container">
                                        <div></div>
                                    </div>
                                    <div>Tableau with Excel</div>
                                </div>
                                <div>
                                    <div class="list-numbering-container">
                                        <div></div>
                                    </div>
                                    <div>Python for DS & DA </div>
                                </div>
                            </div>
                        </div>
                        <div class="ribbon-message">
                            Get Mentorship from our practicing Data Scientist
                        </div>
                        <div class="know-more-box">
                            <a href="" class="btn know-more-cta">KNOW MORE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<br>
@endsection