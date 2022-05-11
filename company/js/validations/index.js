function validateForm(){
    document.getElementById("validateusername").textContent = "";
    document.getElementById("validatepassword").textContent = "";

    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    var flag = true;

    if(username == "")
    {
        document.getElementById("validateusername").textContent = "Please Enter Username";
        document.getElementById("username").style.border = "1px solid red";
        flag = false;
    }
    if(password == "")
    {
        document.getElementById("validatepassword").textContent = "Please Enter Password";
        document.getElementById("password").style.border = "1px solid red";
        flag = false;
    }

    return flag;
}

function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function clearusernamevalidation(){
    document.getElementById("validateusername").textContent = "";
    document.getElementById("username").style.border = "1px solid green";
}
function clearpasswordvalidation(){
    document.getElementById("validatepassword").textContent = "";
    document.getElementById("password").style.border = "1px solid green";
}