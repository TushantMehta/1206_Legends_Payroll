var employees, year, month, date, fullDate, allAttendance;

async function getEmployees() {
    var res = await fetch("mainEmployee.php");
    var da = (await res).json();

    var dd = new Date;
    year = dd.getFullYear();
    month = dd.getMonth() + 1;
    date = dd.getDate();
    if (date < 10) {
        date = String(date);
        date = "0" + date;
    }
    fullDate = year + '-' + month   + "-" +date;

    allAttendance = await getAttendance();

    
   return da;
    
    
}

async function getAttendance() {
    var rsp = await fetch("mainAttendance.php");
    var rst = await rsp.json() ;

    return rst;
}




async function addEmployees() {
    employees = await getEmployees();
   

    
    var count = 0;
    
    for(var i = 0; i < allAttendance.length; ++i) {
        
        if (allAttendance[i]['date'] == fullDate) {
            //console.log('y')
            ++count;
        }

    }
    
    if(count == employees.length) {
        document.getElementById("msg").textContent = "Today's attendance is done!";
        document.getElementById('head').textContent = "";
    }

    else if (count != employees.length){
        console.log("not");
        var found = false;
        var div = document.getElementById("employees");
        
      
        for(var i = 0; i <employees.length; ++i) {
            found = false; 

            var emplId = employees[i]["id"];
            for (var z = 0; z < allAttendance.length; ++z) {
                
                if (emplId == allAttendance[z]['employee_id']) {
                    
                    if(allAttendance[z]['date'] == fullDate) {
                        found = true;
                        console.log("found");
                        break;
                        
                    }
                }
        }
            
            if (found == false) {
                var row = document.createElement("tr");
                var col = document.createElement("td");
                var flName = employees[i]['fName'] + " " + employees[i]["lName"];
                //console.log(frowlName);
                col.textContent = flName ;
                col.className = "names";
                var btn1 = document.createElement("button");
                btn1.id = employees[i]["id"];
                btn1.innerText = "Present";
                btn1.onclick = present;
                var btn2 = document.createElement("button");
                btn2.id = employees[i]["id"] + "d";
                btn2.innerText = "Absent";
                btn1.className = "btn1";
                btn2.className = "btn2";
                btn2.onclick = absent;
                row.appendChild(col);
                row.appendChild(btn1);
                row.appendChild(btn2);

                div.appendChild(row);
        }


        
    }
    

    }
}

addEmployees();


function present() {
    
    var btn1 = document.getElementById(this.id);
    var d = this.id + "d";
    //console.log(d[1]);
    var btn2 = document.getElementById(d);
    btn1.remove();
    btn2.remove();
    
    fetch("mainAttendance.php", {
        method: "post",
        body: JSON.stringify({"id": (Number(allAttendance[allAttendance.length - 1]["id"]) + 1 ), 
        "date": fullDate, "present": "yes", "employee_id": this.id})
    }),

    location = self.location;


}


function absent() {
    var btn1 = document.getElementById(this.id);
    var btn2 = document.getElementById(this.id[0]);
    btn1.remove();
    btn2.remove();
    console.log(( Number(employees[employees.length - 1]["id"]) + 1 ));

    fetch("mainAttendance.php", {
        method: "post",
        body: JSON.stringify({"id":  (Number(allAttendance[allAttendance.length - 1]["id"]) + 1) ,
         "date": fullDate, "present": "no","employee_id": this.id[0]})
    }),
    
    location = self.location;


}