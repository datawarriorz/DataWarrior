@extends('layout.expertlayout')

@section('content')
<link rel="stylesheet" href="./css/qualification.css">
<br>
<div class="card">
    <div class="card-header text-center">
        <h4>Article List</h4>
    </div>
    <div class="card-body">
        <form class="form-inline form-horizontal" method="POST" action="/updateQualification">
            @csrf
            <fieldset>
                <div class="form-group col-md-12">
                    <div class="form-group col-md-6">
                        <div class="form-group col-md-12">
                            <label>Qualification Type :</label>
                            <select class="form-control custom-select col-md-12" id="qualificationtype"
                                name="qualificationtype">
                                @foreach($qualificationType as $qt)
                                    <option value={{ $qt->qualtype_id }}>{{ $qt->qualification_type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="form-group col-md-12">
                            <label>Course Name :</label>
                            <input type="text" name='course_name' required class="form-control col-md-12"
                                placeholder="Eg. Bachelors in Computer Science" autocomplete="on"
                                value={{ old('course_name') }}>
                        </div>
                        <br>
                        <div class="form-group col-md-12">
                            <label for="college_name">College/Institute Name :</label>
                            <input type="text" name='college_name' required class="form-control col-md-12"
                                placeholder="Eg. Wilson College" autocomplete="on"
                                value={{ old('college_name') }}>
                        </div>
                        <br>
                        <div class="form-group col-md-12">
                            <label for="college_name">Univeristy :</label>
                            <input type="text" name='university' class="form-control col-md-12"
                                placeholder="Eg. Mumbai University" autocomplete="on"
                                value={{ old('university') }}>
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
                    </div>
                </div>
                <br>
                <div class="form-group col-md-12">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn qualification_btn">
                            Save <i class="far fa-save"></i>
                        </button>
                    </div>
                </div>
        </form>
    </div>
</div>
<br>
@foreach($articles as $article)
    Article->title :{{ $article->title }}
@endforeach

@endsection
