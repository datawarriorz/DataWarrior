@extends('user.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/user/user-7-0-internship-home.css') }}" />
<div id="ac-wrapper" style='position: relative;display:none'>
    <div id="popup">
        <center>
            <h2>Thank You for Signing Up! Our Counsellor will get in touch with you in 24 hrs.</h2>
            <input type="submit" name="submit" value="Submit" onClick="PopUp('hide')" />
        </center>
    </div>
</div>
<div class="ji-content container">
    <div class="ji-header pt-4 pl-2 pr-2">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6 p-0 text-left">
                <h4><b>Internships</b></h4>
                <h5 class="pt-2">Select internship based on your preference</h5>
            </div>
            <div class="ji-view-all col-sm-6 col-md-6 col-lg-6 p-4 text-right">
                <form method="post" action="/jobfilterapply">
                    @csrf
                    <input type="hidden" name="job_type_id" value="2">
                    <button class="btn btn-primary" type="submit">View all Internships&nbsp;<i
                            class="fas fa-arrow-right"></i></button>
                </form>
            </div>
        </div>
    </div>
    <div class="ji-body pt-3">
        <div class="domain-content">
            <div class="domain-header pl-2 pr-2">
                <h4>Popular domains</h4>
            </div>
            <div class="domain-body pt-2">
                <div class="row">
                    <div class="domain-cards col-6 col-sm-6 col-md-4 col-lg-2 p-0 pt-3 text-center">
                        <form method="post" action="/jobfilterapply">
                            @csrf
                            <input type="hidden" name="job_domain" value="datascience">
                            <input type="hidden" name="job_type_id" value="2">
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
                    <div class="domain-cards col-6 col-sm-6 col-md-4 col-lg-2 p-0 pt-3 text-center">
                        <form method="post" action="/jobfilterapply">
                            @csrf
                            <input type="hidden" name="job_domain" value="itcse">
                            <input type="hidden" name="job_type_id" value="2">
                            <button class="btn domain-button" type="submit">
                                <div class="domain-image">
                                    <img src="./images/jihome/machinelearning.png" alt="First slide" height="100%">
                                </div>
                                <div class="domain-name">
                                    IT/CS & Engineering
                                </div>
                            </button>
                        </form>
                    </div>
                    <div class="domain-cards col-6 col-sm-6 col-md-4 col-lg-2 p-0 pt-3 text-center">
                        <form method="post" action="/jobfilterapply">
                            @csrf
                            <input type="hidden" name="job_domain" value="sales">
                            <input type="hidden" name="job_type_id" value="2">
                            <button class="btn domain-button" type="submit">
                                <div class="domain-image">
                                    <img src="./images/jihome/webdevelopment.png" alt="First slide" height="100%">
                                </div>
                                <div class="domain-name">
                                    Sales
                                </div>
                            </button>
                        </form>
                    </div>
                    <div class="domain-cards col-6 col-sm-6 col-md-4 col-lg-2 p-0 pt-3 text-center">
                        <form method="post" action="/jobfilterapply">
                            @csrf
                            <input type="hidden" name="job_domain" value="marketing">
                            <input type="hidden" name="job_type_id" value="2">
                            <button class="btn domain-button" type="submit">
                                <div class="domain-image">
                                    <img src="./images/jihome/digitalmarketing.png" alt="First slide" height="100%">
                                </div>
                                <div class="domain-name">
                                    Marketing
                                </div>
                            </button>
                        </form>
                    </div>
                    <div class="domain-cards col-6 col-sm-6 col-md-4 col-lg-2 p-0 pt-3 text-center">
                        <form method="post" action="/jobfilterapply">
                            @csrf
                            <input type="hidden" name="job_domain" value="finance">
                            <input type="hidden" name="job_type_id" value="2">
                            <button class="btn domain-button" type="submit">
                                <div class="domain-image">
                                    <img src="./images/jihome/automation.png" alt="First slide" height="100%">
                                </div>
                                <div class="domain-name">
                                    Finance
                                </div>
                            </button>
                        </form>
                    </div>
                    <div class="domain-cards col-6 col-sm-6 col-md-4 col-lg-2 p-0 pt-3 text-center">
                        <form method="post" action="/jobfilterapply">
                            @csrf
                            <input type="hidden" name="job_domain" value="agriculture">
                            <input type="hidden" name="job_type_id" value="2">
                            <button class="btn domain-button" type="submit">
                                <div class="domain-image">
                                    <img src="./images/jihome/graphicdesign.png" alt="First slide" height="100%">
                                </div>
                                <div class="domain-name">
                                    Agriculture
                                </div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="location-content pt-4 pb-4">
            <div class="location-header pl-2 pr-2">
                <div class="row">
                    <div class="pad-zero text-left">
                        <h4>Popular cities</h4>
                    </div>
                </div>
            </div>
            <div class="location-body">
                <div class="row">
                    <div class="location-cards col-6 col-sm-6 col-md-4 col-lg-2 p-0 pt-3 text-center">
                        <form method="post" action="/jobfilterapply">
                            @csrf
                            <input type="hidden" name="job_location" value="mumbai">
                            <input type="hidden" name="job_type_id" value="2">
                            <button class="btn location-button" type="submit">
                                <div class="location-image">
                                    <img src="./images/jihome/mumbai.png" alt="First slide" height="100%">
                                </div>
                                <div class="location-name">
                                    Mumbai
                                </div>
                            </button>
                        </form>
                    </div>
                    <div class="location-cards col-6 col-sm-6 col-md-4 col-lg-2 p-0 pt-3 text-center">
                        <form method="post" action="/jobfilterapply">
                            @csrf
                            <input type="hidden" name="job_location" value="mumbai">
                            <input type="hidden" name="job_type_id" value="2">
                            <button class="btn location-button" type="submit">
                                <div class="location-image">
                                    <img src="./images/jihome/delhi.png" alt="First slide" height="100%">
                                </div>
                                <div class="location-name">
                                    Delhi
                                </div>
                            </button>
                        </form>
                    </div>
                    <div class="location-cards col-6 col-sm-6 col-md-4 col-lg-2 p-0 pt-3 text-center">
                        <form method="post" action="/jobfilterapply">
                            @csrf
                            <input type="hidden" name="job_location" value="pune">
                            <input type="hidden" name="job_type_id" value="2">
                            <button class="btn location-button" type="submit">
                                <div class="location-image">
                                    <img src="./images/jihome/pune.png" alt="First slide" height="100%">
                                </div>
                                <div class="location-name">
                                    Pune
                                </div>
                            </button>
                        </form>
                    </div>
                    <div class="location-cards col-6 col-sm-6 col-md-4 col-lg-2 p-0 pt-3 text-center">
                        <form method="post" action="/jobfilterapply">
                            @csrf
                            <input type="hidden" name="job_location" value="bangalore">
                            <input type="hidden" name="job_type_id" value="2">
                            <button class="btn location-button" type="submit">
                                <div class="location-image">
                                    <img src="./images/jihome/bangalore.png" alt="First slide" height="100%">
                                </div>
                                <div class="location-name">
                                    Bangalore
                                </div>
                            </button>
                        </form>
                    </div>
                    <div class="location-cards col-6 col-sm-6 col-md-4 col-lg-2 p-0 pt-3 text-center">
                        <form method="post" action="/jobfilterapply">
                            @csrf
                            <input type="hidden" name="job_location" value="hyderabad">
                            <input type="hidden" name="job_type_id" value="2">
                            <button class="btn location-button" type="submit">
                                <div class="location-image">
                                    <img src="./images/jihome/hyderabad.png" alt="First slide" height="100%">
                                </div>
                                <div class="location-name">
                                    Hyderabad
                                </div>
                            </button>
                        </form>
                    </div>
                    <div class="location-cards col-6 col-sm-6 col-md-4 col-lg-2 p-0 pt-3 text-center">
                        <form method="post" action="/jobfilterapply">
                            @csrf
                            <input type="hidden" name="job_location" value="chennai">
                            <input type="hidden" name="job_type_id" value="2">
                            <button class="btn location-button" type="submit">
                                <div class="location-image">
                                    <img src="./images/jihome/chennai.png" alt="First slide" height="100%">
                                </div>
                                <div class="location-name">
                                    Chennai
                                </div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
