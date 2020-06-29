<title>Data Warriors</title>
    <meta charset="utf-8" />
    <link rel="icon" href=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    
    
    <script type="text/javascript" src="https://kit.fontawesome.com/01bd91f070.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- <script type="text/javascript" src="{{ asset('js/internship.js') }}"></script> --}}
    <script>
(function () {
    'use strict';
    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
$(document).ready(function () {
    $("#next1").click(function () {
        //if(validateTab1()){
        var n = 0;
        $("#tab1").hide("slow");
        StepIndicator(n);
        $("#tab2").show("slow");
        document.getElementsByClassName("step")[n].className += " finish";
        //}
        //$("#tab1").animate({width:'toggle'},0);
        //$("#tab2").animate({width:'toggle'},1000);
    });
    $("#prev1").click(function () {
        var n = 0;
        $("#tab2").hide("slow");
        StepBackIndicator(n);
        $("#tab1").show("slow");
    });
    $("#next2").click(function () {
        var n = 1;
        $("#tab2").hide("slow");
        StepIndicator(n);
        $("#tab3").show("slow");
        document.getElementsByClassName("step")[n].className += " finish";
    });
    $("#prev2").click(function () {
        var n = 1;
        $("#tab3").hide("slow");
        StepBackIndicator(n);
        $("#tab2").show("slow");
    });
    $("#next3").click(function () {
        var n = 2;
        $("#tab3").hide("slow");
        StepIndicator(n);
        $("#tab4").show("slow");
        document.getElementsByClassName("step")[n].className += " finish";
    });
    $("#prev3").click(function () {
        var n = 2;
        $("#tab4").hide("slow");
        StepBackIndicator(n);
        $("#tab3").show("slow");
    });
    $("#next4").click(function () {
        var n = 3;
        $("#tab4").hide("slow");
        StepIndicator(n);
        $("#tab5").show("slow");
        document.getElementsByClassName("step")[n].className += " finish";
    });
    $("#prev4").click(function () {
        var n = 3;
        $("#tab5").hide("slow");
        StepBackIndicator(n);
        $("#tab4").show("slow");
    });
    $("#next4").click(function () {
        var n = 4;
        StepIndicator(n);
        document.getElementsByClassName("step")[n].className += " finish";
    });
});
function StepIndicator(n) {
    x = document.getElementsByClassName("step");
    n = n + 1;
    x[n].className += " active";
}
function StepBackIndicator(n) {
    x = document.getElementsByClassName("step");
    x[n].className = x[n].className.replace(" finish", "");
    n = n + 1;
    x[n].className = x[n].className.replace("active", "");
}
    </script>