<?php

class Shifts {
    
    static public function html_header (){
        echo "<!DOCTYPE html>
        <html>
        <head>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <link rel='stylesheet' type='text/css' href='./css/shifts.style.css'/>  
            <script src ='./js/shiftsInfo.js'> </script>
            <title>Shifts</title>
        </head>
        <body>
        ";
    }

    static public function html_footer(){
        echo "
        <a href ='homepage.php' id='back'><p id='gb'><U><i>Go Back</U></i></p><a>
                
        <div id = 'addShift'>
        <center>
        <form id ='details'>
        <h2 id='header'><b><u>Add your shifts</b></u></h2>
        <p id='error'> </p>
<br>
        <label id = 'lb'>Start Time: &nbsp;</label><input type='datetime-local' id='date'><br><br><br>
        
        <label id = 'lb'>Hours: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type='number' placeholder='Hours' id='hrs'><br><br>

        <p id='lble'>Employee ID&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </p>
        <p id= 'empID' float='left'><b><b></p><br><br><br><br><br>
        
        <input type='button' value='Submit' onclick='saveInfo()' id='save'>    
        <br><label>______________________________<label><br><br>
        <input type='button' value='Delete' onclick='deleteInfo()' id='delt'>
        <br>
        </center>
        </form>
        </div>
        ";
    }

    static public function html_form() {

        echo "</body></html>";

    }

}

?>