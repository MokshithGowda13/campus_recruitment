function validateForm(){
    document.getElementById("validatename").textContent = "";
    document.getElementById("validateaddress").textContent = "";
    document.getElementById("validateemail").textContent = "";
    document.getElementById("validatecontactno").textContent = "";
    document.getElementById("validateusername").textContent = "";
    document.getElementById("validatepassword").textContent = "";

    var name = document.getElementById("name").value;
    var address = document.getElementById("address").value;
    var email = document.getElementById("email").value;
    var contactno = document.getElementById("contactno").value;
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    var flag = true;

    if(name == "")
    {
        document.getElementById("validatename").textContent = "Please Enter Name";
        document.getElementById("name").style.border = "1px solid red";
        flag = false;
    }
    if(address == "")
    {
        document.getElementById("validateaddress").textContent = "Please Enter Address";
        document.getElementById("address").style.border = "1px solid red";
        flag = false;
    }
    if(email == "")
    {
        document.getElementById("validateemail").textContent = "Please Enter Email";
        document.getElementById("email").style.border = "1px solid red";
        flag = false;
    }
    else if(!(validateEmail(email)))
    {
        document.getElementById("validateemail").textContent = "Please Enter Valid Email";
        document.getElementById("email").style.border = "1px solid red";
        flag = false;
    }
    if(contactno == "")
    {
        document.getElementById("validatecontactno").textContent = "Please Enter Contact Number";
        document.getElementById("contactno").style.border = "1px solid red";
        flag = false;
    }
    else if (!(contactno.match(/^\d{10}$/))) {
        document.getElementById("validatecontactno").textContent = "Please Enter Valid Contact Number";
        document.getElementById("contactno").style.border = "1px solid red";
        flag = false;
    }
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

function clearnamevalidation(){
    document.getElementById("validatename").textContent = "";
    document.getElementById("name").style.border = "1px solid green";
}
function clearaddressvalidation(){
    document.getElementById("validateaddress").textContent = "";
    document.getElementById("address").style.border = "1px solid green";
}
function clearemailvalidation(){
    document.getElementById("validateemail").textContent = "";
    document.getElementById("email").style.border = "1px solid green";
}
function clearcontactnovalidation(){
    document.getElementById("validatecontactno").textContent = "";
    document.getElementById("contactno").style.border = "1px solid green";
}
function clearusernamevalidation(){
    document.getElementById("validateusername").textContent = "";
    document.getElementById("username").style.border = "1px solid green";
}
function clearpasswordvalidation(){
    document.getElementById("validatepassword").textContent = "";
    document.getElementById("password").style.border = "1px solid green";
}