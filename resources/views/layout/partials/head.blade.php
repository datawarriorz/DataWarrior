<title>Data Warriors</title>
<meta charset="utf-8" />
<link rel="icon" href="" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

<!-- bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script type="text/javascript" src="{{ asset('js/internship.js') }}"></script> -->
<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    $(document).ready(function() {
        $("#next1").click(function() {
            //if(validateTab1()){
            var n = 0;
            $("#tab1").hide("slow");
            StepIndicator(n);
            $("#tab2").show("slow");
            document.getElementsByClassName("step")[n].className += " finish";
            window.scrollTo(0, 0);
            //}
            //$("#tab1").animate({width:'toggle'},0);
            //$("#tab2").animate({width:'toggle'},1000);
        });
        $("#prev1").click(function() {
            var n = 0;
            $("#tab2").hide("slow");
            StepBackIndicator(n);
            $("#tab1").show("slow");
            window.scrollTo(0, 0);
        });
        $("#next2").click(function() {
            var n = 1;
            $("#tab2").hide("slow");
            StepIndicator(n);
            $("#tab3").show("slow");
            document.getElementsByClassName("step")[n].className += " finish";
            window.scrollTo(0, 0);
        });
        $("#prev2").click(function() {
            var n = 1;
            $("#tab3").hide("slow");
            StepBackIndicator(n);
            $("#tab2").show("slow");
            window.scrollTo(0, 0);
        });
        $("#next3").click(function() {
            var n = 2;
            $("#tab3").hide("slow");
            StepIndicator(n);
            $("#tab4").show("slow");
            document.getElementsByClassName("step")[n].className += " finish";
            window.scrollTo(0, 0);
        });
        $("#prev3").click(function() {
            var n = 2;
            $("#tab4").hide("slow");
            StepBackIndicator(n);
            $("#tab3").show("slow");
            window.scrollTo(0, 0);
        });
        $("#next4").click(function() {
            var n = 3;
            $("#tab4").hide("slow");
            StepIndicator(n);
            $("#tab5").show("slow");
            document.getElementsByClassName("step")[n].className += " finish";
            window.scrollTo(0, 0);
        });
        $("#prev4").click(function() {
            var n = 3;
            $("#tab5").hide("slow");
            StepBackIndicator(n);
            $("#tab4").show("slow");
            window.scrollTo(0, 0);
        });
        $("#next5").click(function() {
            AppForm();
            var n = 4;
            $("#tab5").hide("slow");
            StepIndicator(n);
            $("#tab6").show("slow");
            document.getElementsByClassName("step")[n].className += " finish";
            window.scrollTo(0, 0);
        });
        $("#prev5").click(function() {
            var n = 4;
            $("#tab6").hide("slow");
            StepBackIndicator(n);
            $("#tab5").show("slow");
            window.scrollTo(0, 0);
        });
        // $("#next6").click(function() {
        //     var n = 5;
        //     StepIndicator(n);
        //     document.getElementsByClassName("step")[n].className += " finish";
        // });
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

    function AppForm() {

        var afd1 = document.querySelector('[name="preffereddomain1"]').value;
        document.getElementById("af1").innerHTML = afd1;
        var afd2 = document.querySelector('[name="preffereddomain2"]').value;
        document.getElementById("af2").innerHTML = afd2;
        var afd3 = document.querySelector('[name="preffereddomain3"]').value;
        document.getElementById("af3").innerHTML = afd3;
        // var stipendobj = document.querySelector('[name="stipend"]').value;
        var stipendobj = document.getElementById("stipendid");
        var afd4 = stipendobj.options[stipendobj.selectedIndex].value;
        if (afd4 == 1) {
            document.getElementById("af4").innerHTML = "1-5000";
        } else if (afd4 == 2) {
            document.getElementById("af4").innerHTML = "5000-10000";
        } else if (afd4 == 3) {
            document.getElementById("af4").innerHTML = "10000-15000";
        } else if (afd4 == 4) {
            document.getElementById("af4").innerHTML = "15000-20000";
        } else(afd4 == 5) {
            document.getElementById("af4").innerHTML = "20000-25000";
        }

        var afd5 = document.querySelector('[name="location"]').value;
        document.getElementById("af5").innerHTML = afd5;

        var afd5 = document.getElementsByName("location");
        var afd6 = document.getElementsByName("qualificationtype");
        var afd7 = document.getElementsByName("course_name");
        var afd8 = document.getElementsByName("college_name");
        var afd9 = document.getElementsByName("university");
        var afd10 = document.getElementsByName("percentage");
        var afd11 = document.getElementsByName("grade");
        var afd12 = document.getElementsByName("start_date");
        var afd13 = document.getElementsByName("end_date");
        var afd14 = document.getElementsByName("skill1");
        var afd15 = document.getElementsByName("skill2");
        var afd16 = document.getElementsByName("skill3");
        var afd17 = document.getElementsByName("profile");
        var afd18 = document.getElementsByName("organisation");
        var afd19 = document.getElementsByName("location");
        var afd20 = document.getElementsByName("startdate");
        var afd21 = document.getElementsByName("enddate");
        var afd22 = document.getElementsByName("currentjob");
        var afd23 = document.getElementsByName("description");
    }
</script>