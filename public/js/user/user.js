
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

function processSession(process){
    if(process=="ihome"){   
        // sessionStorage.removeItem("process");
        sessionStorage.setItem("process", "ihome");
        window.location = "/ihome";  
    }
    if(process=="jhome"){   
        sessionStorage.removeItem("process");
        sessionStorage.setItem("process", "jhome");
        window.location = "/jhome";  
    }
    if(process=="certification"){   
        sessionStorage.removeItem("process");
        sessionStorage.setItem("process", "certtification");
        window.location = "/certification";  
    }
    if(process=="projects"){   
        sessionStorage.removeItem("process");
        sessionStorage.setItem("process", "projects");
        window.location = "/projects";  
    }
}