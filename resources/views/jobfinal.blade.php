@extends('layout.mainlayout')

@section('content')
<link rel="stylesheet" href="./css/jobfinal.css">
<div class="job-container">
    <div id="InternFinalForm">
        <div>
            <h4 class="text-center" style="margin-bottom:1.5rem;margin-top: -21px;">Job Application Details</h4>
            @csrf
            <div class="card">
                <div class="card-body">
                    <h4>Job Preferences</h4>
                    <table class="table">
                        <tbody>
                            @foreach($job as $in)
                            <tr>
                                <td scope="col">1st Preferred Domain</td>
                                <td>:</td>
                                <td>{{$in->preferreddomain1}}</td>
                            </tr>
                            <tr>
                                <td scope="col">2nd Preferred Domain</td>
                                <td>:</td>
                                <td>{{$in->preferreddomain2}}</td>
                            </tr>
                            <tr>
                                <td scope="col">3rd Preferred Domain</td>
                                <td>:</td>
                                <td>{{$in->preferreddomain3}}</td>
                            </tr>
                            <tr>
                                <td scope="col">Salary</td>
                                <td>:</td>
                                <td>{{$in->salary}} /-</td>
                            </tr>
                            <tr>
                                <td scope="col">Location</td>
                                <td>:</td>
                                <td>{{$in->joblocation}}</td>
                            </tr>
                            <tr>
                                <td scope="col">Career Counsel</td>
                                <td>:</td>
                                <td>{{$in->counselling}}</td>
                            </tr>
                            <tr>
                                <td scope="col"></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <form class="text-center" method="POST" action="/deleteJob">
                        @csrf
                        <input type="hidden" name="prefid" value={{$in->id}} />
                        <button type="submit" class="btn-danger" onclick="">Delete <i
                                class="far fa-trash-alt"></i></button>
                    </form>
                </div>
            </div>
            <br>
            <div>
                <div class="card">
                    <div class="card-body" style="overflow-x: scroll;">
                        <h4>Qualifications</h4>
                        <table class="table text-center">
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
                                    <!-- <th scope="col" colspan="2">Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($eduDetails as $ed)
                                <tr>
                                    <td> @foreach ($qualificationType as $qt)
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
                                    <!-- <td>
                                        {{-- <form method="POST" action="/deleteskills">
                                            @csrf
                                            <input type="hidden" name="userskills_id" value={{$ed->id}}
                                            />
                                            <button type="submit" class="btn-danger" onclick="">Edit</button>
                                        </form>
                                    </td> --}}
                                    <td>
                                        <form method="POST" action="/deletequalification">
                                            @csrf
                                            <input type="hidden" name="qualid" value={{$ed->id}} />
                                            <button type="submit" class="btn-danger" onclick="">Delete</button>
                                        </form>
                                    </td> -->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        <form class="text-center" method="POST" action="/qualification">
                            @csrf
                            <input type="hidden" name="process" value="job" />
                            <button type="submit" class="btn-primary" onclick="">Edit <i class="fas fa-edit"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <br>
            <div>
                <div class="card">
                    <div class="card-body" style="overflow-x: scroll;">
                        <h4>Skills</h4>
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th scope="col">Skill Name</th>
                                    <th scope="col">Experience Level</th>
                                    <!-- <th scope="col" colspan="2">Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0; ?>
                                @foreach($skills as $skill)
                                <tr>
                                    <?php $i++; ?>
                                    <td><?php echo $i;?>
                                    </td>
                                    <td>{{$skill->skill_name}}</td>
                                    <td>@foreach ($skilllevel as $sk)
                                        @if($sk->skill_level_id==$skill->skill_level_id)
                                        {{$sk->skill_level_name}}
                                        @endif
                                        @endforeach
                                    </td>

                                    <!-- <td>
                                        <form method="POST" action="/deleteskills">
                                            @csrf
                                            <input type="hidden" name="userskills_id" value={{$skill->userskills_id}} />
                                            <button type="submit" class="btn-danger" onclick="">Edit</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="POST" action="/deleteskills">
                                            @csrf
                                            <input type="hidden" name="userskills_id" value={{$skill->userskills_id}} />
                                            <button type="submit" class="btn-danger" onclick="">Delete</button>
                                        </form>
                                    </td> -->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        <form class="text-center" method="POST" action="/skills">
                            @csrf
                            <input type="hidden" name="process" value="job" />
                            <button type="submit" class="btn-primary" onclick="">Edit <i class="fas fa-edit"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <br>
            <div>
                <div class="card">
                    <div class="card-body" style="overflow-x: scroll;">
                        <h4>Job Experience Details</h4>
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Profile</th>
                                    <th scope="col">Organisation</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Current Job</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <!-- <th scope="col">Action</th> -->
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
                                    <!-- <td>
                                        <form method="POST" action="/deleteJobexperience">
                                            @csrf
                                            <input type="hidden" name="jobid" value={{$je->jobid}} />
                                            <button type="submit" class="btn-danger">Delete</button>
                                        </form>
                                    </td> -->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        <form class="text-center" method="POST" action="/jobexperience">
                            @csrf
                            <input type="hidden" name="process" value="job" />
                            <button type="submit" class="btn-primary" onclick="">Edit <i class="fas fa-edit"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <br>
            <div style=" overflow:auto;">
                <div class="text-center">
                    <a href="/joback"><button type="button">Finish</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection