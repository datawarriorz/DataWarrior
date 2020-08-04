@extends('profile.profilelayout')

@section('profilecontent')
<link rel="stylesheet" href="./css/expert/expert-qualification.css">
<br>
<div class="card">
    <div class="card-header text-center">
        <h4>Add your Qualifications</h4>
    </div>
    <div class="card-body">

        <form class="form-inline form-horizontal" method="POST" action="/expert-qualification-add">
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
                                name="qualtype_id">
                                @foreach($qualificationType as $qt)
                                    <option value={{ $qt->qualtype_id }}>{{ $qt->qualification_type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="form-group col-md-12">
                            <label for="qua_degree">Course Name :</label>
                            <input type="text" name='qua_degree' required class="form-control col-md-12"
                                placeholder="Eg. Bachelors in Computer Science" autocomplete="on"
                                value={{ old('course_name') }}>
                        </div>
                        <br>

                        <div class="form-group col-md-12">
                            <label for="qua_univerity">Univeristy :</label>
                            <input type="text" name='qua_univerity' class="form-control col-md-12"
                                placeholder="Eg. Mumbai University" autocomplete="on"
                                value={{ old('university') }}>
                        </div>
                    </div>

                </div>

                <br>

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
<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Qualification Type</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Univeristy</th>
                </tr>
            </thead>
            <tbody>
                @foreach($qualificationobj as $ed)
                    <tr>

                        <td> @foreach ($qualificationType as $qt)
                            @if($qt->qualtype_id==$ed->qualtype_id)
                                {{ $qt->qualification_type }}

                            @endif
                @endforeach

                </td>
                <td>{{ $ed->qua_degree }}</td>
                <td>{{ $ed->qua_univerity }}</td>
                <td>
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
<br>
@endsection
