var url = "./mainTaxDetails.php";

var data;
var registered = false;
var employeeAddress, sinNumber, salaryGenerated;
var id = sessionStorage.getItem("id");

async function getData() {
    var res = await fetch(url);
    var data = (await res).json()

    return data;
}

async function check() {
  

  
  data = await getData();

    if(data != null){
        for (var i = 0; i< data.length; ++i) {
            if(id == data[i]['employee_id'])  {
                var user_tax = data[i];
                //console.log("registered");
                //id | account_number | transit_number | institute_number | employee_id
                document.getElementById('employeeAddress').value = user_tax['employee_address'];
                document.getElementById('sinNumber').value = user_tax['sin_number'];
                document.getElementById('salaryGenerated').value = user_tax['salary_generated'];
                document.getElementById('emp').textContent= id;
                registered = true;
                break;
            }
        }
    }   

}

check();
async function checkAndSave() {


    var employeeAddress = document.getElementById('employeeAddress').value;
    var sinNumber = document.getElementById('sinNumber').value;
    var salaryGenerated = document.getElementById('salaryGenerated').value;

    var empty = false;
    
    if (employeeAddress == "" || sinNumber == "" || salaryGenerated == "") {
        empty = true;
        console.log("empty");
        document.getElementById('error').textContent = "Please insert all fields";

    }

    if (sinNumber.length != 9) {
        document.getElementById('error').textContent = "Invalid Sin Number";
  
    }

    // sending data
    else if (registered == true) {
       
        fetch(url, {
            method : "put",
            body: JSON.stringify({"tax_Id":(data.length), "employee_address":employeeAddress, 
            "sin_number":sinNumber, "salary_generated":salaryGenerated, "employee_id": id})
        }),
        
        

        document.getElementById('error').textContent = 'Changes Saved Successfully';
       location = self.location;
    }

    else {
        if(data){
            var len = data.length;
        }
        else {
            len = 1
        }
       
        fetch(url, {
            method : "post",
            body: JSON.stringify({"tax_Id":(len), "employee_address":employeeAddress, 
            "sin_number":sinNumber, "salary_generated":salaryGenerated, "employee_id": id})
        }),
        document.getElementById('error').textContent = "Details saved Successfully";

        location = self.location;
    }

}

function delete_taxDetails() {
    var employeeAddress = document.getElementById('employeeAddress').value;
    var sinNumber = document.getElementById('sinNumber').value;
    var salaryGenerated = document.getElementById('salaryGenerated').value;


    if(registered) {
    fetch(url, {
        method : "delete",
        body: JSON.stringify({"tax_Id":(data.length), "employee_address":employeeAddress, 
            "sin_number":sinNumber, "salary_generated":salaryGenerated, "employee_id": id})

    }), 
    document.getElementById('error').textContent = "Details deleted Successfully";

    //console.log("del")
    location = self.location;
}   

    else {
        document.getElementById('error').textContent = "You don't have saved tax details";
    }

}

