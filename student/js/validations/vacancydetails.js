function validateForm(){
    document.getElementById("validatename").textContent = "";
    document.getElementById("validateemail").textContent = "";
    document.getElementById("validatemessage").textContent = "";
    document.getElementById("validateresume").textContent = "";

    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var message = document.getElementById("message").value;
    var resume = document.getElementById("resume");

    var flag = true;

    if(name == "")
    {
        document.getElementById("validatename").textContent = "Please Enter Name";
        document.getElementById("name").style.border = "1px solid red";
        flag = false;
    }
    if(email == "")
    {
        document.getElementById("validateemail").textContent = "Please Enter EMail";
        document.getElementById("email").style.border = "1px solid red";
        flag = false;
    }
    if(!(validateEmail(email)))
    {
        document.getElementById("validateemail").textContent = "Please Enter Valid Email";
        document.getElementById("email").style.border = "1px solid red";
        flag = false;
    }
    if(message == "")
    {
        document.getElementById("validatemessage").textContent = "Please Enter Message";
        document.getElementById("message").style.border = "1px solid red";
        flag = false;
    }
    if (resume.files.length == 0) {
        document.getElementById("validateresume").textContent = "Please Upload Resume.";
        document.getElementById("resume").style.border = "1px solid red";
        flag = false;
    }
    else if (!(validatefile())) {
        document.getElementById("validateresume").textContent = "Sorry file is invalid.";
        document.getElementById("resume").style.border = "1px solid red";
        flag = false;
    }
    else if (resume.size > 20971520) {
        document.getElementById("validateresume").textContent = "Resume size must be less than 20 MB";
        document.getElementById("resume").style.border = "1px solid red";
        flag = false;
    }

    return flag;
}

function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function validatefile() {
    var file = document.getElementById("resume");
    if (/\.(pdf)$/i.test(file.files[0].name) === false) {
        return false;
    } else {
        return true;
    }
}

function clearnamevalidation(){
    document.getElementById("validatename").textContent = "";
    document.getElementById("name").style.border = "1px solid green";
}
function clearemailvalidation(){
    document.getElementById("validateemail").textContent = "";
    document.getElementById("email").style.border = "1px solid green";
}
function clearmessagevalidation(){
    document.getElementById("validatemessage").textContent = "";
    document.getElementById("message").style.border = "1px solid green";
}
function clearresumevalidation(){
    document.getElementById("validateresume").textContent = "";
    document.getElementById("resume").style.border = "1px solid green";
}