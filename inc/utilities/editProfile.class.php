<?php 


class EditProfile {


    static public function html_header()
    {
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' href='./css/editEmployerProfile.style.css'/>  
        <title>Sign up with Payroll project-Legends </title>
        <script src = './js/editProfilePage.js'></script>
        </head>
        <body>";

    }

    static public function html_form() {
        echo  "
        <h1 class = 'heading'>Legends Payroll</h1>
        <a href='homepage.php' id='back'>Go Back</a>
    <center>

    
    
    <div class='editProfile'> 
    
    <form class='details'>
    
        <p id='header'><b>Edit Profile</b></p>
        <br><br>

        <p id = 'error' style='color:white; background-color:red; font-size:15px' ></p>
        
        <input name='fName' id='fName' type='text' required >
        <br><br>

        <input name='lName' id='lName' type='text' required >
        <br><br>

        <input name='email' id='email' type='email'  required>
        <br><br>

        <input name='phoneNo' id='number' type='tel' required >

        <br><br>

        <input name='companyCode' id='companyCode' type='number' placeholder='Company Code' required >
        <br><br>

        <input type='button' name='changeInfo' id='saveChange' value='Save Changes' onclick='checkAndSave()' > || <input type='button' onclick='deleteProfile()' value='Delete Profile'>

        </form>
        
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