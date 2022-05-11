function validateForm(){
    document.getElementById("validateto").textContent = "";
    document.getElementById("validatesubject").textContent = "";
    document.getElementById("validatemessage").textContent = "";

    var to = document.getElementById("to").value;
    var subject = document.getElementById("subject").value;
    var message = document.getElementById("message").value;

    var flag = true;

    if(to == "Null")
    {
        document.getElementById("validateto").textContent = "Please Select Company";
        document.getElementById("to").style.border = "1px solid red";
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

function cleartovalidation(){
    document.getElementById("validateto").textContent = "";
    document.getElementById("to").style.border = "1px solid green";
}
function clearsubjectvalidation(){
    document.getElementById("validatesubject").textContent = "";
    document.getElementById("subject").style.border = "1px solid green";
}
function clearmessagevalidation(){
    document.getElementById("validatemessage").textContent = "";
    document.getElementById("message").style.border = "1px solid green";
}