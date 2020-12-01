<?php 


class Bank_Info {


    static public function html_header()
    {
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' href='./css/editEmployerProfile.style.css'/>  
        <title>Sign up with Payroll project-Legends </title>
        <script src = './js/bankInfo.js'></script>
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
    
        <p id='header'><b>Edit BankDetails</b></p>
        <br><br>

        <p id = 'error' style='color:white; background-color:red; font-size:15px' ></p>
        
        <label>Account Number</label>
        <input name='account_number' id='AC' type='text' required >
        <br><br>

        <label>Transit Number</label>
        <input name='transit_number' id='transit_number' type='text'; required >
        <br><br>

        <label>Institution Number:</label>
        <input name='institution_number' id='institution_number' type='text';  required>
        <br><br>

        <br><br>

        <input type='button' name='changeInfo' id='saveChange' value='Save Bank' onclick='checkAndSave()' > || <input type='button' onclick='deleteBank()' value='Delete Bank'>

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