<?php
require_once('./inc/config.inc.php');
require_once('./inc/entities/employee.class.php');
require_once('./inc/utilities/fileService.class.php');
require_once('./inc/utilities/EmployeeParser.class.php');
require_once('./inc/utilities/employeeDAO.class.php');
require_once('./inc/utilities/PDOService.class.php');
$input = json_decode(file_get_contents("php://input"));


EmployeeDAO::intialize();

switch($_SERVER["REQUEST_METHOD"]) {
    case "GET":

        if (isset($input->id)) {
            echo json_encode(EmployeeDAO::getEmployee($input->id));
        } else {
            //Tell the recipient JSON is incomming
            header("Content-Type: application/json");
            //echo out the people from the database after converting to JSON
            echo json_encode(EmployeeDAO::getEmployees());
            //Do get things
        }
        
    break;

    case "POST":
        if(isset($input->id) && isset($input->fName) && isset($input->lName) && isset($input->email)
            && isset($input->phoneNo) && isset($input->companyCode) && isset($input->password))
            {
                    $emp = EmployeeDAO::createEmployeeObj($input);
                    EmployeeDAO::addEmployee($emp);
            }

            else {
                echo json_encode(array("message" => "Missing required fields."));
            }
    break;


    case "PUT":

        if(isset($input->id) && isset($input->fName) && isset($input->lName) && isset($input->email)
            && isset($input->phoneNo) && isset($input->companyCode) && isset($input->password))
        {

            $emp = EmployeeDAO::createEmployeeObj($input);
            EmployeeDAO::editEmployee($emp);

        }
        else {
            echo json_encode(array("message" => "Missing required fields."));
        }

    break;

    case "DELETE":

        $emp = new Employee;
        $emp->setId($input->id);
        EmployeeDAO::deleteEmployee($emp); 
        
    break;


}






?>