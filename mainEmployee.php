<?php
require_once('./inc/config.inc.php');
require_once('./inc/entities/employee.class.php');
require_once('./inc/utilities/fileService.class.php');
require_once('./inc/utilities/employeeParser.class.php');
require_once('./inc/utilities/employeeDAO.class.php');
$input = json_decode(file_get_contents("php://input"));


switch($_SERVER["REQUEST_METHOD"]) {
    case "GET":

         $data = EmployeeDAO::getEmployees();
         
            echo json_encode($data);
         
        
    break;

    case "POST":
        
        echo json_encode($input);
        EmployeeDAO::add_Employee($input);
        
    break;

    case "PUT":

       // EmployeeDAO::edit_Employee($input);

    break;

    case "DELETE":
      
        EmployeeDAO::delete_Employee($input);
        
    break;


}






?>