@extends('expert.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/expert/expert-5-2-edit-education.css') }}">
<div class="col-12 col-sm-12 col-md-8 col-lg-8 offset-md-2">
    <div class="card">
        <div class="card-header text-center">
            <h4>Add your Qualifications</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="/expert-qualification-add">
                <div class="form-group">
                    <label for="qualificationtype">Qualification Type :</label>
                    <select class="form-control custom-select" id="qualificationtype" name="qualtype_id">
                        @foreach($qualificationType as $qt)
                        <option value={{ $qt->qualtype_id }}>{{ $qt->qualification_type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="qua_degree">Course Name :</label>
                    <input type="text" name='qua_degree' required class="form-control"
                        placeholder="Eg. Bachelors in Computer Science" autocomplete="on"
                        value={{ old('course_name') }}>
                </div>
                <div class="form-group">
                    <label for="qua_univerity">Univeristy :</label>
                    <input type="text" name='qua_univerity' class="form-control" placeholder="Eg. Mumbai University"
                        autocomplete="on" value={{ old('university') }}>
                </div>
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
                <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12 text-center">
                    <div class="row text-center">
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 text-right">
                            <a class="btn tab-edit-btn" href="/expert-profile">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 text-left">
                            <button type=" submit" class="btn tab-edit-btn">
                                Save <i class="far fa-save"></i>
                            </button>
                        </div>
                    </div>
                </div>
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
                        <th scope="col">Univeristy</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($qualificationobj as $ed)
                    <tr>
                        <td>
                            @foreach($qualificationType as $qt)
                            @if($qt->qualtype_id==$ed->qualtype_id)
                            {{ $qt->qualification_type }}
                            @endif
                            @endforeach
                        </td>
                        <td>{{ $ed->qua_degree }}</td>
                        <td>{{ $ed->qua_univerity }}</td>
                        <td class="text-center">
                            <form method="POST" action="/expert-qualification-delete">
                                @csrf
                                <input type="hidden" name="qua_id" value={{ $ed->qua_id }} />

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
@endsection