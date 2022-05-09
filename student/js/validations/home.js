function validateForm(){
    document.getElementById("validatepost").textContent = "";
    document.getElementById("validatecategory").textContent = "";
    document.getElementById("validatelocation").textContent = "";

    var post = document.getElementById("post").value;
    var category = document.getElementById("category").value;
    var location = document.getElementById("location").value;

    var flag = true;

    if(post == "Null")
    {
        document.getElementById("validatepost").textContent = "Please Select Post";
        document.getElementById("post").style.border = "1px solid red";
        flag = false;
    }
    if(category == "Null")
    {
        document.getElementById("validatecategory").textContent = "Please Select Category";
        document.getElementById("category").style.border = "1px solid red";
        flag = false;
    }
    if(location == "Null")
    {
        document.getElementById("validatelocation").textContent = "Please Select Location";
        document.getElementById("location").style.border = "1px solid red";
        flag = false;
    }

    return flag;
}

function clearpostvalidation(){
    document.getElementById("validatepost").textContent = "";
    document.getElementById("post").style.border = "1px solid green";
}
function clearcategoryvalidation(){
    document.getElementById("validatecategory").textContent = "";
    document.getElementById("category").style.border = "1px solid green";
}
function clearlocationvalidation(){
    document.getElementById("validatelocation").textContent = "";
    document.getElementById("location").style.border = "1px solid green";
}