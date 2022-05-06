function validateForm(){
    document.getElementById("validatename").textContent = "";
    document.getElementById("validateemail").textContent = "";
    document.getElementById("validatesubject").textContent = "";
    document.getElementById("validatemessage").textContent = "";

    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var subject = document.getElementById("subject").value;
    var message = document.getElementById("message").value;

    var flag = true;

    if(name == "")
    {
        document.getElementById("validatename").textContent = "Please Enter Name";
        document.getElementById("name").style.border = "1px solid red";
        flag = false;
    }
    if(email == "")
    {
        document.getElementById("validateemail").textContent = "Please Enter Email";
        document.getElementById("email").style.border = "1px solid red";
        flag = false;
    }
    if(!(validateEmail(email)))
    {
        document.getElementById("validateemail").textContent = "Please Enter Valid Email";
        document.getElementById("email").style.border = "1px solid red";
        flag = false;
    }
    if(subject == "")
    {
        document.getElementById("validatesubject").textContent = "Please Enter Subject";
        document.getElementById("subject").style.border = "1px solid red";
        flag = false;
    }
    if(message == "")
    {
        document.getElementById("validatemessage").textContent = "Please Enter Message";
        document.getElementById("message").style.border = "1px solid red";
        flag = false;
    }

    return flag;
}

function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function clearnamevalidation(){
    document.getElementById("validatename").textContent = "";
    document.getElementById("name").style.border = "1px solid green";
}
function clearemailvalidation(){
    document.getElementById("validateemail").textContent = "";
    document.getElementById("email").style.border = "1px solid green";
}
function clearsubjectvalidation(){
    document.getElementById("validatesubject").textContent = "";
    document.getElementById("subject").style.border = "1px solid green";
}
function clearmessagevalidation(){
    document.getElementById("validatemessage").textContent = "";
    document.getElementById("message").style.border = "1px solid green";
}