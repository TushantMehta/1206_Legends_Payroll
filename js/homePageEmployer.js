var url = "./mainEmployer.php";

var data;
var user;


checkAndSave();

async function checkAndSave() {

    var fName, lName, email, phoneNo, companyCode;

    data = await getData();

    var id = sessionStorage.getItem('id');

    for (var i = 0; i < data.length; ++i) {
        if (data[i]['id'] == id) {
            user = data[i];

            document.getElementById('name').innerHTML = user['fName'] + " " + user['lName'];
            document.getElementById('email').innerHTML = user['email'];
            document.getElementById('phoneNo').innerHTML = user["phoneNo"];
            document.getElementById('companyCode').innerHTML = user["companyCode"];

            break;
        }
    }

    

}



async function getData() {

    var res = await fetch(url)
    var dat  = await res.json()
    
    return dat;
}





function redirectPage() {
    window.location = './login.php';
}


function logOut() {
    sessionStorage.removeItem('id');
    window.location = './login.php';
}

function editProfile() {
    window.location = './updateProfile.php';
}


function manageEmployees() {
    window.location = './manageEmployees.php';
}


function customerService() {
    window.location = './customerService.php';
}

function attendance() {
    window.location = "./attendance.php";
}
