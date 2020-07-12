@extends('layout.mainlayout')

@section('content')
<link rel="stylesheet" href="./css/internship.css">
<!-- <div class="internship-container">

    </div> -->
<div class="internship-container">
    <div id="regForm">
        <form class="" method="POST" action="/home">
            <!-- iteration 2 action=dashboard-->
            <div id="tab1">
                <div class="row container-column">
                    <div class="container-items text-center">
                        <br>
                        <br>
                        <h3>Great Everything Look Good! You have successfully applied for Internship </h3>
                        <br>
                        <br>
                        <h3>We will revert back to you on your registered email.</h3>
                        <br>
                        <div style=" overflow:auto;">
                            <div class="text-center">
                                <button id="next1" type="button">Finish</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
</form>
<div style="text-align:center;margin-top:40px;">
    <span class="step active"></span>
    <span class="step"></span>
</div>
</div>
</div>
@endsection