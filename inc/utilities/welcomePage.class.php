<?php 


class WelcomePage {


    static public function html_header()
    {
        echo "<!DOCTYPE html>
        
        <head>
            <link rel='stylesheet' type='text/css' href='./css/welcomePage.style.css'/>  
            <title>Document</title>
        </head>
        <body>";

    }

    static public function html_body() {
        echo  '
            <header>
            <div>
                <h1>Legends Payroll Welcomes You</h1>
            </div>
            
            <div class="nav">
                <a href="#" class="contactUs">Contact Us</a>
            </div>
            </header>

            <div>
                <ul class="login">
                    
                    <li><a href="./loginEmployee.php">Employee Login</a></li>
                    <li><a href="./loginEmployer.php">Employer Login</a></li>
                </ul>

                <p class="register">Not Registered?<a href="./signUp.php" class="signUp"> click here </a>to signUp as Employer</p>
            </div>';
            
        }

    static public function html_footer()

    {
        
        echo "</body>
        </html>";
        
    }

    }

?>