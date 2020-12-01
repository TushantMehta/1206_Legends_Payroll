sessionStorage.setItem("id", 1);
var url = "./mainShiftsInfo.php";

var data;
var registered = false;
var date, hours;
var id = sessionStorage.getItem("id");

async function getData() {
    var res = await fetch(url);
    var data = (await res).json()

    return data;

    
}



async function check() {
    data = await getData();
    
document.getElementById('empID').textContent= id;
    
}

check();
async function saveInfo() {

    var date = document.getElementById('date').value;
    var hours = document.getElementById('hrs').value;
    
    //data = await getData();
    var empty = false;
    var added = false;
    
    if (date == "" || hours == "") {
        empty = true;
        document.getElementById('error').textContent = "Please insert all fields";

    }



    if(data != "") {
        for(var i = 0; i < data.length; ++i ) {
            if(data[i]['date'] == date || data[i]['hrs'] == hours) {
                added = true;
                document.getElementById("error").textContent = "Details already added. ";}
    }
}

    if (empty == false && added == false)   {

        if(data){
            var len = data.length;
        }
        else {
            len = 1
        }

        fetch(url, {method:'post', 
        body: JSON.stringify({"id":(len +1), "date":date, "hours":hours, "employee_id": id})
        })

        document.getElementById("error").textContent = "Added successfully.";

        //location = self.location;
    }

    

}

function deleteInfo() {
    var date = document.getElementById('date').value;
    var hours = document.getElementById('hrs').value;
    
    
    if(registered) {
        fetch(url, {
            method : "delete",
            body: JSON.stringify({"id":(data.length + 1), "date":date, 
                "hrs":hours,"employee_id": id})
    
        }),
    
        //console.log("del")
        location = self.location;
    }   
    
        else {
            document.getElementById('error').textContent = "You don't have saved detail";
        }
    


}