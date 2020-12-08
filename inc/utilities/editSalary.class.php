<?php

class EditPage {
    
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
        <div id='one'>
        <center>
        <form id ='details2'>

            <h2 id='header'><b><u>Edit Page</b></u></h2>
            <p id='error'> </p>
            <br>

            
            <input type = 'number' placeholder = 'Payment Id' id = 'payId'>
            <br><label>______________________________<label><br><br>
            <input type='button' value='Go' onclick='check()' id='save'>
            <br><label>______________________________<label><br><br>
            <input type = 'number' placeholder = 'Employee Id' id = 'empId'><br>
            <input type = 'text' placeholder = 'Currency' id='curVal' maxlength ='3'><br><br>

            <input type='text' placeholder = 'Wage Type' id='wType'><br><br>
            <input type='number' placeholder='Amount' id='amt'><br><br>
            
            <input type = 'number' placeholder = 'Modified by' id='bossId' ><br><br>
            
        </form>
        </center>
        </div>
        
        <div id='two'>
        <center>

            <input type='button' value=' Submit ' onclick='checkAndUpdate()' id='save'><br><br>
            <input type='button' value=' Delete ' onclick='deleteS()' id='delt'><br><br>
            <input type='button' value='Go Back' onclick='redirectPage3()' id='delt'>
        </center>
        
        </div>
        
        ";
    }

    static public function html_form() {

        echo "</body></html>";

    }

}

?>