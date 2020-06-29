// var currentTab = 0; // Current tab is set to be the first tab (0)
// showTab(currentTab); // Display the current tab

// function showTab(n) {
//     // This function will display the specified tab of the form ...
//     var x = document.getElementsByClassName("tab");
//     x[n].style.display = "block";
//     // ... and fix the Previous/Next buttons:
//     if (n == 0) {
//         document.getElementById("prevBtn").style.display = "none";
//     } else {
//         document.getElementById("prevBtn").style.display = "inline";
//     }
//     if (n == (x.length - 1)) {
//         document.getElementById("nextBtn").innerHTML = "Submit";
//     } else {
//         document.getElementById("nextBtn").innerHTML = "Next";
//     }
//     // ... and run a function that displays the correct step indicator:
//     fixStepIndicator(n)
// }

// function nextPrev(n) {
//     // This function will figure out which tab to display
//     var x = document.getElementsByClassName("tab");
//     // Exit the function if any field in the current tab is invalid:
//     if (n == 1 && !validateForm()) return false;
//     // Hide the current tab:
//     x[currentTab].style.display = "none";
//     // Increase or decrease the current tab by 1:
//     currentTab = currentTab + n;
//     // if you have reached the end of the form... :
//     if (currentTab >= x.length) {
//         //...the form gets submitted:
//         document.getElementById("regForm").submit();
//         return false;
//     }
//     // Otherwise, display the correct tab:
//     showTab(currentTab);
// }

// function validateForm() {
//     // This function deals with validation of the form fields
//     var x, y, i, valid = true;
//     x = document.getElementsByClassName("tab");
//     y = x[currentTab].getElementsByTagName("input");
//     // A loop that checks every input field in the current tab:
//     for (i = 0; i < y.length; i++) {
//         // If a field is empty...
//         if (y[i].value == "") {
//             // add an "invalid" class to the field:
//             y[i].className += " invalid";
//             // and set the current valid status to false:
//             valid = false;
//         }
//     }
//     // If the valid status is true, mark the step as finished and valid:
//     if (valid) {
//         document.getElementsByClassName("step")[currentTab].className += " finish";
//     }
//     return valid; // return the valid status
// }

// function fixStepIndicator(n) {
//     // This function removes the "active" class of all steps...
//     var i, x = document.getElementsByClassName("step");
//     for (i = 0; i < x.length; i++) {
//         x[i].className = x[i].className.replace(" active", "");
//     }
//     //... and adds the "active" class to the current step:
//     x[n].className += " active";
// }


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