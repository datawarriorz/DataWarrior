
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

function ihomeSession(process){
    if(process=="ihome"){   
    // sessionStorage.removeItem("process");
    sessionStorage.setItem("process", "ihome");
    
    window.location = "/ihome";  
    }
}