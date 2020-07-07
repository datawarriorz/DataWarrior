@extends('layout.mainlayout')

@section('content')
<link rel="stylesheet" href="./css/internshipfinal.css">
<div class="internship-container">
    <div id="InternFinalForm">
        <div>
            @csrf
            <div class="card">
                <div class="card-body">
                    <h4>Welcome {{ Auth::user()->first_name }} {{ Auth::user()->last_name}}</h4>
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
        </div>
    </div>
</div>

@endsection