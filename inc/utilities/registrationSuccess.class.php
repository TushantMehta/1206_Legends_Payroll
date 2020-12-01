<?php


class Registered {

    static public function html_Header() {
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            
            <title>Document</title>
        </head>
        <body>
        <h2>Registered Successfully</h2>
        <p>You are registererd<a href="./login.php">click here</a>to Login</p>


        <br>';


    }

    static public function html_Footer() {

        echo '</body>
            </html>';
    }

}

?>

