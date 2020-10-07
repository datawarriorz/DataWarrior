@extends('user.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="./css/user/user-9-0-certification-home.css" />
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
                    <div class="primary_heading" style="color:#394c66"> Get Certified on Machine
                        <br> Learning
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
                    <div class="primary_heading">Get Certified on Machine
                        <br class="d-block d-lg-none"> Learning with Python
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
                    <div class="primary_heading">Certification on
                        <br> Tableau with Excel</div>
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
<div class="container">
    <div class="domain-content">
        <div class="domain-header">
            <h4>Popular domains</h4>
        </div>
        <div class="domain-body jumbotron">
            <div class="row">
                <div class="domain-cards col-sm-6 col-md-4 col-lg-2 text-center">
                    <form method="post" action="/certificationlist">
                        @csrf
                        <input type="hidden" name="cert_domain" value="data science">
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
                <div class="domain-cards col-sm-6 col-md-4 col-lg-2 text-center">
                    <form method="post" action="/certificationlist">
                        @csrf
                        <input type="hidden" name="cert_domain" value="machine learning">
                        <button class="btn domain-button" type="submit">
                            <div class="domain-image">
                                <img src="./images/jihome/machinelearning.png" alt="First slide" height="100%">
                            </div>
                            <div class="domain-name">
                                Machine Learning
                            </div>
                        </button>
                    </form>
                </div>
                <div class="domain-cards col-sm-6 col-md-4 col-lg-2 text-center">
                    <form method="post" action="/certificationlist">
                        @csrf
                        <input type="hidden" name="cert_domain" value="web development">
                        <button class="btn domain-button" type="submit">
                            <div class="domain-image">
                                <img src="./images/jihome/webdevelopment.png" alt="First slide" height="100%">
                            </div>
                            <div class="domain-name">
                                Web Development
                            </div>
                        </button>
                    </form>
                </div>
                <div class="domain-cards col-sm-6 col-md-4 col-lg-2 text-center">
                    <form method="post" action="/certificationlist">
                        @csrf
                        <input type="hidden" name="cert_domain" value="digital marketing">
                        <button class="btn domain-button" type="submit">
                            <div class="domain-image">
                                <img src="./images/jihome/digitalmarketing.png" alt="First slide" height="100%">
                            </div>
                            <div class="domain-name">
                                Digital Marketing
                            </div>
                        </button>
                    </form>
                </div>
                <div class="domain-cards col-sm-6 col-md-4 col-lg-2 text-center">
                    <form method="post" action="/certificationlist">
                        @csrf
                        <input type="hidden" name="cert_domain" value="automation">
                        <button class="btn domain-button" type="submit">
                            <div class="domain-image">
                                <img src="./images/jihome/automation.png" alt="First slide" height="100%">
                            </div>
                            <div class="domain-name">
                                Automation
                            </div>
                        </button>
                    </form>
                </div>
                <div class="domain-cards col-sm-6 col-md-4 col-lg-2 text-center">
                    <form method="post" action="/certificationlist">
                        @csrf
                        <input type="hidden" name="cert_domain" value="graphic design">
                        <button class="btn domain-button" type="submit">
                            <div class="domain-image">
                                <img src="./images/jihome/graphicdesign.png" alt="First slide" height="100%">
                            </div>
                            <div class="domain-name">
                                Graphic Design
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
