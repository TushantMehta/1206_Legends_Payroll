<?php


class ForgotPass {

    static public function html_Header() {

        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <link rel='stylesheet' type='text/css' href='./css/forgetPass.css'/>  
            <title>Reset Password</title>
            <script src = './js/forgetPassword.js'></script>
        </head>
        <body>";

    }


    static public function html_form() {
        echo '
        <center>
        <div class="renew">
        <form>
       
        <p><b>Reset Password<b><p>

        <p id = "error" style="color:white; background-color:red; font-size:15px" ></p> 
        
        <input type="email"  name="userEmail" id="email" placeholder="Email address"><br><br><br>

        <input type="text" id="fName" name="fName" placeholder="first Name"><br><br><br>

        <input type="text" id="lName" name="lName" placeholder="last Name"><br><br><br>

        <input type="text" id="companyCode" name="companyCode" placeholder="company code"><br><br><br>

        <input type="password" id="newPassword" name="newPassword" placeholder="New Password"><br><br><br>

        <input type="password" id="RePass" name="newPassword1" placeholder="Re-enter new Password"><br><br><br>

        <input type="button" id="submit" name="changePassword" value="Change Password" onclick="checkAndSave()"><br><br>

        </form>
        </div>
        </center>
        ';

    }

    static public function html_Footer() {

        echo '</body>
        </html>';


    }
}

?>