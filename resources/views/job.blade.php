@extends('layout.mainlayout')

@section('content')

<link rel="stylesheet" href="./css/job.css">
<div class="internship-container">
    <div id="regForm">
        <form class="" method="POST" action="/jobform">
            <div id="tab1">
                <div class="row container-column">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="container-items">
                                <h2>Steps</h2>
                                <img class="d-block w-100 text-center" src="./images/job_process.png"
                                    alt="First slide" />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="container-items text-center">
                                <br>
                                <br>
                                <h2>JOB</h2>
                                <br>
                                <br>
                                <h4>Apply and get Career Counselling</h4>
                                <br>
                                <h4>Click 'Next' to go to Step 1</h4>
                                <br>
                                <br>
                                <div style=" overflow:auto;">
                                    <div class="text-center">
                                        <button id="next1" type="button">Next</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab2" class="needs-validation-tab2">
                @csrf
                <h3>Job Preference</h3>
                <div class="card">
                    <div class="card-body">
                        <p></p>
                        1st Preferred Domain :
                        <p><input type="text" class="form-control fc-tab2" id="validationCustom01"
                                placeholder="Eg. Java" name="preferreddomain1" autocomplete="on" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </p>
                        2nd Preferred Domain :
                        <p><input type="text" class="form-control fc-tab2" id="validationCustom02"
                                placeholder="Eg. Oracle Database" name="preferreddomain2" autocomplete="on" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </p>
                        3rd Preferred Domain :
                        <p><input type="text" class="form-control fc-tab2" id="validationCustom03"
                                placeholder="Eg. Web Development" name="preferreddomain3" autocomplete="on" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </p>
                        Minimum Preferred Salary (INR) :
                        <p><input type="text" class="form-control fc-tab2" id="validationCustom04"
                                placeholder="Eg. 10000" name="salary" autocomplete="on" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </p>
                        Location :
                        <p><input type="text" class="form-control fc-tab2" id="validationCustom05"
                                placeholder="Eg. Mumbai" name="joblocation" autocomplete="on" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </p>
                        <p>
                            <div class="form-group form-inline">
                                <label> Do you want to apply for career counselling/guidance?</label>
                                <input type="checkbox" name="counselling" id="counselling" class="form-control"
                                    value="Yes" style="margin-left: 8px;margin-top: 2px;">
                            </div>
                        </p>
                        <p>
                            <div id="tab2-error" class="alert alert-danger">
                                <strong>Alert!</strong>
                                <ul>
                                    <label id="tab2-label"></label>
                                </ul>
                            </div>
                        </p>
                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <button class="waves-effect waves-light" id="prev1" type="button">Previous</button>
                                <button type="submit">Submit</button>
                                <!-- <button class="waves-effect waves-light" id="next2" type="button">Next</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div style="text-align:center;margin-top:40px;">
            <span class="step active"></span>
            <span class="step"></span>
        </div>
    </div>
</div>
@endsection
