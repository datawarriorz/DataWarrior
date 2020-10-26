@extends('user.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/user/user-5-0-profile.css') }}">
<br>
<div class="col-12 col-sm-12 col-md-8 col-lg-8 offset-md-2 ">
    <div class="card">
        <div class="card-header text-center">
            <h4>Expert</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-head">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-2" style="padding-left: 0;padding-right:0">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 text-center"
                                            style="padding-left: 0;padding-right:0">
                                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($expertobj->ex_image); ?>"
                                                style="height:144px;width:144px;border-radius:50%" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-10" style="padding-left: 33px">
                                    <h5>{{ $expertobj->ex_firstname }} {{ $expertobj->ex_lastname }}</h5>
                                    <br>
                                    <h6>{{ $expertobj->ex_aboutme }}</h6>
                                    <h6>Date of Birth : {{ $expertobj->ex_dateofbirth }}</h6>
                                    <br>
                                    <h6>{{ $expertobj->ex_description }}</h6>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link profilenav active" id="userdetails-tab" data-toggle="tab"
                                    href="#userdetails" role="tab" aria-controls="userdetails" aria-selected="true">
                                    Articles Published
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link profilenav" id="education-tab" data-toggle="tab" href="#education"
                                    role="tab" aria-controls="education" aria-selected="false">Counselling</a>
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
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="userdetails" role="tabpanel"
                            aria-labelledby="home-tab">
                            <div class="container">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="min-width: 70px;">Sr. No</th>
                                            <th scope="col" style="min-width: 180px;">Artile Title</th>
                                            <th scope="col" style="min-width: 280px;">Description</th>
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; ?>
                                        @foreach($articleslive as $article)
                                            <?php $i++; ?>
                                            <tr>
                                                <td><?php echo $i;?>
                                                </td>
                                                <td>
                                                    {{ $article->title }}
                                                </td>
                                                <td>
                                                    {{ $article->description }}
                                                </td>
                                                <td class="text-center">
                                                    <form method="post" action="/user-expert-view-article">
                                                        @csrf
                                                        <input type="hidden" name="article_id"
                                                            value={{ $article->article_id }} />
                                                        <button type="submit" class="btn tab-edit-btn">
                                                            View <i class="far fa-eye"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
                                    <a class="btn " href="/">Go Back</a>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td scope="col">Course</td>
                                        <td scope="col">Course Name</td>
                                        <td scope="col">Univeristy</td>
                                    </tr>
                                </thead>
                                <tbody>
@foreach($qualificationobj as $qu)
                                        <tr>
                                            <td>
@foreach($qualificationType as $qt)
@if($qt->qualtype_id==$qu->qualtype_id)
                                                        {{ $qt->qualification_type }}
                        @endif
                        @endforeach
                        </td>
                        <td>{{ $qu->qua_degree }}</td>
                        <td>{{ $qu->qua_univerity }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                        </table>
                        <br>
                        <a href="/expert-qualification-edit">
                            <button type="button" class="btn tab-edit-btn">Edit Education
                                Details
                                <i class="fas fa-edit"></i>
                            </button>
                        </a>
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
                                @foreach($experienceobj as $exp)
                                    <tr>
                                        <td>{{ $exp->exp_profile }}</td>
                                        <td>{{ $exp->exp_organisation }}</td>
                                        <td>{{ $exp->exp_location }}</td>
                                        <td>{{ $exp->exp_description }}</td>
                                        <td>{{ $exp->exp_currentjob }}</td>
                                        <td>{{ substr($exp->exp_startdate,0,10) }}</td>
                                        <td>{{ substr($exp->exp_enddate,0,10) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        <a href="/expert-experience-edit"><button type="button" class="btn tab-edit-btn">Edit
                                Experience <i class="fas fa-edit"></i></button></a>
                    </div>

                    <div class="tab-pane fade" id="skills" role="tabpanel" aria-labelledby="skills-tab">
                        <div class="row">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td scope="col">Sr. No</td>
                                        <td scope="col">Skill Name</td>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=0; ?>
                                    @foreach($skillsobj as $skill)
                                        <?php $i++; ?>
                                        <tr>
                                            <td><?php echo $i;?>
                                            </td>
                                            <td>
                                                {{ $skill->sk_name }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class=" col-md-6">
                            </div>
                        </div>
                        <br>
                        <a href="/expert-skill-edit">
                            <button type="button" class="btn tab-edit-btn">Edit Skills <i class="fas fa-edit"></i>
                            </button>
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<br>
@endsection
