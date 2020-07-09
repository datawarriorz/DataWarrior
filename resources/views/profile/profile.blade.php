@extends('profile.profilelayout')

@section('profilecontent')

<link rel="stylesheet" href="./css/profile.css">
<br>
<div class="card card-body">
    <div class="row">
        <div class="col-md-12">
            <div class="profile-head">
                <h5>{{$userdetails->first_name}}{{$userdetails->last_name}}</h5>
                <h6>{{$userdetails->email}}</h6>
                <p class="proile-rating">Date of Birth : <span>{{$userdetails->date_of_birth}}</span></p>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link profilenav active" id="userdetails-tab" data-toggle="tab" href="#userdetails" role="tab" aria-controls="userdetails" aria-selected="true">User Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link profilenav" id="education-tab" data-toggle="tab" href="#education" role="tab" aria-controls="education" aria-selected="false">Education</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link profilenav" id="jobexperience-tab" data-toggle="tab" href="#jobexperience" role="tab" aria-controls="jobexperience" aria-selected="false">Experience</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link profilenav" id="skills-tab" data-toggle="tab" href="#skills" role="tab" aria-controls="skills" aria-selected="false">Skills</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tab-content profile-tab" id="myTabContent">
                <div class="tab-pane fade show active" id="userdetails" role="tabpanel" aria-labelledby="home-tab">
                    <br>
                    <div class="row">
                        <div class="col-3 col-sm-3 col-md-3">
                            <label>Name</label>
                        </div>
                        <div class="col-9 col-sm-9 col-md-9">
                            <p>: {{$userdetails->first_name}}
                                {{$userdetails->last_name}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-md-3 ">
                            <label>Email</label>
                        </div>
                        <div class="col-sm-9 col-md-9">
                        <p>: {{$userdetails->email}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-md-3 ">
                            <label>Phone</label>
                        </div>
                        <div class="col-sm-9 col-md-9">
                        <p>: 
                            @if(!empty($userdetails->contact_no))
                            $userdetails->contact_no
                                    @else
                                    -
                                    @endif
                            {{$userdetails->contact_no}}
                        </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-md-3 ">
                            <label>Email Verification</label>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <p>: 
                                @if(!empty($userdetails->email_verified_at))
                                Verified
                                @else
                                Not - Verified (Click here!)
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-md-3 ">
                            <label>Gender</label>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <p>: 
                                @if(!empty($userdetails->gender))
                                $userdetails->gender
                                @else
                                -
                                @endif
                            </p>
                        </div>
                    </div>
                    <br>
                    <a href="/userdetails"><button type="button" class="btn tab-edit-btn">Edit User Details <i class="fas fa-edit"></i></button></a>
                </div>

                <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
                    <br>       
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
                            @foreach($eduDetails as $ed)
                            <tr>
                            <td>  @foreach ($qualificationType as $qt)
                                @if($qt->qualtype_id==$ed->qualtype_id)
                                    {{$qt->qualification_type}}
                                @endif
                                @endforeach
                            </td>
                            <td>{{$ed->course_name}}</td>
                            <td>{{$ed->college_name}}</td>
                            <td>{{$ed->University}}</td>
                            <td>{{$ed->percentage}}</td>
                            <td>{{$ed->grade}}</td>
                            <td>{{substr($ed->start_date,0,10)}}</td>
                            <td>{{substr($ed->end_date,0,10)}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <a href="/qualification"><button type="button" class="btn tab-edit-btn">Edit Education Details <i class="fas fa-edit"></i></button></a>

                </div>
                
                <div class="tab-pane fade" id="jobexperience" role="tabpanel" aria-labelledby="jobexperience-tab">
                    <br>       
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
                            @foreach($jobexp as $je)
                            <tr>
                            <td>{{$je->profile}}</td>
                            <td>{{$je->organisation}}</td>
                            <td>{{$je->location}}</td>
                            <td>{{$je->description}}</td>
                            <td>{{$je->currentjob}}</td>
                            <td>{{substr($je->startdate,0,10)}}</td>
                            <td>{{substr($je->enddate,0,10)}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <a href="/jobexperience"><button type="button" class="btn tab-edit-btn">Edit Experience <i class="fas fa-edit"></i></button></a>
                </div>

                <div class="tab-pane fade" id="skills" role="tabpanel" aria-labelledby="skills-tab">
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Skills</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php $i=0; ?>
                                @foreach($skills as $skill)
                                {{$skill->skill}},
                                
                                @endforeach</p>
                        </div>
                    </div>
                    <br>
                    <a href="/skills"><button type="button" class="btn tab-edit-btn">Edit Skills <i class="fas fa-edit"></i></button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection