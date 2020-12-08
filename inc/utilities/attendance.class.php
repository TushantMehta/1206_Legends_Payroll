<?php 


class Bank_Info {


    static public function html_header()
    {
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' href='./css/attendance.style.css'/>  
        <title>Sign up with Payroll project-Legends </title>
        <script src = './js/attendance.js'></script>
        </head> 
        <body>";

    }

    static public function html_form() {
        echo  "
        <h1 class = 'heading'>Legends Payroll</h1>
        <a href='homepageEmployer.php' id='back'>Go Back</a>

    
    <center>
        <h2>Attendance</h2>
        <hr>
        <h4 id='head'>Employees:</h4>
        
        
    <div id='msg'></div>
    
    
    <table class='attendance' id='employees'>
    
    
        
    </table>
    </center";
            



    }

    static public function html_footer()

    {
        
        echo "</body>
        </html>";
        
    }

    }

?>