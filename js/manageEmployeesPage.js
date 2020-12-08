var url = "./mainEmployee.php";

var data;
var user;



async function add_Employee() {

    var fName, lName, email, phoneNo, companyCode,password;

    fName = document.getElementById('fName').value;
    lName = document.getElementById('lName').value;
    email = document.getElementById('email').value;
    phoneNo = document.getElementById('number').value;
    companyCode = document.getElementById('companyCode').value;
    password = document.getElementById('password').value;

    data = await getData();
    var errors = [];  
    var empty = false; 
    var added = false;

    
    if(fName == "" || lName == '' ||  email == "" || phoneNo == "" || companyCode == "" ) {
        empty = true;
        document.getElementById("error").innerHTML = "* Please Enter Details"; 
        //console.log("empty");

    }
    
    if (phoneNo.length != 10) {
        errors.push("Invalid phone Number");
     
    }


    if(errors.length > 0 && empty == false) {
        for (var i = 0; i < errors.length; ++i) {
        document.getElementById("error").textContent += "* " + errors[i] + "<br>"; 
        

        }
    }

    if(data != "") {
        for(var i = 0; i < data.length; ++i ) {
            if (data[i]['email'] == email) {
                added = true;
                document.getElementById("error").textContent = "Employee already added.";
            }
        }
    }   

    if(empty == false && added == false) {

       
        fetch(url,{ method: 'post',
              body: JSON.stringify({"id":(data[data.length - 1]['id'] + 1),"fName":fName,"lName":lName,"email":email,
              "phoneNo":phoneNo,"companyCode":companyCode,"password":password})
        
            }),

            document.getElementById('error').textContent = 'Employee Added Successfully';
           


    }

}

async function getData() {

    var res = await fetch(url)
    var dat  = await res.json()
    
    return dat;
}




async function delete_Employee() {
    var eml
    eml = document.getElementById('email').value;

    data = await getData();
    for (var i = 0; i <data.length; ++i) {
        if (data[i]['email'] == eml) {
            user = data[i];
            break;
        }
    }
    fetch(url, {
        method: 'delete',
        body: JSON.stringify(user),
    }),


    document.getElementById('error').textContent = 'Employee Deleted Successfully';

}





