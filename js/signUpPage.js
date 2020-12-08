var url = "./mainEmployer.php";

var data;


function redirectPage() {
    window.location = './loginEmployer.php';
}

async function checkAndSave() {

    var fName, lName, email, phoneNo, companyCode, password;

    fName = document.getElementById('fName').value;
    lName = document.getElementById('lName').value;
    email = document.getElementById('email').value;
    phoneNo = document.getElementById('number').value;
    companyCode = document.getElementById('companyCode').value;
    password = document.getElementById('password').value;

    var errors = [];  
    var empty = false; 

    
    if(fName == "" && lName == "" && email == "" && phoneNo == "" && companyCode == "" && password == "" ) {
        empty = true;
        document.getElementById("error").innerHTML = "* Please Enter Details"; 
        //console.log("empty");

    }
    
    if (phoneNo.length != 10) {
        errors.push("Invalid phone Number\n");

        
    }

    if (password.length < 5) {
        errors.push("Password must be more than of 5 character");

        
    }

    
    data = await getData();

    if(data != "") {
        for(var i = 0; i < data.length; ++i ) {
            if (data[i]['email'] == email) {
                errors = [];
                errors.push("Already Registered");
                

                document.getElementById('fName').value = "";
                document.getElementById('lName').value = "";
                document.getElementById('email').value = "";
                document.getElementById('number').value = "";
                document.getElementById('companyCode').value = "";
                document.getElementById('password').value = "";
                
                break;
            }
        }
    
    }
    if(errors.length > 0 && empty == false) {
        for (var i = 0; i < errors.length; ++i) {
        document.getElementById("error").textContent += "* " + errors[i]; 
        
    
        }
    }

    else if(empty == false){

        fetch(url,{ method: 'post',
            body: JSON.stringify({"id": Number((data[data.length - 1]['id']) + 1), "fName":fName,"lName":lName,"email":email,
            "phoneNo":phoneNo,"companyCode":companyCode,"password":password})
   
     })

        //window.location = "./newRegister.php";
     
    }

    // fetch(url,{ method: 'put',
    // body: JSON.stringify({"id":, "fName":"BadCaptain","lName":lName,"email":email,
    // "phoneNo":phoneNo,"companyCode":companyCode,"password":password})

    //})

}





async function getData() {

    var res = await fetch(url)
    
    var dat  = await res.json()
    
    return dat;
}



