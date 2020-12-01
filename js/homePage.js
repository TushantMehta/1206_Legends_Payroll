var url = "./mainEmployee.php";

var data;
var user;


checkAndSave();

async function checkAndSave() {

    var fName, lName, email, phoneNo, companyCode;

    data = await getData();

    var email = sessionStorage.getItem('email');

    for (var i = 0; i < data.length; ++i) {
        if (data[i]['email'] == email) {
            user = data[i];
            document.getElementById('name').innerHTML = user['fName'] + " " + user['lName'];
            document.getElementById('email').innerHTML = user['email'];
            document.getElementById('phoneNo').innerHTML = user["phoneNo"];
            document.getElementById('companyCode').innerHTML = user["companyCode"]
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
    sessionStorage.removeItem('email');
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
