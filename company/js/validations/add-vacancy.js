function validateForm(){
    document.getElementById("validatecategory").textContent = "";
    document.getElementById("validatepost").textContent = "";
    document.getElementById("validatedescription").textContent = "";
    document.getElementById("validatelocation").textContent = "";
    document.getElementById("validatesalary").textContent = "";
    document.getElementById("validatelastdate").textContent = "";

    var category = document.getElementById("category").value;
    var post = document.getElementById("post").value;
    var description = document.getElementById("description").value;
    var location = document.getElementById("location").value;
    var salary = document.getElementById("salary").value;
    var lastdate = document.getElementById("lastdate").value;

    var flag = true;

    if(category == "Null")
    {
        document.getElementById("validatecategory").textContent = "Please Select Category";
        document.getElementById("category").style.border = "1px solid red";
        flag = false;
    }
    if(post == "")
    {
        document.getElementById("validatepost").textContent = "Please Enter Post";
        document.getElementById("post").style.border = "1px solid red";
        flag = false;
    }
    if(description == "")
    {
        document.getElementById("validatedescription").textContent = "Please Enter Description";
        document.getElementById("description").style.border = "1px solid red";
        flag = false;
    }
    if(location == "")
    {
        document.getElementById("validatelocation").textContent = "Please Enter Location";
        document.getElementById("location").style.border = "1px solid red";
        flag = false;
    }
    if(salary == "")
    {
        document.getElementById("validatesalary").textContent = "Please Enter Salary";
        document.getElementById("salary").style.border = "1px solid red";
        flag = false;
    }
    if(lastdate == "")
    {
        document.getElementById("validatelastdate").textContent = "Please Select Last Date";
        document.getElementById("lastdate").style.border = "1px solid red";
        flag = false;
    }

    return flag;
}

function clearcategoryvalidation(){
    document.getElementById("validatecategory").textContent = "";
    document.getElementById("category").style.border = "1px solid green";
}
function clearpostvalidation(){
    document.getElementById("validatepost").textContent = "";
    document.getElementById("post").style.border = "1px solid green";
}
function cleardescriptionvalidation(){
    document.getElementById("validatedescription").textContent = "";
    document.getElementById("description").style.border = "1px solid green";
}
function clearlocationvalidation(){
    document.getElementById("validatelocation").textContent = "";
    document.getElementById("location").style.border = "1px solid green";
}
function clearsalaryvalidation(){
    document.getElementById("validatesalary").textContent = "";
    document.getElementById("salary").style.border = "1px solid green";
}
function clearlastdatevalidation(){
    document.getElementById("validatelastdate").textContent = "";
    document.getElementById("lastdate").style.border = "1px solid green";
}

var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1;
var yyyy = today.getFullYear();
if (dd < 10) {
    dd = '0' + dd;
}
if (mm < 10) {
    mm = '0' + mm;
}
dateofjoiningmax = yyyy + '-' + mm + '-' + dd;
document.getElementById("lastdate").setAttribute("min", dateofjoiningmax);