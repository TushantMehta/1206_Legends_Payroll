<?php



class homePage {

    static public function html_Header() {

        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>

            <title>Document</title>

            <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' href='./css/homepage.style.css'/>  
        <script src='js/homePageEmployee.js'> </script>
        <title>Homepage - Legends-Payroll </title>

        </head>
        <body>";


    }

    static public function html_table() {

        echo '
    
            
               
               <p>Name: </p><p id ="name"></p>
               <p>Email: </p><p id ="email"></p>
               <p>Mobile Number: </p><p id ="phoneNo"></p>
               <p>Company Code: </p><p id ="companyCode"></p>

               
           
            
            <br>
            
            <input type="button" name="submit" id="submit" value="LogOut" onclick = "logOut()">
            <input type="button" name="submit" id="submit" value="Edit Profile" onclick = "editProfile()">
            <input type="button" name="submit" id="submit" value="leave Management" onclick = "leaveMgt()">
            <input type="button" name="submit" id="submit" value="Customer Service" onclick = "customerService()">
            <input type="button" name="submit" id="submit" value="Add Shift" onclick = "addShift()">
            <input type="button" name="submit" id="submit" value="Add Bank" onclick = "addBankInfo()">
           ';
        }
    

        static public function html_Footer() {

            echo "
            
            </body>
            </html>";
        }

}

?>