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
            $("#tab2-error").hide("fast");
            $("#tab2").hide("slow");
            StepBackIndicator(n);
            $("#tab1").show("slow");
            window.scrollTo(0, 0);
        });
        $("#next2").click(function() {

            if (ValidateTab2()) {
                var n = 1;
                $("#tab2").hide("slow");
                StepIndicator(n);
                $("#tab3").show("slow");
                document.getElementsByClassName("step")[n].className += " finish";
                window.scrollTo(0, 0);
            } else {
                $("#tab2-error").show("slow");
            }
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
        //tab2 data transfer to application form(tab6)
        var afd1 = document.querySelector('[name="preffereddomain1"]').value;
        document.getElementById("af1").innerHTML = afd1;
        var afd2 = document.querySelector('[name="preffereddomain2"]').value;
        document.getElementById("af2").innerHTML = afd2;
        var afd3 = document.querySelector('[name="preffereddomain3"]').value;
        document.getElementById("af3").innerHTML = afd3;
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
        } else {
            document.getElementById("af4").innerHTML = "20000-25000";
        }
        var afd5 = document.querySelector('[name="location"]').value;
        document.getElementById("af5").innerHTML = afd5;
        //tab2 data transfer over

        //tab3 data transfer to application form(tab6)
        //qualification drop down
        //var afd6 = document.querySelector('[name="qualificationtype"]').value;
        //document.getElementById("af1").innerHTML = afd1;
        // var stipendobj = document.getElementById("stipendid");
        // var afd4 = stipendobj.options[stipendobj.selectedIndex].value;
        // if (afd4 == 1) {
        //     document.getElementById("af4").innerHTML = "1-5000";
        // } else if (afd4 == 2) {
        //     document.getElementById("af4").innerHTML = "5000-10000";
        // } else if (afd4 == 3) {
        //     document.getElementById("af4").innerHTML = "10000-15000";
        // } else if (afd4 == 4) {
        //     document.getElementById("af4").innerHTML = "15000-20000";
        // } else {
        //     document.getElementById("af4").innerHTML = "20000-25000";
        // }
        var afd7 = document.querySelector('[name="course_name"]').value;
        document.getElementById("af7").innerHTML = afd7;
        var afd8 = document.querySelector('[name="college_name"]').value;
        document.getElementById("af8").innerHTML = afd8;
        var afd9 = document.querySelector('[name="university"]').value;
        document.getElementById("af9").innerHTML = afd9;
        var afd10 = document.querySelector('[name="percentage"]').value;
        document.getElementById("af10").innerHTML = afd10;
        var afd11 = document.querySelector('[name="grade"]').value;
        document.getElementById("af11").innerHTML = afd11;
        // transfer of date to table remaining
        // var afd12 = document.getElementsByName("start_date");
        // var afd13 = document.getElementsByName("end_date");
        //tab3 data transfer over

        //tab4 data transfer to application form(tab6)
        var afd14 = document.querySelector('[name="skill1"]').value;
        document.getElementById("af14").innerHTML = afd14;
        var afd15 = document.querySelector('[name="skill2"]').value;
        document.getElementById("af15").innerHTML = afd15;
        var afd16 = document.querySelector('[name="skill3"]').value;
        document.getElementById("af16").innerHTML = afd16;

        //tab4 data transfer over
        var afd17 = document.querySelector('[name="profile"]').value;
        document.getElementById("af17").innerHTML = afd17;
        var afd18 = document.querySelector('[name="organisation"]').value;
        document.getElementById("af18").innerHTML = afd18;
        var afd18 = document.querySelector('[name="organisation"]').value;
        document.getElementById("af18").innerHTML = afd18;
        var afd18 = document.querySelector('[name="organisation"]').value;
        document.getElementById("af18").innerHTML = afd18;
        var afd19 = document.getElementsByName("location");
        var afd20 = document.getElementsByName("startdate");
        var afd21 = document.getElementsByName("enddate");
        var afd22 = document.getElementsByName("currentjob");
        var afd23 = document.getElementsByName("description");
    }

    function ValidateTab2() {
        var afd1 = document.querySelector('[name="preffereddomain1"]').value;
        var afd2 = document.querySelector('[name="preffereddomain2"]').value;
        var afd3 = document.querySelector('[name="preffereddomain3"]').value;
        var afd5 = document.querySelector('[name="location"]').value;
        var txt = "";
        var spaceregex = /^[ ]+$/;
        var spaceresult1 = spaceregex.test(afd1);
        var spaceresult2 = spaceregex.test(afd2);
        var spaceresult3 = spaceregex.test(afd3);
        var spaceresult5 = spaceregex.test(afd5);
        if (afd1 != "" && afd2 != "" && afd3 != "" && afd5 != "" && spaceresult1 == false && spaceresult2 == false &&
            spaceresult3 == false && spaceresult5 == false) {
            var regex = /^[a-zA-Z0-9 +,]{2,30}$/;
            var result1 = regex.test(afd1);
            var result2 = regex.test(afd2);
            var result3 = regex.test(afd3);
            var result4 = regex.test(afd5);
            if (result1 == true && result2 == true && result3 == true && result4 == true) {
                //need to write border green red code later
                // x = document.getElementsByClassName("fc-tab2");
                // x.className = x.className += " form-success";
                return true;
            } else {
                txt = 'The input text length must be between 2 to 100 and in UpperCase or LowerCase';
                document.getElementById("tab2-label").innerHTML = txt;
                return false;
            }
        } else {
            txt = 'All values are required!';
            document.getElementById("tab2-label").innerHTML = txt;
            return false;
        }
    }

    function ValidateTab2() {
        var afd1 = document.querySelector('[name="preffereddomain1"]').value;
        var afd2 = document.querySelector('[name="preffereddomain2"]').value;
        var afd3 = document.querySelector('[name="preffereddomain3"]').value;
        var afd5 = document.querySelector('[name="location"]').value;
        var txt = "";
        var spaceregex = /^[ ]+$/;
        var spaceresult1 = spaceregex.test(afd1);
        var spaceresult2 = spaceregex.test(afd2);
        var spaceresult3 = spaceregex.test(afd3);
        var spaceresult5 = spaceregex.test(afd5);
        if (afd1 != "" && afd2 != "" && afd3 != "" && afd5 != "" && spaceresult1 == false && spaceresult2 == false &&
            spaceresult3 == false && spaceresult5 == false) {
            var regex = /^[a-zA-Z0-9 +,]{2,30}$/;
            var result1 = regex.test(afd1);
            var result2 = regex.test(afd2);
            var result3 = regex.test(afd3);
            var result4 = regex.test(afd5);
            if (result1 == true && result2 == true && result3 == true && result4 == true) {
                //need to write border green red code later
                // x = document.getElementsByClassName("fc-tab2");
                // x.className = x.className += " form-success";
                return true;
            } else {
                txt = 'The input text length must be between 2 to 100 and in UpperCase or LowerCase';
                document.getElementById("tab2-label").innerHTML = txt;
                return false;
            }
        } else {
            txt = 'All values are required!';
            document.getElementById("tab2-label").innerHTML = txt;
            return false;
        }
    }
</script>