<?php 


class SignUP {


    static public function html_header()
    {
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' href='./css/signUp.style.css'/>  
        <title>Sign up with Payroll project-Legends </title>
        <script src = './js/signUpPage.js'></script>
        </head>
        <body>";

    }

    static public function html_form() {
        echo  "
        <h1 class = 'heading'>Legends Payroll</h1>
    <center>

    
    
    <div class='signup'> 
    
    <form  id = 'form'>
    
        <p id='header'><b>Sign Up</b></p>
        <br><br>

        <p id = 'error' style='color:white; background-color:red; font-size:15px' ></p>
        
        <input name='fName' id='fName' type='text' placeholder='First Name' required >
        <br><br>

        <input name='lName' id='lName' type='text' placeholder='Last Name' required >
        <br><br>

        <input name='email' id='email' type='email' placeholder='Email address'  required>
        <br><br>

        <input name='phoneNo' id='number' type='tel' placeholder='Mobile Number' required >
        <br><br>



        <input name='companyCode' id='companyCode' type='number' placeholder='Company Code' required >
        <br><br>

        <input name='password'  id='password' type='password' placeholder='New password' required >
        <br><br>

        <input type='button' name='register' id='submit' value='Register' onclick='checkAndSave()' >

        </form>
        
        <input type = 'button' onclick='redirectPage()' id = 'signUP' value = 'SIGN IN'></a><br><br><br>
</div>
</center";
            



    }

    static public function html_footer()

    {
        
        echo "</body>
        </html>";
        
    }

    }

?>