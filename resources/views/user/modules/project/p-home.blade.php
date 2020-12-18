@extends('user.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/user/user-10-0-project-home.css') }}" />
<div class="container" style="Padding-top:17px;">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="carousel-image d-block w-100" style="border-radius:5px;" src="./images/certification1.png"
                    alt="First slide">
                <div class="carousel-caption">
                    <div class="primary_heading" style="color:#394c66"> Find the project you need
                        <br> for your mini project.
                    </div>
                    <div class="secondary_heading d-none d-md-block d-lg-none">Apply Now
                        <br class="d-block d-sm-none"> for free
                    </div>
                    {{-- <div class="view_certification">
                        <span class="link"><a>View</a></span>
                    </div> --}}
                </div>
            </div>
            <div class="carousel-item">
                <img class="carousel-image d-block w-100" style="border-radius:5px;" src="./images/certification2.png"
                    alt="Second slide">
                <div class="carousel-caption">
                    <div class="primary_heading" style="color:#394c66"> Find the project you need
                        <br class=" d-block d-lg-none"> for your mini project.
                    </div>
                    <div class="secondary_heading d-none d-md-block d-lg-none">Apply Now
                        <br class="d-block d-sm-none"> for free !
                    </div>
                    {{-- <div class="view_certification text-center">
                        <span class="link"><a>View</a></span>
                    </div> --}}
                </div>
            </div>
            <div class="carousel-item">
                <img class="carousel-image d-block w-100" style="border-radius:5px;" src="./images/certification3.png"
                    alt="Third slide">
                <div class="carousel-caption">
                    <div class="primary_heading" style="color:#394c66"> Find the project you need
                        <br class=" d-block d-lg-none"> for your mini project.
                    </div>
                    <div class="secondary_heading d-none d-md-block d-lg-none">Apply Now
                        <br class="d-block d-sm-none"> for free !
                    </div>
                    {{-- <div class="view_certification">
                        <span class="link"><a>View</a></span>
                    </div> --}}
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<br>
{{-- 
<div class="container">
    <div class="certificate-content">
        <div class="col-12">
            <div class="row">
                <div class="cert-cards col-12 col-sm-12 col-md-6 col-lg-6 pl-md-0">
                    <form method="post" action="/certificationlist">
@csrf
                        <input type="hidden" name="cert_provider" value="Data Warriors">
                        <button class="btn cert-button" type="submit" style="color: #203e68;">
                            <div class="cert-image">
                                <img src="./images/jihome/datascience.png" alt="First slide" height="100%">
                            </div>
                            <div class="cert-name">
                                <h3>Certification from Data Warriors </h3>
                            </div>
                        </button>
                    </form>
                </div>
                <div class="cert-cards col-12 col-sm-12 col-md-6 col-lg-6 pr-md-0">
                    <form method="post" action="/certificationlist">
@csrf
                        <input type="hidden" name="cert_provider" value="IBM">
                        <button class="btn cert-button" type="submit" style="color: #203e68;">
                            <div class="cert-image">
                                <img src="./images/jihome/datascience.png" alt="First slide" height="100%">
                            </div>
                            <div class="cert-name">
                                <h3>Certificaiton from IBM</h3>
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="container">
    <div class="domain-content">
        <div class="domain-header">
            <h4>Popular domains</h4>
        </div>
        <div class="domain-body jumbotron">
            <div class="row">
                <div class="domain-cards col-6 col-sm-6 col-md-4 col-lg-2 text-center">
                    <form method="post" action="/certificationlist">
                        @csrf
                        <input type="hidden" name="cert_domain" value="datascience">
                        <button class="btn domain-button" type="submit">
                            <div class="domain-image">
                                <img src="./images/jihome/datascience.png" alt="First slide" height="100%">
                            </div>
                            <div class="domain-name">
                                Data Science
                            </div>
                        </button>
                    </form>
                </div>
                <div class="domain-cards col-6 col-sm-6 col-md-4 col-lg-2 text-center">
                    <form method="post" action="/certificationlist">
                        @csrf
                        <input type="hidden" name="cert_domain" value="informationsecurity">
                        <button class="btn domain-button" type="submit">
                            <div class="domain-image">
                                <img src="./images/jihome/machinelearning.png" alt="First slide" height="100%">
                            </div>
                            <div class="domain-name">
                                Information Security
                            </div>
                        </button>
                    </form>
                </div>
                <div class="domain-cards col-6 col-sm-6 col-md-4 col-lg-2 text-center">
                    <form method="post" action="/certificationlist">
                        @csrf
                        <input type="hidden" name="cert_domain" value="programming">
                        <button class="btn domain-button" type="submit">
                            <div class="domain-image">
                                <img src="./images/jihome/webdevelopment.png" alt="First slide" height="100%">
                            </div>
                            <div class="domain-name">
                                Programming
                            </div>
                        </button>
                    </form>
                </div>
                <div class="domain-cards col-6 col-sm-6 col-md-4 col-lg-2 text-center">
                    <form method="post" action="/certificationlist">
                        @csrf
                        <input type="hidden" name="cert_domain" value="networking">
                        <button class="btn domain-button" type="submit">
                            <div class="domain-image">
                                <img src="./images/jihome/automation.png" alt="First slide" height="100%">
                            </div>
                            <div class="domain-name">
                                Networking
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
