@extends('profile.profilelayout')

@section('profilecontent')


<div class="card">
    <div class="card-body">
        
<form  class="form-inline form-horizontal" method="POST" action="/updateQualification">
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
<legend>Add new Qualification </legend>
<div class="form-group">
    <label for="qualificationtype">Qualification Type</label>
    <select  class="form-control" id="qualificationtype" name="qualificationtype">
        
        @foreach ($qualificationType as $qt)
        <option value={{$qt->qualtype_id}}>{{ $qt->qualification_type }}</option>
    @endforeach
    </select>
</div>
<div class="form-group">
    <label for="course_name">Course Name</label>
<input type="text" name='course_name' required class="form-control" value={{old('course_name')}}>

</div>
<div class="form-group">
    <label for="college_name">College/Institute Name</label>
<input type="text" name='college_name' required class="form-control" value={{old('college_name')}}>

</div>

<div class="form-group">
    <label for="college_name">Univeristy</label>
<input type="text" name='university' class="form-control" value={{old('university')}}>

</div>
<div class="form-group">
    <label for="Percentage">Percentage</label>
<input type="text" name='percentage' class="form-control" value={{old('percentage')}}>

</div>
<div class="form-group">
    <label for="grade">Grade</label>
<input type="text" name='grade' class="form-control" value={{old('grade')}}>

</div>
<div class="form-group">
    <label for="start_date">Start Date</label>

    <input type="date" name="start_date" required class="form-control" value={{old('start_date')}}>
</div>

<div class="form-group">
    <label for="end_date">End Date</label>
<input type="date" name="end_date" required class="form-control" value={{old('end_date')}}>

</div>


<fieldset class="form-group form-inline">
<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            Save
        </button>
    </div>
</div>
</fieldset>
</form>
        
    </div>
</div> 

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
                <td>
                <form   method="POST" action="/deletequalification">
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
    

@endsection