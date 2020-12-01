var url = "./mainEmployee.php";

var data;


async function validate() {


    document.getElementById("error").innerHTML = '';
    var email, password;

    email = document.getElementById('email').value;
    password = document.getElementById('password').value;

    data = await getData();
    var errors = [];  
    var empty = false; 

   
    
    if(email == ""  && password == "" ) {
        empty = true;
        document.getElementById("error").innerHTML = "* Please Enter Details"; 
        //console.log("empty");

    }else{
        for(var i = 0; i < data.length; ++i ) {
            if (data[i]['email'] == email && data[i]['password'] == password) {
                errors = [];
                sessionStorage.setItem('id', data[i]['id']);
               
               console.log("Successful login");
               break;
            } else {
        }       errors.push("Wrong Information !");
                
    
        }

    }
    
   
    
    if(errors.length > 0 && empty == false) {
        for (var i = 0; i < errors.length; ++i) {
        document.getElementById("error").textContent += "* " + errors[i]; 
        
    
        }
    }
    else if (empty == false) {
        window.location = 'homepageEmployee.php';
    }

    // else if(empty == false){

    //     fetch(url,{ method: 'post',
    //         body: JSON.stringify({"id":Date.now(), "fName":fName,"lName":lName,"email":email,
    //         "phoneNo":phoneNo,"companyCode":companyCode,"password":password})
   
    

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



