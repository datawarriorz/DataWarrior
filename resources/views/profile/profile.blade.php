@extends('profile.profilelayout')

@section('profilecontent')

<link rel="stylesheet" href="./css/profile.css">

<div class="card card-body">
    
        <div class="row">
            
            <div class="col-md-8">
                <div class="profile-head">
                            <h5>
                                {{$userdetails->first_name}}
                                {{$userdetails->last_name}}

                            </h5>
                            <h6>
                                {{$userdetails->email}}
                            </h6>
                            <p class="proile-rating">Date of Birth : <span>
                                {{$userdetails->date_of_birth}}
                                </span></p>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link profilenav active" id="userdetails-tab" data-toggle="tab" href="#userdetails" role="tab" aria-controls="userdetails" aria-selected="true">User Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link profilenav" id="education-tab" data-toggle="tab" href="#education" role="tab" aria-controls="education" aria-selected="false">Education</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link profilenav" id="jobexperience-tab" data-toggle="tab" href="#jobexperience" role="tab" aria-controls="jobexperience" aria-selected="false">Job Experience</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link profilenav" id="skills-tab" data-toggle="tab" href="#skills" role="tab" aria-controls="skills" aria-selected="false">Skills</a>
                        </li>
                    </ul>
                </div>
            </div>
            
        </div>
        <div class="row">
            
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="userdetails" role="tabpanel" aria-labelledby="home-tab">
                        <hr>        
                        <div class="row">
                                    <div class="col-md-6">
                                        <label>User Id</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$userdetails->user_id}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$userdetails->first_name}}
                                            {{$userdetails->last_name}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-6">
                                
                                <p>{{$userdetails->email}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Phone</label>
                                    </div>
                                    <div class="col-md-6">
                                <p>
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
                                    <div class="col-md-6">
                                        <label>Email Verification</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            @if(!empty($userdetails->email_verified_at))
                                            Verified
                                            @else
                                            Not - Verified (Click here!)
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Gender</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            @if(!empty($userdetails->gender))
                                            $userdetails->gender
                                            @else
                                            -
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <a href="/userdetails"><button type="button" class="btn-danger">Edit User Details</button></a>
                    </div>
                    <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Qualification Type</th>
                                <th scope="col">Course Name</th>
                                <th scope="col">College Name</th>
                                <th scope="col">Univeristy</th>
                                <th scope="col">Percentage</th>
                                <th scope="col">Grade</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">End Date</th>
                                
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
                          
                          <hr>
                          <a href="/qualification"><button type="button" class="btn-danger">Edit Education Details</button></a>

                    </div>
                    <div class="tab-pane fade" id="jobexperience" role="tabpanel" aria-labelledby="jobexperience-tab">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Profile</th>
                                <th scope="col">Organisation</th>
                                <th scope="col">Location</th>
                                <th scope="col">Description</th>
                                <th scope="col">Current Job</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">End Date</th>
                                
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
                          <hr>
                          <a href="/jobexperience"><button type="button" class="btn-danger">Edit Job Experience</button></a>

                    </div>
                    <div class="tab-pane fade" id="skills" role="tabpanel" aria-labelledby="skills-tab">
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Skills</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php $i=0; ?>
                                    @foreach($skills as $skill)
                                    {{$skill->skill1}},
                                    {{$skill->skill2}},
                                    {{$skill->skill3}},
                                    @endforeach</p>
                            </div>
                    </div>
                    <hr>
                    <a href="/skills"><button type="button" class="btn-danger">Edit Skills</button></a>

                </div>
            </div>
        </div>
              
</div>
@endsection