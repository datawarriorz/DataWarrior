@extends('layout.mainlayout')

@section('content')
<link rel="stylesheet" href="./css/internshipfinal.css">
<div class="internship-container">
    <div id="InternFinalForm">
        <div>
            <h4 class="text-center" style="margin-bottom:1.5rem;margin-top: -21px;">Internship Application Details</h4>
            @csrf
            <div class="card">
                <div class="card-body" style="overflow-x: scroll;">
                    <h4>Internship Preferences</h4>
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">1st Preferred Domain</th>
                                <th scope="col">2nd Preferred Domain</th>
                                <th scope="col">3rd Preferred Domain</th>
                                <th scope="col">Stipend</th>
                                <th scope="col">Location</th>
                                <th scope="col">Career Counsel</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($internship as $in)
                            <tr>
                                <td>{{$in->preferreddomain1}}</td>
                                <td>{{$in->preferreddomain2}}</td>
                                <td>{{$in->preferreddomain3}}</td>
                                <td>{{$in->stipend}}</td>
                                <td>{{$in->internshiplocation}}</td>
                                <td>{{$in->counselling}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-body" style="overflow-x: scroll;">
                    <h4>Highest Qualification</h4>
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
                                <th scope="col">Action</th>
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
                                    <form method="POST" action="/deletequalification">
                                        @csrf
                                        <input type="hidden" name="qualid" value={{$ed->id}} />

                                        <button type="submit" class="btn-danger" onclick="">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <form class="text-center" method="POST" action="/qualification">
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
                                <th>Sr. No.</th>
                                <th scope="col">Skill 1</th>
                                <th scope="col">Skill 2</th>
                                <th scope="col">Skill 3</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0; ?>
                            @foreach($skills as $skill)
                            <tr>
                                <?php $i++; ?>
                                <td><?php echo $i;?>
                                </td>
                                <td>{{$skill->skill1}}</td>
                                <td>{{$skill->skill2}}</td>
                                <td>{{$skill->skill3}}</td>
                                <td>
                                    <form method="POST" action="/deleteskills">
                                        @csrf
                                        <input type="hidden" name="userskills_id" value={{$skill->userskills_id}} />
                                        <button type="submit" class="btn-danger" onclick="">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <form class="text-center" method="POST" action="/skills">
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
                                <th scope="col">Profile</th>
                                <th scope="col">Organisation</th>
                                <th scope="col">Location</th>
                                <th scope="col">Description</th>
                                <th scope="col">Current Job</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">End Date</th>
                                <th scope="col">Action</th>
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
                                    <form method="POST" action="/deleteJobexperience">
                                        @csrf
                                        <input type="hidden" name="jobid" value={{$je->jobid}} />
                                        <button type="submit" class="btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <form class="text-center" method="POST" action="/jobexperience">
                        @csrf
                        <input type="hidden" name="process" value="internship" />
                        <button type="submit" class="btn-success" onclick="">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection