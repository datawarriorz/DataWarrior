@extends('profile.profilelayout')

@section('profilecontent')
<link rel="stylesheet" href="./css/user/profile.css">
<link rel="stylesheet" href="./css/expert/expert-5-0-profile.css">
<br>
<div class="col-12 col-sm-12 col-md-8 col-lg-8 offset-md-2 ">
    <div class="card">
        <div class="card-header text-center">
            <h4>Your Profile</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-head">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3" style="padding-left: 0;padding-right:0">
                                    <div class="col-md-12" style="padding-left: 0;padding-right:0">
                                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($userdetails->u_image); ?>"
                                            style="height:144px;width:144px;border-radius:50%" />
                                        {{-- <img src="http://cps-static.rovicorp.com/3/JPG_400/MI0003/711/MI0003711195.jpg?partner=allrovi.com"
                                            style="height:144px;width:144px;border-radius:50%" /> --}}
                                    </div>
                                    {{-- <div class="col-md-12">
                                        <form method="POST" action="/expert-profile-image"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label>Image :</label>
                                                <div class="upload-btn-wrapper">
                                                    <textarea id="uploadFile" class="disableInputField"
                                                        placeholder="Choose File" disabled="disabled" rows="2"
                                                        autocomplete="off">
                                                    </textarea>
                                                    <label class="fileUpload form-control">
                                                        <input id="uploadBtn" enctype="multipart/form-data" type="file"
                                                            name="ex_image" class="upload" />
                                                        <span class="uploadBtn">Upload / Browse File ..</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-danger" onclick="">Upload</button>
                                        </form>
                                    </div> --}}
                                </div>
                                <div class="col-md-9">
                                    <h5>{{ $userdetails->first_name }} {{ $userdetails->last_name }}</h5>
                                    <br>
                                    <h6>{{ $userdetails->email }}</h6>
                                    <br>
                                    <h6>Date of Birth :
                                        <span>{{ $userdetails->date_of_birth }}</span>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link profilenav active" id="userdetails-tab" data-toggle="tab"
                                    href="#userdetails" role="tab" aria-controls="userdetails" aria-selected="true">User
                                    Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link profilenav" id="education-tab" data-toggle="tab" href="#education"
                                    role="tab" aria-controls="education" aria-selected="false">Education</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link profilenav" id="jobexperience-tab" data-toggle="tab"
                                    href="#jobexperience" role="tab" aria-controls="jobexperience"
                                    aria-selected="false">Experience</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link profilenav" id="skills-tab" data-toggle="tab" href="#skills"
                                    role="tab" aria-controls="skills" aria-selected="false"
                                    onClick="experience()">Skills</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="userdetails" role="tabpanel"
                            aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-3 col-sm-3 col-md-3">
                                    <label>Name</label>
                                </div>
                                <div class="col-9 col-sm-9 col-md-9">
                                    <p>: {{ $userdetails->first_name }}
                                        {{ $userdetails->last_name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3 col-md-3 ">
                                    <label>Email</label>
                                </div>
                                <div class="col-sm-9 col-md-9">
                                    <p>: {{ $userdetails->email }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3 col-md-3 ">
                                    <label>Phone</label>
                                </div>
                                <div class="col-sm-9 col-md-9">
                                    <p>:
                                        @if(!empty($userdetails->contact_no))
                                        {{ $userdetails->contact_no }}
                                        @else
                                        -
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
                                        {{ $userdetails->gender }}
                                        @else
                                        -
                                        @endif
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
                                    @foreach($eduDetails as $ed)
                                    <tr>
                                        <td> @foreach ($qualificationType as $qt)
                                            @if($qt->qualtype_id==$ed->qualtype_id)
                                            {{ $qt->qualification_type }}
                                            @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $ed->course_name }}</td>
                                        <td>{{ $ed->college_name }}</td>
                                        <td>{{ $ed->University }}</td>
                                        <td>{{ $ed->percentage }}</td>
                                        <td>{{ $ed->grade }}</td>
                                        <td>{{ substr($ed->start_date,0,10) }}</td>
                                        <td>{{ substr($ed->end_date,0,10) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                            <a href="/qualification">
                                <button type="button" class="btn tab-edit-btn">
                                    Edit Education Details <i class="fas fa-edit"></i>
                                </button>
                            </a>
                            <br>

                        </div>

                        <div class="tab-pane fade" id="jobexperience" role="tabpanel"
                            aria-labelledby="jobexperience-tab">
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
                                        <td>{{ $je->profile }}</td>
                                        <td>{{ $je->organisation }}</td>
                                        <td>{{ $je->location }}</td>
                                        <td>{{ $je->description }}</td>
                                        <td>{{ $je->currentjob }}</td>
                                        <td>{{ substr($je->startdate,0,10) }}</td>
                                        <td>{{ substr($je->enddate,0,10) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                            <a href="/jobexperience">
                                <button type="button" class="btn tab-edit-btn">
                                    Edit Experience <i class="fas fa-edit"></i>
                                </button>
                            </a>
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
                                        <?php $i=0; ?>
                                        @foreach($skills as $skill)
                                        <?php $i++; ?>
                                        <tr>
                                            <td><?php echo $i;?>
                                            </td>
                                            <td>
                                                {{ $skill->skill_name }}
                                            </td>
                                            <td>
                                                {{-- @foreach($skilllevel as $sk)
@if($sk->skill_level_id==$skill->skill_level_id)
                                                        {{ $sk->skill_level_name }}
                                                @endif
                                                @endforeach--}}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class=" col-md-6">
                                </div>
                            </div>
                            <br>
                            <a href="/skills"><button type="button" class="btn tab-edit-btn">Edit Skills <i
                                        class="fas fa-edit"></i></button></a>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection