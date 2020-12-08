<?php

class Salary {
    
    static public function html_header (){
        echo "<!DOCTYPE html>
        <html>
        <head>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <link rel='stylesheet' type='text/css' href='./css/salary.style.css'/>
            <script src ='./js/salaryInfo.js'> </script>
            <title>Salary Management</title>
        </head>
        <body>
        ";
    }

    static public function html_footer(){
        echo "
        <a href ='homepageEmployee.php'>
        <p id='gb'>
        <U>
        <i>
        Go Back
        </U>
        </i>
        </p>
        <a>
                
        <div>
        <center>
        <form id ='details'>

            <h2 id='header'><b><u>Salary Management</b></u></h2>
            <p id='error'> </p>
            <br>

            <input type = 'number' placeholder = 'Payment ID' id='payId'><br><br>

            <input type = 'text' placeholder = 'Currency' id='curVal' maxlength ='3'><br><br>

            <input type = 'radio' id='annual' name='button'>  
            <label id='value'>Annual</label>&nbsp;

            &nbsp;&nbsp;&nbsp;&nbsp;

            <input type = 'radio' id='monthly' name='button'> 
            <label id='value'>Monthly</label><br><br><br> 

            <input type='number' placeholder='Amount' id='amt'><br><br>

            <input type='number' placeholder='Employee Id' id='empId'><br><br>
                            
            <input type='button' value='Submit' onclick='checkAndSave()' id='save'>               
            &nbsp;&nbsp;&nbsp;
            <input type='button' value='   Edit   ' onclick='redirectPage1()' id='delt'>

            <br><label>______________________________<label><br><br>

            <input type='button' value='View All' onclick='redirectPage2()' id='delt'><br><br>


        </form>
        </center>
        </div>
        ";
    }

    static public function html_form() {

        echo "</body></html>";

    }

}

?>