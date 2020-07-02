@extends('layout.mainlayout')

@section('content')
<link rel="stylesheet" href="./css/home.css" />
<hr class="thick">
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
                <img class="d-block w-100" src="./images/slider1.jpg" alt="First slide" />
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="./images/slider2.jpg" alt="Second slide" />
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="./images/slider3.jpg" alt="Third slide" />
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="./images/slider4.jpg" alt="Third slide" />
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="./images/slider5.jpg" alt="Third slide" />
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous

            </span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
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
<hr class="thick">
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
                        <h5 class="container-items-header">- Jobs -</h5>
                        <p>"Somewhere...someone is looking for you"<br><a href="/internship">Click here for
                                details</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="container-items">
                        <h5 class="container-items-header">- Certification -</h5>
                        <p>"Growth...through continuous learning"<br><a href="/internship">Click here for
                                details</a></p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="container-items">
                        <h5 class="container-items-header">- Projects -</h5>
                        <p>"Change the world...one project at a time"<br><a href="/internship">Click here for
                                details</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="thick">
</div>
<div class="content-container text-center">
    <div class="container text-center">
        <h1>CONTACT US</h1>
    </div>
    <div class="container content2 text-center">
        <br>
        <div class="row container-column">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <table class="table contact-table text-center">
                        <tr>
                            <td>Address:</td>
                            <td>XYZ,Street,Mumbai,401101.</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Phone:</td>
                            <td>9920940893 - Office</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td>datawarriorz@gmail.com</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Website:</td>
                            <td>www.datawarrior.com</td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <form action="">
                        <table class="table contact-table text-center">
                            <tr>
                                <td><input class="form-control" type="text" placeholder="Your Name.." /></td>
                            </tr>
                            <tr>
                                <td><input class="form-control" type="text" placeholder="Your Email Id.." /></td>
                            </tr>
                            <tr>
                                <td><textarea class="form-control" type="text" cols="40" rows="2"
                                        placeholder="Your Message.."></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td><button class="btn btn2" type="submit">Submit</button></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection