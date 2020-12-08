<?php
require_once('./inc/config.inc.php');

class Data {
    static public function html_header(){
    echo "<!DOCTYPE html>
    <html>
    <head>
    <style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
      }
      th, td {
        padding: 15px;
        text-align: left;
      }
      #t01 tr:nth-child(even) {
        background-color: #eee;
      }
      #t01 tr:nth-child(odd) {
       background-color: #fff;
      }
      #t01 th {
        background-color: black;
        color: white;
      }
    </style>
    <title> Salary Information </title>
    </head>
    <body>
    <center>
    <h1>Salary Management</h1>";
    }

    static public function html_data(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "Legends_payroll";
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // $sql = "SELECT * FROM salary_details ";
        $sql = "SELECT employee.first_name, employee.last_name, employee.company_code, salary_details.wageType, salary_details.currency, salary_details.amount, salary_details.employeeID FROM salary_details INNER JOIN employee ON salary_details.employeeID = employee.id";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            echo "<table id='t01'>
            <tr>
            <th>Employee Name</th>
            <th>Company Code</th>
            
            <th>Wage Type</th>
            <th>Currency</th>
            <th>Amount</th>
            <th>Modified By</th>
            </tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>" . $row["first_name"]. " " . $row["last_name"]."</td>
                <td>" .$row['company_code']. "</td>
                <td>" .$row['wageType']. "</td>
                <td>" .$row['currency']. "</td>
                
                <td>" .$row['amount']. "</td>
                <td>" .$row['employeeID']. "</td>
                
                </tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        
        $conn->close();;
    }

    static public function html_footer(){
        echo" </center>
        </body>
        </html";
    }

}

?>