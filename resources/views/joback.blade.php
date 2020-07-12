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
                <div class="container text-center">
                    <br>
                    <br>
                    <h3>Great everything looks good! </h3>
                    <br>
                    <h3>You have successfully applied for Job</h3>
                    <br>
                    <h3>We will revert back to you on your registered Email ID.</h3>
                    <br>
                    <div style=" overflow:auto;">
                        <a href="/jobfinal">
                            <div style="float:left;">
                                <button type="button"><i class="fal fa-arrow-alt-left"></i>Back</button>
                            </div>
                        </a>
                        <a href="/home">
                            <div style="float:right;">
                                <button type=" button">Done</button>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>
@endsection