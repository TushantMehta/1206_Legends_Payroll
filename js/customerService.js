var url = "./mainEmployer.php";

var data;
var user;



printData();

async function printData() {


    data = await getData();

    var email = sessionStorage.getItem("email");

    for(var i = 0; i < data.length; ++i) {
        if(data[i]['email'] == email) {
            user = data[i];
            console.log(user);
        }
    }

   document.getElementById('message').innerHTML += " " + user['fName'] + ' ' + user['lName'] + '.<br><br> Below is our contact information.';


}


async function getData() {

    var res = await fetch(url)
    var dat  = await res.json()
    
    return dat;
}