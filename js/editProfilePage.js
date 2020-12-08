var url = "./mainEmployer.php";

var data;
var user;



if (sessionStorage.getItem('id')) {
loadData();
}
else {
    console.log("not found");
}

function checkAndSave() {

    var fName, lName, email, phoneNo, companyCode, password, id;

    id = user['id'];
    fName = document.getElementById('fName').value;
    lName = document.getElementById('lName').value;
    email = document.getElementById('email').value;
    phoneNo = document.getElementById('number').value;
    companyCode = document.getElementById('companyCode').value;
    password = user['password'];
    

    var errors = [];  
    var empty = false; 

    
    if(fName == "" && lName == "" && email == "" && phoneNo == "" && companyCode == "" ) {
        empty = true;
        document.getElementById("error").innerHTML = "* Please Enter Details"; 
        //console.log("empty");

    }
    
    if (phoneNo.length != 10) {
        errors.push("Invalid phone Number");

        
    }


   
    
    if(errors.length > 0 && empty == false) {
        for (var i = 0; i < errors.length; ++i) {
        document.getElementById("error").innerHTML += "* " + errors[i] + "<br>"; 
        

        }
    }


    else if(empty == false) {


        fetch(url,{ method: 'put',
        body: JSON.stringify({"id": id, "fName":fName,"lName":lName,"email":email,
        "phoneNo":phoneNo,"companyCode":companyCode,"password":password})

        })

        
    // redirect after saving...
       //setTimeout(redirectPage(), 5000);

    }

}



async function getData() {

    var res = await fetch(url)
    var dat  = await res.json()
    
    return dat;
}



async function loadData() {

    data = await getData();

    var id = sessionStorage.getItem("id");

    for(var i = 0; i < data.length; ++i) {
        if(data[i]['id'] == id) {
            user = data[i];
            break;
        }
    }

    if(user) {
        document.getElementById('fName').value = user['first_name'];
        document.getElementById('lName').value =  user['last_name'];
        document.getElementById('email').value = user['email'];
        document.getElementById('number').value = user['phone_number'];
        document.getElementById('companyCode').value = user['company_code'];
    }
    
}

function redirectPage() {
    window.location = 'login.php';
}


function deleteProfile() {
    fetch(url, {
        method: 'delete',
        body: JSON.stringify(user),
    })
    sessionStorage.removeItem('id');

    //window.location.assign('signUp.php');
}