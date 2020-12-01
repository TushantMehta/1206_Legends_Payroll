var url = "./mainEmployer.php";

var data;
var user;



if (sessionStorage.getItem('email')) {
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

    var eml = sessionStorage.getItem("email");

    for(var i = 0; i < data.length; ++i) {
        if(data[i]['email'] == eml) {
            user = data[i];
        }
    }

    document.getElementById('fName').value = user['fName'];
    document.getElementById('lName').value =  user['lName'];
    document.getElementById('email').value = user['email'];
    document.getElementById('number').value = user['phoneNo'];
    document.getElementById('companyCode').value = user['companyCode'];
}

function redirectPage() {
    window.location = 'login.php';
}


function deleteProfile() {
    fetch(url, {
        method: 'delete',
        body: JSON.stringify(user),
    })
    sessionStorage.removeItem('email');

    //window.location.assign('signUp.php');
}