@extends('layout.mainlayout')

@section('content')

<link rel="stylesheet" href="./css/internship.css">
<hr class="thick">
<!-- <div class="internship-container">

    </div> -->
<div class="internship-container">
    <div id="regForm">
        <form class="" method="POST" action="/internshipform">
            <div id="tab1">
                <h2>New User?</h2>
                <h2>Click 'Next' To Fill Internship Application Details</h2>
                <div style=" overflow:auto;">
                    <div style="float:right;">
                        <button id="next1" type="button">Next</button>
                    </div>
                </div>
            </div>
            <div id="tab2" class="needs-validation-tab2">
                @csrf
                <h3>Internship Preference</h3>

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
                        Select Preferred Stipend :
                        <p>
                            <select name="stipend" class="custom-select fc-tab2" id="stipendid">
                                <option selected value="1">1-5000</option>
                                <option value="2">5000-10000</option>
                                <option value="3">10000-15000</option>
                                <option value="4">15000-20000</option>
                                <option value="5">20000-25000</option>
                            </select>
                        </p>
                        Location :
                        <p><input type="text" class="form-control fc-tab2" id="validationCustom05"
                                placeholder="Eg. Mumbai" name="internshiplocation" autocomplete="on" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        </p>
                        <p>
                        <div class="form-group form-inline">
                            <label> Do you want to apply for career counselling/guidance?</label>
                            <input type="checkbox" name="counselling" id="counselling" class="form-control" value="yes"
                                style="margin-left: 8px;margin-top: 2px;">
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
                                <button class="waves-effect waves-light" id="next2" type="button">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab3">
                <h3>Highest Qualification</h3>
                <br>
                <div class="card">
                    <div class="card-body">
                        @csrf
                        @if(count($errors))
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.
                            <br />
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="qualificationtype">Qualification Type :</label>
                            <select class="form-control custom-select" id="qualificationtype" name="qualificationtype">
                                @foreach ($qualificationType as $qt)
                                <option value={{$qt->qualtype_id}}>{{ $qt->qualification_type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="course_name">Course Name :</label>
                            <input type="text" name='course_name' required class="form-control"
                                placeholder="Eg. Bachelors in Computer Science" autocomplete="on"
                                value={{old('course_name')}}>
                        </div>
                        <div class="form-group">
                            <label for="college_name">College/Institute Name :</label>
                            <input type="text" name='college_name' required class="form-control"
                                placeholder="Eg. Wilson College" autocomplete="on" value={{old('college_name')}}>
                        </div>
                        <div class="form-group">
                            <label for="college_name">Univeristy :</label>
                            <input type="text" name='university' class="form-control"
                                placeholder="Eg. Mumbai University" autocomplete="on" value={{old('university')}}>
                        </div>
                        <div class="form-group">
                            <label for="Percentage">Percentage :</label>
                            <input type="text" name='percentage' class="form-control" placeholder="Eg. 70.08"
                                autocomplete="on" value={{old('percentage')}}>
                        </div>
                        <div class="form-group">
                            <label for="grade">Grade :</label>
                            <input type="text" name='grade' class="form-control" placeholder="Eg. A" autocomplete="on"
                                value={{old('grade')}}>
                        </div>
                        <div class="form-group">
                            <label for="start_date">Start Date :</label>
                            <input type="text" placeholder="Click here to Select Date." name="start_date"
                                autocomplete="on" onfocus="(this.type='date')" required class="form-control"
                                value={{old('start_date')}}>
                        </div>
                        <div class="form-group">
                            <label for="end_date">End Date :</label>
                            <input type="text" placeholder="Click here to Select Date." name="end_date"
                                autocomplete="on" onfocus="(this.type='date')" required class="form-control"
                                value={{old('end_date')}}>
                        </div>
                        <p>
                        <div id="tab3-error" class="alert alert-danger">
                            <strong>Alert!</strong>
                            <ul>
                                <label id="tab3-label"></label>
                            </ul>
                        </div>
                        </p>
                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <button id="prev2" type="button">Previous</button>
                                <button id="next3" type="button">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-body" style="overflow-x: scroll;">
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
                                            <button type="submit" class="btn btn-danger" onclick="">Delete</button>
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="tab4">
                <h3>Add your Skills</h3>
                <br>
                @csrf
                @if(count($errors))
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <br />
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="skill1">Skill 1 :</label>
                            <input type="text" name='skill1' required class="form-control" placeholder="Eg. B"
                                autocomplete="on" value={{old('skill1')}}>
                        </div>
                        <div class="form-group">
                            <label for="skill2">Skill 2 :</label>
                            <input type="text" name='skill2' required class="form-control" value={{old('skill2')}}>
                        </div>
                        <div class="form-group">
                            <label for="skill3">Skill 3 :</label>
                            <input type="text" name='skill3' class="form-control" value={{old('skill3')}}>
                        </div>
                        <p>
                        <div id="tab4-error" class="alert alert-danger">
                            <strong>Alert!</strong>
                            <ul>
                                <label id="tab4-label"></label>
                            </ul>
                        </div>
                        </p>
                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <button id="prev3" type="button">Previous</button>
                                <button id="next4" type="button">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-body" style="overflow-x: scroll;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th scope="col">Skill 1</th>
                                    <th scope="col">Skill 2</th>
                                    <th scope="col">Skill 3</th>

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
                                            <button type="submit" class="btn btn-danger" onclick="">Delete</button>
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="tab5">
                <h3>Job Experience Details</h3>
                @csrf
                @if(count($errors))
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <br />
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="Fname">Profile :</label>
                            <input type="text" name="profile" class="form-control" placeholder="Eg. Software Developer"
                                autocomplete="on" value={{old('profile')}}>
                        </div>
                        <div class="form-group">
                            <label for="Lname">Organisation :</label>
                            <input type="text" name="organisation" class="form-control"
                                placeholder="Eg. ABC Private Limited" autocomplete="on" value={{old('oraganisation')}}>
                        </div>
                        <div class="form-group">
                            <label for="InputEmail">Location :</label>
                            <input type="text" name="location" class="form-control" placeholder="Eg. Mumbai"
                                autocomplete="on" id="location" value={{old('location')}}>
                        </div>
                        <div class="form-group form-inline">
                            <label>Currently Working ?</label>
                            <input type="checkbox" name="currentjob" class="form-control" id="currentjob" value="yes"
                                onclick="onCheckCounselling(this);" style="margin-left: 8px;margin-top: 2px;">
                        </div>
                        <div class="form-group">
                            <label for="start_date">Start Date :</label>
                            <input type="text" name="startdate" class="form-control" id="jobstartdate"
                                onfocus="(this.type='date')" placeholder="Click here to Select Date."
                                value={{old('start_date')}}>
                        </div>
                        <div class="form-group">
                            <label for="end_date">End Date :</label>
                            <input type="text" name="enddate" class="form-control" id="jobenddate"
                                onfocus="(this.type='date')" placeholder="Click here to Select Date."
                                value={{old('end_date')}}>
                        </div>
                        <div class="form-group">
                            <label>Description :</label>
                            <textarea name="description" class="form-control" id="description" placeholder="Eg. Mumbai"
                                autocomplete="on" rows="4" value={{old('description')}}></textarea>
                        </div>
                        <p>
                        <div id="tab4-error" class="alert alert-danger">
                            <strong>Alert!</strong>
                            <ul>
                                <label id="tab4-label"></label>
                            </ul>
                        </div>
                        </p>
                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <button id="prev4" type="button">Previous</button>
                                <button id="next5" type="button">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-body" style="overflow-x: scroll;">
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
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="tab6">
                <h3>Application Form</h3>
                <div class="card">
                    <div class="card-body" style="overflow-x:scroll">
                        <table class="table">
                            <tr>
                                <th colspan="2">User Preferrence</th>

                            </tr>
                            <tr>
                                <td>1st Preferred Domain</td>
                                <td><label id="af1"></label></td>

                            </tr>
                            <tr>
                                <td>2nd Preferred Domain </td>
                                <td><label id="af2"></label></td>

                            </tr>
                            <tr>
                                <td>3rd Preferred Domain </td>
                                <td><label id="af3"></label></td>

                            </tr>
                            <tr>
                                <td>Selected Preferred Stipend </td>
                                <td><label id="af4"></label></td>

                            </tr>
                            <tr>
                                <td>Preferred Location</td>
                                <td><label id="af5"></label></td>

                            </tr>
                            <tr>
                                <td>Applied for Carrier Counselling/Guidance</td>
                                <td><label id="afdnew1"></label></td>
                            </tr>
                            <tr>
                                <th colspan="2">Qualification</th>
                            </tr>
                            <tr>
                                <td>Qualification Type</td>
                                <td><label id="af6"></label></td>

                            </tr>
                            <tr>
                                <td>Course Name </td>
                                <td><label id="af7"></label></td>

                            </tr>
                            <tr>
                                <td>College/Institute Name</td>
                                <td><label id="af8"></label></td>

                            </tr>
                            <tr>
                                <td>Univeristy </td>
                                <td><label id="af9"></label></td>

                            </tr>
                            <tr>
                                <td>Percentage</td>
                                <td><label id="af10"></label></td>

                            </tr>
                            <tr>
                                <td>Grade </td>
                                <td><label id="af11"></label></td>
                            </tr>
                            <tr>
                                <td>Start Date </td>
                                <td><label id="af12"></label></td>
                            </tr>
                            <tr>
                                <td>End Date </td>
                                <td><label id="af13"></label></td>
                            </tr>
                            <tr>
                                <th colspan="2">Skills</th>
                            </tr>
                            <tr>
                                <td>Skill 1</td>
                                <td><label id="af14"></label></td>
                            </tr>
                            <tr>
                                <td>Skill 2</td>
                                <td><label id="af15"></label></td>
                            </tr>
                            <tr>
                                <td>Skill 3</td>
                                <td><label id="af16"></label></td>
                            </tr>
                            </tr>
                            <tr>
                                <th colspan="2">Job Experience</th>
                            </tr>
                            <tr>
                                <td> Profile </td>
                                <td><label id="af17"></label></td>
                            </tr>
                            <tr>
                                <td>Organisation</td>
                                <td><label id="af18"></label></td>
                            </tr>
                            <tr>
                                <td>Location</td>
                                <td><label id="af19"></label></td>
                            </tr>
                            <tr>
                                <td>Start Date </td>
                                <td><label id="af20"></label></td>
                            </tr>
                            <tr>
                                <td>End Date </td>
                                <td><label id="af21"></label></td>
                            </tr>
                            <tr>
                                <td>Currently Working?</td>
                                <td><label id="afdnew2"></label></td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td><label id="af22"></label></td>
                            </tr>
                        </table>

                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <button id="prev5" type="button">Previous</button>
                                <button id="next6" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div style="text-align:center;margin-top:40px;">
            <span class="step active"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
        </div>
    </div>
</div>
</div>

@endsection