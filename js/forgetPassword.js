var url = "./mainEmployee.php";

var data;
var user;
//loadData();

async function checkAndSave() {

    var fName, lName, email, companyCode;

    
    email = document.getElementById('email').value;
    fName = document.getElementById('fName').value;
    lName = document.getElementById('lName').value;
    companyCode = document.getElementById('companyCode').value;
    newPass = document.getElementById('newPassword').value;
    rePass = document.getElementById('RePass').value;

    var errors = [];  
    var empty = false; 

    
    if(fName == "" && lName == "" && email == "" && companyCode == "" && newPass == "" && rePass == "") {
        empty = true;
        document.getElementById("error").innerHTML = "* Please Enter Details"; 

    }

    if(newPass != rePass)   {
        errors.push("Passwords does not match");
    }

    // if (newPass.length < 5 && newPass < 5) {
    //     errors.push("Password must be more than of 5 character");
    // }
  

    // if(newPass == rePass == password){
    //     errors.push("New password can't be same as old one.");
    // }

    data = await getData();


    if(errors.length > 0 && empty == false) {
        for (var i = 0; i < errors.length; ++i) {
        document.getElementById("error").textContent += "* " + errors[i]; 
        
    
        }
    }

   

    else if(empty == false){
        for(var i = 0; i < data.length; ++i) {

            if (data[i]['email'] == email && data[i]['fName'] == fName
             && data[i]['lName'] == lName && data[i]['companyCode'] == companyCode)
            {
                var user = data[i];
                console.log(user['id']);
                var id = user['id'];
                var phoneNo = user['phoneNo'];
                correctInfo = true;

                fetch(url,{ method: 'put',
                body: JSON.stringify({"id": id, "fName":fName,"lName":lName,"email":email,
                "phoneNo":phoneNo,"companyCode":companyCode,"password":newPass})
        
            })
                break;

            }

        }
    
    }
    else if(empty = false) {
        document.getElementById('error').innerText = "Wrong Information.";
    }

}

async function getData() {

    var res = await fetch(url)
    var dat  = await res.json()
    
    return dat;
}



