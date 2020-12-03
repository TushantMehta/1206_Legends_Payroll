// //sessionStorage.setItem("id", 1);
// var url = "./mainShiftsInfo.php";

// var data;
// var date, hours;
// var id = sessionStorage.getItem("id");

// async function getData() {
//     var res = await fetch(url);
//     var data = (await res).json()

//     return data;    
// }
// async function check() {
//     data = await getData();
//     document.getElementById('empID').textContent= id;
    
// }
// check();

// async function saveInfo() {

//     var date = document.getElementById('date').value;
//     var hours = document.getElementById('hrs').value;
//     var added = false;
//     var empty = false;

//     if (date == "" || hours == "") {
//         empty = true;
//         document.getElementById('error').textContent = "Please insert all fields";
//     }
     
//     if(data != ""){
//         for (var i = 0; i< data.length; ++i) {
//             if(data[i]['date'] == date && data[i]['hours'] == hours && data[i]['employee_id'] == id)  {
//                 added = true;
//                 document.getElementById("error").textContent = "Details already added. ";
//                 break;
//             }
//         }
//     } 


//     if (empty == false && added == false)   {

//         fetch(url, {method:'post', 
//         body: JSON.stringify({"id":(data.length + 1), "date":date, "hours":hours, "employee_id": id})
//         }),

//         document.getElementById("error").textContent = "Added successfully.";

//         //location = self.location;
//     }
// }


// async function deleteInfo() {
//     var date = document.getElementById('date').value;
//     var hours = document.getElementById('hrs').value;

//     var addedX = false;
//     var emptyX = false;

//     if (date == "" || hours == "") {
//         emptyX = true;
//         document.getElementById('error').textContent = "Please insert all fields";
        
//     }
    
//     if(data != ""){
//         for(var i = 0; i < data.lengt; ++i){
//             if(data[i]['date'] == date && data[i]['hours'] == hours && data[i]['employee_id'] == id){
//                 addedX = true;
//             }
//         }
//     }

//     if(addedX !=  true)   {
//         document.getElementById("error").textContent = "Details Not Found !!";
        
//     }
//         //console.log("del")
//         //location = self.location;
   
//     else {
           
            

//             fetch(url, {method:'delete', 
//         body: JSON.stringify({"id":(data.length), "date":date, "hours":hours, "employee_id": id})
//         }),
//         document.getElementById("error").textContent = "Deleted Successfully";
//     }

    
// }


//sessionStorage.setItem("id", 1);
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
    data = await getData();
    
    
    if (date == "" || hours == "") {
        empty = true;
        console.log("empty");
        document.getElementById('error').textContent = "Please insert all fields";

    }

    if(data != ""){
        for (var i = 0; i< data.length; ++i) {
            if(data[i]['date'] == date && data[i]['hours'] == hours)  {
                registered = true;
                document.getElementById("error").textContent = "Details already added. ";
                 // lets see
            }
        }
    }
    
    
    if (empty == false && registered == false){
        fetch(url, {method:'post', 
        body: JSON.stringify({"id":(data.length +1), "date":date, "hours":hours, "employee_id": id})
        }),
        document.getElementById("error").textContent = "Added successfully.";

    }

}

function deleteInfo() {
    var date = document.getElementById('date').value;
    var hours = document.getElementById('hrs').value;

    var emptyX = false;

    if (date == "" || hours == "") {
        emptyX = true;
        console.log("empty");
        document.getElementById('error').textContent = "Please insert all fields";
        

    }
    
    if(data != null){
        for (var i = 0; i< data.length; ++i) {
            if(data[i]['date'] == date && data[i]['hours'] == hours)  {
                registered = true;
                //document.getElementById("error").textContent = "Details already added. ";
            }
        }
    }

    if(registered != true){
        document.getElementById("error").textContent = "Details Not Saved";
    }else{
        fetch(url, {
            method : "delete",
            body: JSON.stringify({"id":(data.length) ,"date":date, "hours":hours,"employee_id": id})
        }),
        document.getElementById("error").textContent = "Deleted Successfully!!!";
        console.log('done');

    } 
}

