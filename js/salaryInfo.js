var url ="./mainSalaryInfo.php";

var data;
var registered = false;
var cur, wType, Amtt, emId, payId, bossId, newBid;
sessionStorage.setItem("id", 1);
var id = sessionStorage.getItem("id");

async function getData(){
    var res = await fetch(url);
    var data = (await res).json()
    return data;
}

async function check(){
    data = await getData();
    var val = document.getElementById('payId').value;
    if(data != null){
    for(var i = 0; i < data.length ; i++){
        if(val == data[i]['paymentID']){
            var user = data[i];
            var a = document.getElementById('curVal');
            a.value = user['currency'];
            var b = document.getElementById('wType');
            b.value = user['wageType'];
            var c = document.getElementById('amt');
            c.value = user['amount'];
            var d = document.getElementById('empId');
            d.value = user['employeeID'];
            var e = document.getElementById('bossId');
            e.value = id;
            console.log("yes");
            registered = true;
            break;
        }else{
            console.log("no");
        }
    }
    }
    
}

async function checkAndUpdate(){
    data = await getData();
    var payId = document.getElementById('payId').value;
    var cur = document.getElementById('curVal').value;
    var wType = document.getElementById('wType').value;
    var Amtt = document.getElementById('amt').value;
    var emId = document.getElementById('empId').value;
    var newBid = document.getElementById('bossId').value;
    // if(payId = "" || cur == "" || wType == "" || Amtt == ""){
    //     console.log("empty");
    //     document.getElementById('error').textContent = 'Please Insert all fields.';
    // }
    
        
    // if(payId = "" || cur == "" || wType == "" || Amtt == "" || emId == "" || newBid =="")
    // {
    //     console.log("empty");
    // }else 
    if(registered == true){
        console.log("Work Done");
    }
        fetch(url, {
            method : "PUT",
            body : JSON.stringify({"paymentID":payId, "currency":cur, "wageType" : wType, "amount" : Amtt, "employeeID" : emId, "employerID" : id})
        })
    //}
}

async function checkAndSave(){
    data = await getData();
    var payId = document.getElementById('payId').value;
    var cur = document.getElementById('curVal').value;
    if(document.getElementById('annual').checked){
        var wType = "Annual";
    }
    if (document.getElementById('monthly').checked){
        var wType = "Monthly";
    }
    var Amtt = document.getElementById('amt').value;
    var emId = document.getElementById('empId').value;
    // if(payId = "" || cur == "" || wType == "" || Amtt == ""){
    //     console.log("empty");
    //     document.getElementById('error').textContent = 'Please Insert all fields.';
    // }
    
        if(data != null){
        for(var i=0; i<data.length; ++i){              
            if
            (payId == data[i]['paymentID'] && cur == data[i]['currency'] && wType == data[i]['wageType'] && Amtt == data[i]['amount'] && emId == data[i]['employeeID'] && id == data[i]['employerID'])
            {
                document.getElementById('error').textContent = "Data already added";
                console.log("registered");
                return;
            }else{
                fetch(url, {
                    method : "POST", 
                    body : JSON.stringify({"paymentID":payId, "currency":cur, "wageType" : wType, "amount" : Amtt, "employeeID" : emId, "employerID" : id})
                }),
                document.getElementById('error').textContent = 'Added Successfully !';
                console.log("Success");
            }

        }
    }

    
}

async function deleteS(){
    data = await getData();
    var payId = document.getElementById('payId').value;
    var cur = document.getElementById('curVal').value;
    var wType = document.getElementById('wType').value;
    var Amtt = document.getElementById('amt').value;
    var emId = document.getElementById('empId').value;
    var newBid = document.getElementById('bossId').value;

    // if(payId = "" || cur == "" || wType == "" || Amtt == "" || emId == "" || newBid =="")
    // {
    //     console.log("empty");
    // }else 
    if(registered == true){
        fetch(url, {
            method : "DELETE",
            body : JSON.stringify({"paymentID":payId, "currency":cur, "wageType" : wType, "amount" : Amtt, "employeeID" : emId, "employerID" : id})
        }),
        console.log("delete");
    }
}

function redirectPage1() {
    window.location = './editSalary.php';
}

function redirectPage2() {
    window.location = './allData.php';
}

function redirectPage3() {
    window.location = './salaryInfo.php';
}
