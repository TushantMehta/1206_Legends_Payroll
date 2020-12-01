var url = "./mainFeedback.php";

var data;


async function receiveMessage() {

    var name, email, message;
    name = document.getElementById('custName').value;
    email = document.getElementById('custEmail').value;
    message = document.getElementById('custMsg').value;

    var empty = false;
    data = await getData();


    if(name == "" || email == "" || message == "")    {
        empty = true;
        document.getElementById("error").innerHTML = "Please Enter Details.";
    } 
    
 var matched  = false;

    
    if(data != "") {
        for(var i = 0; i < data.length; ++i ) {
            if (data[i]['email'] == email) {
                matched = true;
                document.getElementById("error").innerHTML = "We have already received your feedback. We will try to respond as soon as possible.";
            }
        }
    }

    if(empty == false && matched == false)
    {
        document.getElementById("error").innerHTML = "Thank you for your feedback.";
        fetch(url, {method: 'POST',
        body: JSON.stringify({"name":name, "email": email, "message": message})
    })
    }


}

async function getData() {

    var res = await fetch(url)
    
    var dat  = await res.json()
    
    return dat;
}