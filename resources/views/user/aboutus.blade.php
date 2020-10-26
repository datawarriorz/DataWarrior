@extends('user.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/main/aboutus.css') }}"/>
<div class="container">
    <br>
    <div class="card-body col-sm-12 col-md-12 col-lg-12">
        <div class="col-12 no-gutters text-center">
            <div class="col-12 col-sm-12 col-md-12">
                <div logo-image">
                    <img class="logo" src="./images/justlogo2.png" alt="Logo" style="height: 200px;" />
                </div>
            </div>
            <br>
            <h4>The Code of DataWarrior</h4>
            <div class="col-12 col-sm-12 col-md-12">
                <p>
                    DataWarriors seek to leverage data as the key to a better world for
                    themselves and for society. We believe that all professional challenges
                    can be overcome by knowledge, skill and wisdom. We are always eager
                    to learn and share ideas – for we know that through teamwork we will get
                    glory…come explore our world!
                </p>
                <br>
            </div>
            <h4>What do we Offer ?</h4>
            <div class="col-12 col-sm-12 col-md-12">
                <p>
                    We offer you the opportunity of a Better Career by providing Jobs, Internships,
                    Training, Projects and Knowledge Sharing. Talk to our Counsellors and
                    Experts they will lead you to a better future!
                </p>
                <br>
            </div>
        </div>
        <p></p>
    </div>
</div>
<br>
@endsection