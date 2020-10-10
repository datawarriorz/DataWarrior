@extends('user.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="./css/user/user-6-0-job-home.css" />
<div class="ji-content">
    <div class="ji-header">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6 pad-zero text-left">
                <h4><b>JOBS</b></h4>
                <h5 style="margin-top:0.5rem;">Select jobs based on your preference</h5>
            </div>
            <div class="ji-view-all col-sm-6 col-md-6 col-lg-6 pad-zero text-right">
                <form method="post" action="/jobfilterapply">
                    @csrf
                    <input type="hidden" name="job_type_id" value="1">
                    <button class="btn btn-primary" type="submit">View all Jobs&nbsp;<i
                            class="fas fa-arrow-right"></i></button>
                </form>
            </div>
        </div>
    </div>
    <div class="ji-body">
        <div class="domain-content">
            <div class="domain-header">
                <h4>Popular domains</h4>
            </div>
            <div class="domain-body jumbotron">
                <div class="row">
                    <div class="domain-cards col-sm-6 col-md-4 col-lg-2 text-center">
                        <form method="post" action="/jobfilterapply">
                            @csrf
                            <input type="hidden" name="job_domain" value="datascience">
                            <input type="hidden" name="job_type_id" value="1">
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
                        <form method="post" action="/jobfilterapply">
                            @csrf
                            <input type="hidden" name="job_domain" value="machinelearning">
                            <input type="hidden" name="job_type_id" value="1">
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
                        <form method="post" action="/jobfilterapply">
                            @csrf
                            <input type="hidden" name="job_domain" value="programming">
                            <input type="hidden" name="job_type_id" value="1">
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
                    <div class="domain-cards col-sm-6 col-md-4 col-lg-2 text-center">
                        <form method="post" action="/jobfilterapply">
                            @csrf
                            <input type="hidden" name="job_domain" value="digitalmarketing">
                            <input type="hidden" name="job_type_id" value="1">
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
                        <form method="post" action="/jobfilterapply">
                            @csrf
                            <input type="hidden" name="job_domain" value="automation">
                            <input type="hidden" name="job_type_id" value="1">
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
                        <form method="post" action="/jobfilterapply">
                            @csrf
                            <input type="hidden" name="job_domain" value="graphic design">
                            <input type="hidden" name="job_type_id" value="1">
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
        <div class="location-content">
            <div class="location-header">
                <div class="row">
                    <div class="pad-zero text-left">
                        <h4>Popular cities</h4>
                    </div>
                </div>
            </div>
            <div class="location-body jumbotron">
                <div class="row">
                    <div class="location-cards col-sm-6 col-md-3 col-lg-2 text-center">
                        <form method="post" action="/jobfilterapply">
                            @csrf
                            <input type="hidden" name="job_location" value="mumbai">
                            <input type="hidden" name="job_type_id" value="1">
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
                    <div class="location-cards col-sm-6 col-md-3 col-lg-2 text-center">
                        <form method="post" action="/jobfilterapply">
                            @csrf
                            <input type="hidden" name="job_location" value="mumbai">
                            <input type="hidden" name="job_type_id" value="1">
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
                    <div class="location-cards col-sm-6 col-md-3 col-lg-2 text-center">
                        <form method="post" action="/jobfilterapply">
                            @csrf
                            <input type="hidden" name="job_location" value="pune">
                            <input type="hidden" name="job_type_id" value="1">
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
                    <div class="location-cards col-sm-6 col-md-3 col-lg-2 text-center">
                        <form method="post" action="/jobfilterapply">
                            @csrf
                            <input type="hidden" name="job_location" value="bangalore">
                            <input type="hidden" name="job_type_id" value="1">
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
                    <div class="location-cards col-sm-6 col-md-3 col-lg-2 text-center">
                        <form method="post" action="/jobfilterapply">
                            @csrf
                            <input type="hidden" name="job_location" value="hyderabad">
                            <input type="hidden" name="job_type_id" value="1">
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
                    <div class="location-cards col-sm-6 col-md-3 col-lg-2 text-center">
                        <form method="post" action="/jobfilterapply">
                            @csrf
                            <input type="hidden" name="job_location" value="chennai">
                            <input type="hidden" name="job_type_id" value="1">
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
