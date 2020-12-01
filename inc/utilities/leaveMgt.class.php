<?php 


class LeaveMgt {


    static public function html_header()
    {
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' href='./css/manageEmployees.style.css'/>  
        <title>Sign up with Payroll project-Legends </title>
        <script src = './js/leaveMgt.js'></script>
        </head> 
        <body>";

    }

    static public function html_form() {
        echo  "

    <center>
        <h1 class = 'heading'>Legends Payroll</h1>
       
        
    

    <form class='employees'>
    
    <div class='manageEmployees'> 
    
    <form class='employees'>
    
        <p style = 'text-decoration: underline;'><b>Leave Management</b></p>
        <br><br>

        <p id = 'error' style='color:white; background-color:red; font-size:15px' ></p>
        
        <label>Leave Type: </label>
        <input name='leave_Type' id='leave_Type' type='text';  required>
       
        <br><br>
        

        <label>Date To: </label>
        <input name='date_To' id='date_To' type='date'; required >
        <br><br>

        <label>Date From: </label>
        <input name='date_From' id='date_From' type='date';  required>
        <br><br>

        <label>Description: </label>
        <input name='description' id='description' type='text';  required>
        <br><br>

        <label>Status: </label>
        <input name='status' id='status' type='text';  required>
        <br><br>



        <br><br>

        <input type='button' class ='button' name='saveLeave' id='saveLeave' value='Save Leave' onclick='add_Leave()' > 

        <input type='button' class ='button' name='deleteLeave' id='deleteLeave' value='Delete Leave' onclick='delete_Leave()' >
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