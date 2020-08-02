@extends('layout.expertlayout')

@section('content')


<link rel="stylesheet" href="./css/profile.css">
<br>
<div class="card card-body">
    <div class="row">
        <div class="col-md-12">
            <div class="profile-head">
                <h5>{{ $expertobj->ex_firstname }} {{ $expertobj->ex_lastname }}</h5>
                <h6>{{ $expertobj->email }}</h6>
                <p class="proile-rating">Date of Birth : <span>date_of_birth</span></p>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link profilenav active" id="userdetails-tab" data-toggle="tab" href="#userdetails"
                            role="tab" aria-controls="userdetails" aria-selected="true">User Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link profilenav" id="education-tab" data-toggle="tab" href="#education" role="tab"
                            aria-controls="education" aria-selected="false">Education</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link profilenav" id="jobexperience-tab" data-toggle="tab" href="#jobexperience"
                            role="tab" aria-controls="jobexperience" aria-selected="false">Experience</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link profilenav" id="skills-tab" data-toggle="tab" href="#skills" role="tab"
                            aria-controls="skills" aria-selected="false" onClick="experience()">Skills</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tab-content profile-tab" id="myTabContent">
                <div class="tab-pane fade show active" id="userdetails" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-3 col-sm-3 col-md-3">
                            <label>Name</label>
                        </div>
                        <div class="col-9 col-sm-9 col-md-9">
                            <p>: first_name
                                last_name</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-md-3 ">
                            <label>Email</label>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <p>: email</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-md-3 ">
                            <label>Phone</label>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <p>:
                                contact_no

                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-md-3 ">
                            <label>Email Verification</label>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <p>:

                                Verified

                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-md-3 ">
                            <label>Gender</label>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <p>:
                                gender
                            </p>
                        </div>
                    </div>
                    <br>
                    <a href="/userdetails"><button type="button" class="btn tab-edit-btn">Edit User Details <i
                                class="fas fa-edit"></i></button></a>
                </div>

                <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
                    <table class="table">
                        <thead>
                            <tr>
                                <td scope="col">Qualification Type</td>
                                <td scope="col">Course Name</td>
                                <td scope="col">College Name</td>
                                <td scope="col">Univeristy</td>
                                <td scope="col">Percentage</td>
                                <td scope="col">Grade</td>
                                <td scope="col">Start Date</td>
                                <td scope="col">End Date</td>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <br>
                    <a href="/qualification"><button type="button" class="btn tab-edit-btn">Edit Education Details <i
                                class="fas fa-edit"></i></button></a>

                </div>

                <div class="tab-pane fade" id="jobexperience" role="tabpanel" aria-labelledby="jobexperience-tab">
                    <table class="table">
                        <thead>
                            <tr>
                                <td scope="col">Profile</td>
                                <td scope="col">Organisation</td>
                                <td scope="col">Location</td>
                                <td scope="col">Description</td>
                                <td scope="col">Current Job</td>
                                <td scope="col">Start Date</td>
                                <td scope="col">End Date</td>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <br>
                    <a href="/jobexperience"><button type="button" class="btn tab-edit-btn">Edit Experience <i
                                class="fas fa-edit"></i></button></a>
                </div>

                <div class="tab-pane fade" id="skills" role="tabpanel" aria-labelledby="skills-tab">
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td scope="col">Sr. No</td>
                                    <td scope="col">Skill Name</td>
                                    <td scope="col">Experience Level</td>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <div class=" col-md-6">
                        </div>
                    </div>
                    <br>
                    <a href="/skills"><button type="button" class="btn tab-edit-btn">Edit Skills <i
                                class="fas fa-edit"></i></button></a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
