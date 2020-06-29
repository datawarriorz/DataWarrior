@extends('layout.mainlayout')

@section('content')

<link rel="stylesheet" href="./css/internship.css">




 <!-- <div class="internship-container">

    </div> -->
    <div class="internship-container">
        <div id="regForm">
            <div id="tab1">
                <h2>New User?</h2>
                <h2>Click 'Next' To Fill Internship Application Details</h2>
                <div style=" overflow:auto;">
                    <div style="float:right;">
                        <button id="next1" type="button">Next</button>
                    </div>
                </div>
            </div>
            <div id="tab2">
                <form  class="" method="POST" action="internshipform">
    @csrf
                    
                    <h3>User Preference</h3>
                    <p></p>
                    1st Preferred Domain
                    <p><input type="text" class="form-control" id="validationCustom01" placeholder="Eg. Java"
                            name="preffereddomain1" autocomplete="off" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    </p>
                    2nd Preferred Domain
                    <p><input type="text" class="form-control" id="validationCustom01" placeholder="Eg. Oracle Database"
                            name="preffereddomain2" autocomplete="off" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    </p>
                    3rd Preferred Domain
                    <p><input type="text" class="form-control" id="validationCustom01" placeholder="Eg. Web Development"
                            name="preffereddomain3" autocomplete="off" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    </p>
                    <label for="validationCustom04">Select Preferred Stipend</label>
                    <p>
                        <select name="stipend" class="custom-select">
                            <option selected value="1">1-5000</option>
                            <option value="2">5000-10000</option>
                            <option value="3">10000-15000</option>
                            <option value="4">15000-20000</option>
                            <option value="5">20000-25000</option>
                        </select>
                    </p>
                    Location
                    <p><input type="text" class="form-control" id="validationCustom01" placeholder="Eg. Mumbai"
                            name="location" autocomplete="off" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    </p>
                    <button type="submit" class="waves-effect waves-light">
                        Save
                    </button>
                    <div style="overflow:auto;">
                        <div style="float:right;">
                            <button class="waves-effect waves-light" id="prev1" type="button">Previous</button>
                            <button class="waves-effect waves-light" id="next2" type="button">Next</button>
                        </div>
                    </div>
            </form>
            </div>
            <div id="tab3">
                <h3>Add your Skills</h3>
                <br>
                <form  class="" method="POST" action="/internshipsskills">
                    @csrf
                    @if(count($errors)) 
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.
                                    <br/>
                                    <ul>
                                        @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                    @endif
                    <fieldset>
                
                <div class="form-group">
                    <label for="skill1">Skill 1:</label>
                <input type="text" name='skill1' required class="form-control" value={{old('skill1')}}>
                
                </div>
                <div class="form-group">
                    <label for="skill2">Skill 2:</label>
                <input type="text" name='skill2' required class="form-control" value={{old('skill2')}}>
                
                </div>
                
                <div class="form-group">
                    <label for="skill3">Skill 3:</label>
                <input type="text" name='skill3' class="form-control" value={{old('skill3')}}>
                
                </div>
                
                
                <fieldset class="form-group form-inline">
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-5">
                        <button type="submit" class="btn">
                            Save
                        </button>
                    </div>
                </div>
                </fieldset>
                </form>
                <div style="overflow:auto;">
                    <div style="float:right;">
                        <button id="prev2" type="button">Previous</button>
                        <button id="next3" type="button">Next</button>
                    </div>
                </div>
            </div>
            <div id="tab4">

                <h3>Job Experience Details</h3>
                <form method="POST" action="/internshipexp">
                    @csrf
                    @if(count($errors))
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.
                        <br/>
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
                        <label for="Fname">Profile</label>
                        <input type="text" name='profile' required class="form-control" value={{old('profile')}}>
                        </div>
                        <div class="form-group">
                        <label for="Lname">Organisation</label>
                        <input type="text" name='organisation' required class="form-control" value={{old('oraganisation')}}>
                        </div>
                        <div class="form-group">
                        <label for="InputEmail">Location</label>
                        <input type="text" class="form-control" id="location" required name='location' value={{old('location')}}>
                        </div>
                       <div class="form-group">
                    <label for="start_date">Start Date</label>
                
                    <input type="date" name="startdate" required class="form-control" value={{old('start_date')}}>
                </div>
                
                <div class="form-group">
                    <label for="end_date">End Date</label>
                <input type="date" name="enddate" required class="form-control" value={{old('end_date')}}>
                
                </div>
                
                <div class="form-group form-inline" >
                   
                <input type="checkbox" name="currentjob" id="currentjob"  class="form-control" value="yes" > <label>Currently working</label>
                
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea  rows="4" class="form-control" id="description" required name='description' value={{old('description')}}></textarea>
                    </div>
                       
                    <fieldset class="form-group form-inline">
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn">
                                    Save
                                </button>
                            </div>
                        </div>
                        </fieldset>
                        

                <div style="overflow:auto;">
                    <div style="float:right;">
                        <button id="prev3" type="button">Previous</button>
                        <button id="next4" type="button">Next</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
            </div>
            <div id="tab5">
                <h3>Application Form</h3>
                <div style="overflow:auto;">
                    <div style="float:right;">
                        <button id="prev4" type="button">Previous</button>
                        <button id="next5" type="button">Submit</button>
                    </div>
                </div>
            </div>
            <div style="text-align:center;margin-top:40px;">
                <span class="step active"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
            </div>
        </div>
    </div>
</div>
       
@endsection