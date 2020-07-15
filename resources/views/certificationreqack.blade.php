@extends('layout.mainlayout')

@section('content')
<link rel="stylesheet" href="./css/certificationack.css" />

    <div class="container">
        <h3>Thank You</h3>
        You have successfully requested for  <b>
        @foreach($certificationreqack as $certreq)
       {{$certreq->title}}
        @endforeach
        </b>
        <br>
        <a href="/certification"><-View More Certification</a><div id="split"></div>
        <a href="/home">Go to HomePage-></a>
    </div>

@endsection