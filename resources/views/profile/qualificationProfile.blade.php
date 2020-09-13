@extends('profile.profilelayout')

@section('profilecontent')
<link rel="stylesheet" href="./css/user/qualification.css">
<link rel="stylesheet" href="./css/user/user-master.css">
<br>
<div class="card">
    <div class="card-header text-center">
        <h4>Add your Qualifications</h4>
    </div>
    <div class="card-body">

        <form class="form-inline form-horizontal" method="POST" action="/updateQualification">
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
            <fieldset>
                <div class="form-group col-md-12">
                    <div class="form-group col-md-6">
                        <div class="form-group col-md-12">
                            <label for="qualificationtype">Qualification Type :</label>
                            <select class="form-control custom-select col-md-12" id="qualificationtype"
                                name="qualificationtype">
                                @foreach($qualificationType as $qt)
                                <option value={{ $qt->qualtype_id }}>{{ $qt->qualification_type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="form-group col-md-12">
                            <label for="course_name">Course Name :</label>
                            <input type="text" name='course_name' required class="form-control col-md-12"
                                placeholder="Eg. Bachelors in Computer Science" autocomplete="on"
                                value={{ old('course_name') }}>
                        </div>
                        <br>
                        <div class="form-group col-md-12">
                            <label for="college_name">College/Institute Name :</label>
                            <input type="text" name='college_name' required class="form-control col-md-12"
                                placeholder="Eg. Wilson College" autocomplete="on" value={{ old('college_name') }}>
                        </div>
                        <br>
                        <div class="form-group col-md-12">
                            <label for="college_name">Univeristy :</label>
                            <input type="text" name='university' class="form-control col-md-12"
                                placeholder="Eg. Mumbai University" autocomplete="on" value={{ old('university') }}>
                        </div>
                    </div>
                    <br>
                    <div class="form-group col-md-6">
                        <div class="form-group col-md-12">
                            <label for="Percentage">Percentage :</label>
                            <input type="text" name='percentage' class="form-control col-md-12" placeholder="Eg. 70.08"
                                autocomplete="on" value={{ old('percentage') }}>
                        </div>
                        <br>
                        <div class="form-group col-md-12">
                            <label for="grade">Grade :</label>
                            <input type="text" name='grade' class="form-control col-md-12" placeholder="Eg. A"
                                autocomplete="on" value={{ old('grade') }}>
                        </div>
                        <br>
                        <div class="form-group col-md-12">
                            <label for="start_date">Start Date :</label>
                            <input type="text" placeholder="Click here to Select Date." name="start_date"
                                autocomplete="on" onfocus="(this.type='date')" required class="form-control col-md-12"
                                value={{ old('start_date') }}>
                        </div>
                        <br>
                        <div class="form-group col-md-12">
                            <label for="end_date">End Date :</label>
                            <input type="text" placeholder="Click here to Select Date." name="end_date"
                                autocomplete="on" onfocus="(this.type='date')" required class="form-control col-md-12"
                                value={{ old('end_date') }}>
                        </div>
                    </div>
                    @if($process=="internship")
                    <div class="form-group col-md-12">
                        <input type="hidden" name="process" class="form-control" value="internship" />
                    </div>
                    @endif
                    @if($process=="job")
                    <div class="form-group col-md-12">
                        <input type="hidden" name="process" class="form-control" value="job" />
                    </div>
                    @endif
                </div>
                <br>
                <div class="form-group col-md-12">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn expert-btn1">
                            Save <i class="far fa-save"></i>
                        </button>
                        <br>
                        <br>
                        <a class="btn expert-btn1" href="/viewprofile">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
        </form>
    </div>
</div>
<br>
<div class="card">
    <div class="card-body">
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
                    <td>
                        <form method="POST" action="/deletequalification">
                            @csrf
                            <input type="hidden" name="qualid" value={{ $ed->id }} />
                            @if($process=="internship")
                            <div class="form-group">
                                <input type="hidden" name="process" class="form-control" value="internship" />
                            </div>

                            @endif
                            @if($process=="job")
                            <div class="form-group">
                                <input type="hidden" name="process" class="form-control" value="job" />
                            </div>

                            @endif
                            <button type="submit" class="btn btn-danger" onclick="">Delete</button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        @if($process=="internship")
        <a href="/internshipfinal" class="btn qualification_btn">View Internship form</a>
        @endif
        @if($process=="job")
        <a href="/jobfinal" class="btn qualification_btn">View Job Application form</a>
        @endif
    </div>
</div>
<br>
@endsection