$(document).ready(function() {
    $("#contact-submit").click(function() {
        if (validateContact()) {
            var n = 0;
            $("#contact1").hide("fast");
            $("#contact2").show("fast");
            var x = $("#contact2").position();
            window.scrollTo(x.left, x.top);
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
        if (afd1 != "" && afd2 != "" && afd3 != "" && afd4 != "" && spaceresult1 == false && spaceresult2 == false &&
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