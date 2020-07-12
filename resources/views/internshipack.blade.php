@extends('layout.mainlayout')

@section('content')
<link rel="stylesheet" href="./css/internship.css">
<!-- <div class="internship-container">

    </div> -->
<div class="internship-container">
    <div id="regForm">

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
                        <form class="" method="POST" action="/internshipfinal">
                            <div style="float:left;>
                                <button  type=" button">Back</button>
                            </div>
                        </form>
                        <form class="" method="POST" action="/home">
                            <div style="float:right;>
                                <button type=" button">Go to Home</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>
@endsection