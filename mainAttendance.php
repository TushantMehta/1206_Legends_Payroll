<?php

require_once("inc/config.inc.php");
require_once("inc/entities/employeeAttendance.class.php");
require_once("inc/utilities/employeeAttendanceDAO.class.php");
require_once("inc/utilities/PDOService.class.php");

$input = json_decode(file_get_contents("php://input"));

Employee_Attendance::initialize();

switch($_SERVER["REQUEST_METHOD"]) {
    case "GET":
        echo json_encode(Employee_Attendance::getAttendance());
    break;

    case "POST":
        if(isset($input->id) 
        && isset($input->date) 
        && isset($input->present)
        && isset($input->employee_id)) {

            $att =  Employee_Attendance::createAttendanceObj($input);

            Employee_Attendance::addAttendance($att);
        }
        else {
            echo json_encode(array("message" => "Missing required fields."));
        }

    
    break;

    case "PUT":
    break;

    case "DELETE":
    break;
}

?>