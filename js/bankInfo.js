
var url = "./mainBankInfo.php";

var data;
var registered = false;
var AC, transitNo, instNo;
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
                var user_bank = data[i];
                //console.log("registered");
                //id | account_number | transit_number | institute_number | employee_id
                document.getElementById('AC').value = user_bank['account_number'];
                document.getElementById('institution_number').value = user_bank['institute_number'];
                document.getElementById('transit_number').value = user_bank['transit_number'];

                registered = true;
                break;
            }
        }
    }   

}

check();
async function checkAndSave() {


    var AC = document.getElementById('AC').value;
    var instNo = document.getElementById('institution_number').value;
    var transitNo = document.getElementById('transit_number').value;

    var empty = false;
    
    if (AC == "" || instNo == "" || transitNo == "") {
        empty = true;
        console.log("empty");
        document.getElementById('error').textContent = "Please insert all fields";

    }

    // sending data
    else if (registered == true) {
        document.getElementById('error').textContent = 'Changes Saved Successfully';
        //console.log("registered");
        fetch(url, {
            method : "put",
            body: JSON.stringify({"id":(data.length), "account_number":AC, 
            "transit_number":transitNo, "institute_number":instNo, "employee_id": id})

        }),
        location = self.location;
    }

    else {
        if(data){
            var len = data.length;
        }
        else {
            len = 1
        }
       
        document.getElementById('error').textContent = "Saved Successfully";
        fetch(url, {
            method : "post",
            body: JSON.stringify({"id":(len + 1), "account_number":AC, 
            "transit_number":transitNo, "institute_number":instNo, "employee_id": id})
        }),

        location = self.location;
    }



}

function deleteBank() {
    var AC = document.getElementById('AC').value;
    var instNo = document.getElementById('institution_number').value;
    var transitNo = document.getElementById('transit_number').value;


    if(registered) {
    fetch(url, {
        method : "delete",
        body: JSON.stringify({"id":(id), "account_number":AC, 
            "transit_number":transitNo, "institute_number":instNo, "employee_id": id})

    }),

    //console.log("del")
    location = self.location;
}   

    else {
        document.getElementById('error').textContent = "You don't have saved bank detail";
    }

}