@extends('user.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/main/home.css') }}" />
{{ Session::forget('process') }}
@guest
    <div class="hero-container">
    </div>
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
                            <h3 style="color:white;font-weight:600">Maximize your potential</h3>
                            <h1 class="text-orange"><b>Be a Data Warrior <img width="30rem" height="auto"
                                        src="./images/torch1.png" alt="Logo" /></b></h1>
                        </div>
                        <div class="col-12 p-3">
                            <a class="register-link" href="{{ route('register') }}">
                                <button type="button" class="btn register-btn">
                                    GET STARTED
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="col-12 text-center p-4" style="font-size: 2.5rem;">
        <a href="#seperator2" style="color:#bdbdbd;text-shadow: 0px 14px #d2d2d2;"><i
                class="fas fa-chevron-down"></i></a>
    </div> --}}
    <div class="whatwedo-container">
        <div class="col-12 col-md-8 offset-md-2 offset text-center pt-5 mt-4">
            <h4><b>WHAT WE DO</b></h4>
            <p class="p-2">We offer you the opportunity of a Better Career by providing Jobs, Internships, Training,
                Projects and
                Knowledge Sharing. Talk to our Counsellors and Experts they will lead you to a better future! </p>
        </div>
    </div>
@else
    <br><br>
    <div class="container">
        <h2>
            Welcome {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}!
        </h2>
    </div>
@endguest
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
<hr class="seperator2" id="seperator2">
<div class="content-container">
    {{-- <hr class="seperator2"> --}}
    <br>
    <div class="container content1 text-center">
        <div class="container text-center">
            <h2 style="font-weight:600">SERVICES WE OFFER...</h2>
            <br>
            <br>
        </div>
        <div class="row container-column">
            <div class="col-sm-12 col-md-6 col-lg-3">
                <a href="/ihome" style="text-decoration: none">
                    <div class="container-items">
                        <img src="./images/internship.png" height="100px" />
                        <h5 class="container-items-header"><small>INTERNSHIPS</small></h5>
                        <p class="container-items-desc">Explore yourself!<br> Become an Intern.
                            <br>
                            <br>
                            <small><strong>KNOW MORE ></strong></small>
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
                <a href="/chome" style="text-decoration: none">
                    <div class="container-items">
                        <img src="./images/certification.png" height="100px" />
                        <h5 class="container-items-header"><small>CERTIFICATIONS</small></h5>
                        <p class="container-items-desc">
                            Growth...through continuous learning
                            <br>
                            <br>
                            <small><strong>KNOW MORE ></strong></small>
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
                <a href="/jhome" style="text-decoration: none">
                    <div class="container-items">
                        <img src="./images/jobs.png" height="100px" />
                        <h5 class="container-items-header"><small>JOBS</small></h5>
                        <p class="container-items-desc">
                            Somewhere...someone is looking for you
                            <br>
                            <br>
                            <small><strong>KNOW MORE ></strong></small>
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
                <a href="/phome" style="text-decoration: none">
                    <div class="container-items">
                        <img src="./images/projects.png" height="100px" />
                        <h5 class="container-items-header"><small>PROJECTS</small></h5>
                        <p class="container-items-desc">
                            Have an idea? Let us help you develop it
                            <br>
                            <br>
                            <small><strong>KNOW MORE ></strong></small>
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="container content1 text-center">
    <div class="container text-center">
        <h2 style="font-weight:600">KNOWLEDGE FORUM</h2>
        <br>
        <br>
    </div>
    <div class="container">
        <div class="row container-column">
            {{-- <div class="col-sm-12 col-md-4">
            <div class="knowledge-items">
                style="background-image: linear-gradient(225deg,#fdfdfd,#7BBAD2);"
                <img src="./images/blogs.png" alt="First slide" height="100%">
                <h6 class="knowledge-items-header">BLOGS</h6>
                <small>COMING SOON</small>
            </div>
        </div> --}}
            <div class="col-sm-12 col-md-6">
                <a href="/eshome" style="text-decoration:none">
                    <div class="knowledge-items">
                        <img src="./images/expertspeak.png" alt="First slide" height="100%">
                        <h6 class="knowledge-items-header">EXPERT SPEAK</h6>
                        <small>KNOW MORE ></small>
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-md-6">
                <a href="/user-list-articles" style="text-decoration:none">
                    <div class="knowledge-items">
                        {{-- style="background-image: linear-gradient(225deg,#fff,#f4e88c);" --}}
                        <img src="./images/article.png" alt="First slide" height="100%">
                        <h6 class="knowledge-items-header">ARTICLES</h6>
                        <small>KNOW MORE ></small>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
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
                            <form method="post" action="/certificationlist">
                                @csrf
                                <input type="hidden" name="cert_domain" value="datascience">
                                <button class="btn tab-edit-btn" type="submit">
                                    <div class="domain-name">
                                        KNOW MORE
                                    </div>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<br>
@endsection
