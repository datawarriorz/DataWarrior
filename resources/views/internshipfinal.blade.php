@extends('layout.mainlayout')

@section('content')
<link rel="stylesheet" href="./css/internshipfinal.css">
<div class="internship-container">
    <div id="InternFinalForm">
        <div>
            <h4 class="text-center" style="margin-bottom:1.5rem;margin-top: -21px;">Application Overview</h4>
            @csrf
            <div class="card">
                <div class="card-body">
                    <h4>Internship Preferences</h4>
                    <table class="table">
                        <tbody>
                            @foreach($internship as $in)
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
                                <td scope="col">Stipend</td>
                                <td>:</td>
                                <td>{{$in->stipend}} /-</td>
                            </tr>
                            <tr>
                                <td scope="col">Location</td>
                                <td>:</td>
                                <td>{{$in->internshiplocation}}</td>
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
                    <form class="text-center" metdod="POST" action="/">
                        @csrf
                        <input type="hidden" name="prefid" value={{$in->id}} />
                        <button type="submit" class="btn-primary" onclick="">Edit <i class="fas fa-edit"></i> </button>
                    </form>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-body" style="overflow-x: scroll;">
                    <h4>Highest Qualification</h4>
                    <table class="table text-center">
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
                                <td scope="col">Action</td>
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
                                <td>
                                    <form metdod="POST" action="/deletequalification">
                                        @csrf
                                        <input type="hidden" name="qualid" value={{$ed->id}} />

                                        <button type="submit" class="btn-danger" onclick="">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <form class="text-center" metdod="POST" action="/qualification">
                        @csrf
                        <input type="hidden" name="process" value="internship" />
                        <button type="submit" class="btn-success" onclick="">Add</button>
                    </form>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-body" style="overflow-x: scroll;">
                    <h4>Skills</h4>
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <td>Sr. No.</td>
                                <td scope="col">Skill Name</td>
                                <td scope="col">Experience Level</td>
                                <td scope="col">Action</td>
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
                                <td>
                                    @foreach ($skilllevel as $sk)
                                    @if($sk->skill_level_id==$skill->skill_level_id)
                                    {{$sk->skill_level_name}}
                                    @endif
                                    @endforeach
                                </td>
                                <td>
                                    <form metdod="POST" action="/deleteskills">
                                        @csrf
                                        <input type="hidden" name="userskills_id" value={{$skill->userskills_id}} />
                                        <button type="submit" class="btn-danger" onclick="">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <form class="text-center" metdod="POST" action="/skills">
                        @csrf
                        <input type="hidden" name="process" value="internship" />
                        <button type="submit" class="btn-success" onclick="">Add</button>
                    </form>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-body" style="overflow-x: scroll;">
                    <h4>Job Experience Details</h4>
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <td scope="col">Profile</td>
                                <td scope="col">Organisation</td>
                                <td scope="col">Location</td>
                                <td scope="col">Description</td>
                                <td scope="col">Current Job</td>
                                <td scope="col">Start Date</td>
                                <td scope="col">End Date</td>
                                <td scope="col">Action</td>
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
                                <td>
                                    <form metdod="POST" action="/deleteJobexperience">
                                        @csrf
                                        <input type="hidden" name="jobid" value={{$je->jobid}} />
                                        <button type="submit" class="btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <form class="text-center" metdod="POST" action="/jobexperience">
                        @csrf
                        <input type="hidden" name="process" value="internship" />
                        <button type="submit" class="btn-success" onclick="">Add</button>
                    </form>
                </div>
            </div>
            <br>
            <!-- <form class="" method="POST" action="/internship">
                <div style=" overflow:auto;">
                    <div class="text-center">
                        <button id="next1" type="button">Finish</button>
                    </div>
                </div>
            </form> -->
            <div style=" overflow:auto;">
                <div class="text-center">
                    <a href="/internshipack"><button type="button">Finish</button></a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection