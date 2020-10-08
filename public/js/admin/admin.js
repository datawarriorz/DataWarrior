function openNav() {
    document.getElementById("mysidenav-wrapper").style.width = "20%";
    document.getElementById("myopen-icon").style.display = "none";
    document.getElementById("myclose-icon").style.display = "inline-block";
}

function closeNav() {
    document.getElementById("mysidenav-wrapper").style.width = "0%";
    document.getElementById("mycontent-wrapper").style.width = "100%";
    document.getElementById("myopen-icon").style.display = "inline-block";
    document.getElementById("myclose-icon").style.display = "none";
}

function mopenNav() {
    document.getElementById("m-mysidenav-wrapper").style.width = "50%";
    document.getElementById("m-myopen-icon").style.display = "none";
    document.getElementById("m-myclose-icon").style.display = "inline-block";
}

function mcloseNav() {
    document.getElementById("m-mysidenav-wrapper").style.width = "0%";
    document.getElementById("m-myopen-icon").style.display = "inline-block";
    document.getElementById("m-myclose-icon").style.display = "none";
}

document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
};
