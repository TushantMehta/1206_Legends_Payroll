

<?php 


class login {

    static public function html_header() {
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
        
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' href='./css/login.style.css'/>  
        <title>Log In page - Welcome to Payroll project-Legends </title>
        <script src = './js/loginPage.js'></script>
        </head>
        <body>";
    }


    static public function html_footer() {
        echo "<br<br><br><br><br><br<br><br><br><br><br<br>
        <h1 style=' margin-left:150px; margin-top:125px;' class = 'heading'>Legends Payroll</h1>
    <center>
  
    
    <div class='login'>    
    <form>  

    <p id='header' style='margin-top:25px; font-size:25px;'><b>Login Page</b></p>
    <p id = 'error' style='color:white; background-color:red; font-size:15px' ></p>    
        
        <input name='email' id='email' type='email' placeholder='Email'><br><br>
                    

        <input name='password' type='Password' id='password' placeholder='Password'><br><br>
        
       <input type='button' value = 'Log In' onclick ='validate()'>
        <br><br> 

    </form>    
    <p style='color:#7c4762;'><a href='./forgotPassword.php'><b>Forgot Password<b></a></p>
    <p style='color:black;'>____________________________<br><br></p><p style='color:#7c4762;'><b>Not Registered? <b></p>
    <a href='./signUp.php'>
    <input type = 'button' name='signin' id = 'signin' value = 'Create New Account'></a>
    <br><br><br>
    </div>  
    </center>
    </body>
    </html>
    ";
    }

}
?>

    