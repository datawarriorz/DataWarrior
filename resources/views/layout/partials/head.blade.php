<title>Data Warriors</title>
<meta charset="utf-8" />
<link rel="icon" href="./images/justlogo2.png" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

<link rel="stylesheet" href="{{ asset('css/main/master.css') }}" />
<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
<!-- bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- <script type="text/javascript" src="{{ asset('js/internship.js') }}"></script> -->
<script>
    // (function() {
    //     'use strict';
    //     window.addEventListener('load', function() {
    //         // Fetch all the forms we want to apply custom Bootstrap validation styles to
    //         var forms = document.getElementsByClassName('needs-validation');
    //         // Loop over them and prevent submission
    //         var validation = Array.prototype.filter.call(forms, function(form) {
    //             form.addEventListener('submit', function(event) {
    //                 if (form.checkValidity() === false) {
    //                     event.preventDefault();
    //                     event.stopPropagation();
    //                 }
    //                 form.classList.add('was-validated');
    //             }, false);
    //         });
    //     }, false);
    // })();
    $(document).ready(function () {
        $("#next1").click(function () {
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
        $("#prev1").click(function () {
            var n = 0;
            $("#tab2-error").hide("fast");
            $("#tab2").hide("slow");
            StepBackIndicator(n);
            $("#tab1").show("slow");
            window.scrollTo(0, 0);
        });
        $("#next2").click(function () {
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
        $("#prev2").click(function () {
            var n = 1;
            $("#tab2-error").hide("fast");
            $("#tab3").hide("slow");
            StepBackIndicator(n);
            $("#tab2").show("slow");
            window.scrollTo(0, 0);
        });
        $("#next3").click(function () {
            if (ValidateTab3()) {
                var n = 2;
                $("#tab3").hide("slow");
                StepIndicator(n);
                $("#tab4").show("slow");
                document.getElementsByClassName("step")[n].className += " finish";
                window.scrollTo(0, 0);
            } else {
                $("#tab3-error").show("slow");
            }
        });
        $("#prev3").click(function () {
            var n = 2;
            $("#tab2-error").hide("fast");
            $("#tab4").hide("slow");
            StepBackIndicator(n);
            $("#tab3").show("slow");
            window.scrollTo(0, 0);
        });
        $("#next4").click(function () {
            if (ValidateTab4()) {
                var n = 3;
                $("#tab4").hide("slow");
                StepIndicator(n);
                $("#tab5").show("slow");
                document.getElementsByClassName("step")[n].className += " finish";
                window.scrollTo(0, 0);
            } else {
                $("#tab4-error").show("slow");
            }
        });
        $("#prev4").click(function () {
            var n = 3;
            $("#tab2-error").hide("fast");
            $("#tab5").hide("slow");
            StepBackIndicator(n);
            $("#tab4").show("slow");
            window.scrollTo(0, 0);
        });
        $("#next5").click(function () {
            if (ValidateTab5()) {
                AppForm();
                var n = 4;
                $("#tab5").hide("slow");
                StepIndicator(n);
                $("#tab6").show("slow");
                document.getElementsByClassName("step")[n].className += " finish";
                window.scrollTo(0, 0);
            } else {
                $("#tab5-error").show("slow");
            }
        });
        $("#prev5").click(function () {
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
        $("#contact-submit").click(function () {
            if (validateContact()) {
                var n = 0;
                $("#contact1").hide("fast");
                $("#contact2").show("slow");
                var x = $("#contact2").position();
                alert("Your Query has been Submitted");

                // window.scrollTo(x.left, x.top);
                //}
                //$("#tab1").animate({width:'toggle'},0);
                //$("#tab2").animate({width:'toggle'},1000);
            }
        });

        function validateContact() {
            var afd1 = document.querySelector('[name="name"]').value;
            var afd2 = document.querySelector('[name="email"]').value;
            var afd3 = document.querySelector('[name="subject"]').value;
            var afd4 = document.querySelector('[name="description"]').value;
            var txt = "";
            var spaceregex = /^[ ]+$/;
            var spaceresult1 = spaceregex.test(afd1);
            var spaceresult2 = spaceregex.test(afd2);
            var spaceresult3 = spaceregex.test(afd3);
            var spaceresult4 = spaceregex.test(afd4);
            if (afd1 != "" && afd2 != "" && afd3 != "" && afd4 != "" && spaceresult1 == false && spaceresult2 ==
                false &&
                spaceresult3 == false && spaceresult4 == false) {
                var regex = /^[a-zA-Z0-9 .+,]{2,100}$/;
                var result1 = regex.test(afd1);
                var result2 = regex.test(afd2);
                var result3 = regex.test(afd3);
                var result4 = regex.test(afd4);
                if (result1 == true && result2 == true && result3 == true && result4 == true) {
                    // need to write border green red code and more nested if else later
                    // x = document.getElementsByClassName("fc-tab2");
                    // x.className = x.className += " form-success";
                    return true;
                } else {
                    // txt = 'The input text length must be between 2 to 100 and in UpperCase or LowerCase';
                    // document.getElementById("tab4-label").innerHTML = txt;
                    return false;
                }
            } else {
                // txt = 'All values are required!';
                // document.getElementById("tab4-label").innerHTML = txt;
                return false;
            }
        }
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

    function onCheckCounselling(checkbox) {
        // var dateElement1 = document.getElementById('jobstartdate');
        // dateElement1.disabled = checkbox.checked;
        var dateElement2 = document.getElementById('jobenddate');
        dateElement2.disabled = checkbox.checked;
        if (checkbox.checked) {
            //dateElement.value = new Date().toISOString().substr(0, 10);
            //dateElement1.valueAsDate = "";
            dateElement2.valueAsDate = "";
        } else
            //dateElement1.value = '';
            dateElement2.value = '';
    }

    function AppForm() {
        //tab2 data transfer to application form(tab6)
        var afd1 = document.querySelector('[name="preferreddomain1"]').value;
        document.getElementById("af1").innerHTML = afd1;
        var afd2 = document.querySelector('[name="preferreddomain2"]').value;
        document.getElementById("af2").innerHTML = afd2;
        var afd3 = document.querySelector('[name="preferreddomain3"]').value;
        document.getElementById("af3").innerHTML = afd3;
        var afd4 = document.querySelector('[name="salary"]').value;
        document.getElementById("af4").innerHTML = afd4;
        var afd5 = document.querySelector('[name="joblocation"]').value;
        document.getElementById("af5").innerHTML = afd5;
        //afdnew cause added later
        if (document.querySelector('[name="counselling"]').checked) {
            var afdnew1 = document.querySelector('[name="counselling"]').value;
            document.getElementById("afdnew1").innerHTML = afdnew1;
        } else {
            var afdnew1 = 'No';
            document.getElementById("afdnew1").innerHTML = afdnew1;
        }
        //tab2 data transfer over

        //tab3 data transfer to application form(tab6)
        var qualification_type_obj = document.getElementById("qualificationtype");
        var afd6 = qualification_type_obj.options[qualification_type_obj.selectedIndex].innerHTML;
        document.getElementById("af6").innerHTML = afd6;
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
        var afd12 = document.querySelector('[name="start_date"]').value;
        document.getElementById("af12").innerHTML = afd12;
        var afd13 = document.querySelector('[name="end_date"]').value;
        document.getElementById("af13").innerHTML = afd13;
        //tab3 data transfer over

        // //tab4 data transfer to application form(tab6)
        var afd14 = document.querySelector('[name="skill1"]').value;
        document.getElementById("af14").innerHTML = afd14;
        var afd15 = document.querySelector('[name="skill2"]').value;
        document.getElementById("af15").innerHTML = afd15;
        var afd16 = document.querySelector('[name="skill3"]').value;
        document.getElementById("af16").innerHTML = afd16;
        // //tab4 data transfer over

        // //tab5 data transfer to application form(tab6)
        var afd17 = document.querySelector('[name="profile"]').value;
        document.getElementById("af17").innerHTML = afd17;
        var afd18 = document.querySelector('[name="organisation"]').value;
        document.getElementById("af18").innerHTML = afd18;
        var afd19 = document.querySelector('[name="location"]').value;
        document.getElementById("af19").innerHTML = afd19;
        var afd20 = document.querySelector('[name="startdate"]').value;
        document.getElementById("af20").innerHTML = afd20;
        var afd21 = document.querySelector('[name="enddate"]').value;
        document.getElementById("af21").innerHTML = afd21;
        if (document.querySelector('[name="currentjob"]').checked) {
            var afdnew2 = document.querySelector('[name="currentjob"]').value;
            document.getElementById("afdnew2").innerHTML = afdnew2;
        } else {
            var afdnew2 = 'No';
            document.getElementById("afdnew2").innerHTML = afdnew2;
        }
        var afd22 = document.querySelector('[name="description"]').value;
        document.getElementById("af22").innerHTML = afd22;
        // //tab4 data transfer over
    }

    function ValidateTab2() {
        var afd1 = document.querySelector('[name="preferreddomain1"]').value;
        var afd2 = document.querySelector('[name="preferreddomain2"]').value;
        var afd3 = document.querySelector('[name="preferreddomain3"]').value;
        var afd4 = document.querySelector('[name="joblocation"]').value;
        var afd5 = document.querySelector('[name="salary"]').value;
        var txt = "";
        var spaceregex = /^[ ]+$/;
        var spaceresult1 = spaceregex.test(afd1);
        var spaceresult2 = spaceregex.test(afd2);
        var spaceresult3 = spaceregex.test(afd3);
        var spaceresult4 = spaceregex.test(afd4);
        var spaceresult5 = spaceregex.test(afd5);
        if (afd1 != "" && afd2 != "" && afd3 != "" && afd4 != "" && afd5 != "" &&
            spaceresult1 == false && spaceresult2 == false &&
            spaceresult3 == false && spaceresult4 == false && spaceresult5 == false) {
            var regex = /^[a-zA-Z0-9 +,]{2,30}$/;
            var stipend_regex = /^[0-9]{1,5}$/;
            var result1 = regex.test(afd1);
            var result2 = regex.test(afd2);
            var result3 = regex.test(afd3);
            var result4 = regex.test(afd4);
            var result5 = stipend_regex.test(afd5);
            if (result1 == true && result2 == true && result3 == true && result4 == true) {
                //need to write border green red code and more nested if else later
                // x = document.getElementsByClassName("fc-tab2");
                // x.className = x.className += " form-success";
                if (result5 == true) {
                    return true;
                } else {
                    txt = 'Only numbers allowed in stipend';
                    document.getElementById("tab2-label").innerHTML = txt;
                    return false;
                }
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

    function ValidateTab3() {
        var afd1 = document.querySelector('[name="course_name"]').value;
        var afd2 = document.querySelector('[name="college_name"]').value;
        var afd3 = document.querySelector('[name="university"]').value;
        var afd4 = document.querySelector('[name="percentage"]').value;
        var afd5 = document.querySelector('[name="grade"]').value;
        var txt = "";
        var spaceregex = /^[ ]+$/;
        var spaceresult1 = spaceregex.test(afd1);
        var spaceresult2 = spaceregex.test(afd2);
        var spaceresult3 = spaceregex.test(afd3);
        var spaceresult4 = spaceregex.test(afd4);
        var spaceresult5 = spaceregex.test(afd5);
        if (afd1 != "" && afd2 != "" && afd3 != "" && afd4 != "" && afd5 != "" && spaceresult1 == false &&
            spaceresult2 == false && spaceresult3 == false && spaceresult4 == false && spaceresult5 == false) {
            var regex = /^[a-zA-Z0-9 +,]{2,100}$/;
            var regex_percentage = /^[0-9.]{2,5}$/;
            var regex_grade = /^[a-zA-Z]$/;
            var result1 = regex.test(afd1);
            var result2 = regex.test(afd2);
            var result3 = regex.test(afd3);
            var result4 = regex_percentage.test(afd4);
            var result5 = regex_grade.test(afd5);
            if (result1 == true && result2 == true && result3 == true) {
                if (result4 == true) {
                    if (result5 == true) {
                        return true;
                    } else {
                        txt = 'Grade must be a Single Character. Eg."A"';
                        document.getElementById("tab3-label").innerHTML = txt;
                        return false;
                    }
                    //need to write border green red code and more nested if else later
                    // x = document.getElementsByClassName("fc-tab2");
                    // x.className = x.className += " form-success";

                } else {
                    txt = 'Only Numbers Allowed in Percentage';
                    document.getElementById("tab3-label").innerHTML = txt;
                    return false;
                }
            } else {
                txt = 'The input text length must be between 2 to 100 and in UpperCase or LowerCase';
                document.getElementById("tab3-label").innerHTML = txt;
                return false;
            }
        } else {
            txt = 'All values are required!';
            document.getElementById("tab3-label").innerHTML = txt;
            return false;
        }
    }

    function ValidateTab4() {
        var afd1 = document.querySelector('[name="skill1"]').value;
        var afd2 = document.querySelector('[name="skill2"]').value;
        var afd3 = document.querySelector('[name="skill3"]').value;
        var txt = "";
        var spaceregex = /^[ ]+$/;
        var spaceresult1 = spaceregex.test(afd1);
        var spaceresult2 = spaceregex.test(afd2);
        var spaceresult3 = spaceregex.test(afd3);
        if (afd1 != "" && afd2 != "" && afd3 != "" && spaceresult1 == false && spaceresult2 == false &&
            spaceresult3 == false) {
            var regex = /^[a-zA-Z0-9 .+,]{2,100}$/;
            var result1 = regex.test(afd1);
            var result2 = regex.test(afd2);
            var result3 = regex.test(afd3);
            if (result1 == true && result2 == true && result3 == true) {
                //need to write border green red code and more nested if else later
                // x = document.getElementsByClassName("fc-tab2");
                // x.className = x.className += " form-success";
                return true;
            } else {
                txt = 'The input text length must be between 2 to 100 and in UpperCase or LowerCase';
                document.getElementById("tab4-label").innerHTML = txt;
                return false;
            }
        } else {
            txt = 'All values are required!';
            document.getElementById("tab4-label").innerHTML = txt;
            return false;
        }
    }

    function ValidateTab5() {
        var afd1 = document.querySelector('[name="profile"]').value;
        var afd2 = document.querySelector('[name="organisation"]').value;
        var afd3 = document.querySelector('[name="location"]').value;
        var afd4 = document.querySelector('[name="description"]').value;
        var txt = "";
        var spaceregex = /^[ ]+$/;
        var spaceresult1 = spaceregex.test(afd1);
        var spaceresult2 = spaceregex.test(afd2);
        var spaceresult3 = spaceregex.test(afd3);
        var spaceresult4 = spaceregex.test(afd4);
        if (afd1 != "" && afd2 != "" && afd3 != "" && afd4 != "" && spaceresult1 == false && spaceresult2 ==
            false &&
            spaceresult3 == false && spaceresult4 == false) {
            var regex = /^[a-zA-Z0-9 +,]{2,100}$/;
            var result1 = regex.test(afd1);
            var result2 = regex.test(afd2);
            var result3 = regex.test(afd3);
            var result4 = regex.test(afd4);
            if (result1 == true && result2 == true && result3 == true && result4 == true) {
                //need to write border green red code and more nested if else later
                // x = document.getElementsByClassName("fc-tab2");
                // x.className = x.className += " form-success";
                return true;
            } else {
                txt = 'The input text length must be between 2 to 100 and in UpperCase or LowerCase';
                document.getElementById("tab5-label").innerHTML = txt;
                return false;
            }
        } else {
            txt = 'All values are required!';
            document.getElementById("tab5-label").innerHTML = txt;
            return false;
        }
    }

</script>