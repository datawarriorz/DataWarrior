@extends('user.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/user/user-5-0-profile.css') }}">
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
                                <div class="col-12 col-sm-12 col-md-4 col-lg-3 text-center"
                                    style="padding-left: 0;padding-right:0">
                                    <div class="col-12" style="padding-left: 0;padding-right:0">
                                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($userdetails->u_image); ?>"
                                            style="height:144px;width:144px;border-radius:50%" />
                                    </div>
                                </div>
                                <div
                                    class="col-12 col-sm-12 col-md-8 col-lg-9 text-md-left pl-4 pr-4 pt-4 pb-0 text-center">
                                    <div class=".justify-content-sm-center">
                                        <h5>{{ $userdetails->first_name }} {{ $userdetails->last_name }}</h5>
                                    </div>
                                    <br>
                                    <h6>{{ $userdetails->email }}</h6>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content profile-tab" id="myTabContent" style="overflow-x: scroll;">
                        <ul class="nav nav-tabs" id="myTab" role="tablist" style="width:472px;">
                            <li class="nav-item">
                                <a class="nav-link profilenav active" id="userdetails-tab" data-toggle="tab"
                                    href="#userdetails" role="tab" aria-controls="userdetails"
                                    aria-selected="true">Basic Details</a>
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
                        <div class="tab-pane fade show active" id="userdetails" role="tabpanel"
                            aria-labelledby="home-tab">
                            <table class="table">
                                <thead>
                                    <td scope="col" style="width:160px;"></td>
                                    <td scope="col" style="width:600px;"></td>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td>: {{ $userdetails->first_name }} {{ $userdetails->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone No.</td>
                                        <td>: @if(!empty($userdetails->contact_no)){{ $userdetails->contact_no }}
                                        @else- @endif</td>
                                    </tr>
                                    <tr>
                                        <td>DOB</td>
                                        <td>:
                                            @if(!empty($userdetails->date_of_birth))
                                                <?php echo date_format($userdetails->date_of_birth,"d M' Y");?>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td>: @if(!empty($userdetails->gender)) {{ $userdetails->gender }} @else -
                                            @endif</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="/userdetails">
                                <button type="button" class="btn tab-edit-btn" style="margin-left: 12px;">
                                    Edit User Details <i class="fas fa-edit"></i>
                                </button>
                            </a>
                        </div>

                        <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
                            <table class="table">
                                <thead style="border-bottom:1px solid #b9b9b9">
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
                                            <td>
                                                @foreach($qualificationType as $qt)
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
                                <button type="button" class="btn tab-edit-btn" style="margin-left: 12px;">
                                    Edit Education Details <i class="fas fa-edit"></i>
                                </button>
                            </a>
                        </div>
                        <div class="tab-pane fade" id="jobexperience" role="tabpanel"
                            aria-labelledby="jobexperience-tab">
                            <table class="table">
                                <thead style="border-bottom:1px solid #b9b9b9">
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
                                <button type="button" class="btn tab-edit-btn" style="margin-left: 12px;">
                                    Edit Experience <i class="fas fa-edit"></i>
                                </button>
                            </a>
                        </div>

                        <div class="tab-pane fade" id="skills" role="tabpanel" aria-labelledby="skills-tab">
                            <table class="table">
                                <thead style="border-bottom:1px solid #b9b9b9">
                                    <tr>
                                        <td scope="col">Sr. No</td>
                                        <td scope="col">Skill Name</td>
                                        {{-- <td scope="col">Experience Level</td> --}}
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
                                                @foreach($skilllevel as $sk)
                                                    @if( $sk->sl_id == $skill->sl_id )
                                                        {{ $sk->skill_level_name }}
                                                    @else
                                                    @endif
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="/skills">
                                <button type="button" class="btn tab-edit-btn" style="margin-left: 12px;">
                                    Edit Skills <i class="fas fa-edit"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="col-md-12 text-center">
                            <br>
                            <a class="btn tab-edit-btn" href="/">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
