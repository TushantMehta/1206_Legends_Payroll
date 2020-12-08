<?php
require_once('./inc/config.inc.php');
require_once('./inc/entities/salaryInfo.class.php');
require_once('./inc/utilities/salaryInfoDAO.class.php');
require_once('./inc/utilities/PDOService.class.php');
$input = json_decode(file_get_contents("php://input"));

Salary_Info::initialize();

switch($_SERVER["REQUEST_METHOD"]){
    case "GET":
        echo json_encode(Salary_Info::getDetails());
    break;

    case "POST":
        if
        (isset($input->paymentID)
        && isset($input->currency)
        && isset($input->wageType)
        && isset($input->amount)
        && isset($input->employeeID))   {
            $sl = Salary_Info::createObj($input);
            Salary_Info::addDetail($sl);
        }else{
            echo json_encode(array("message" => "Missing required fields."));
        }
    break;

    case "PUT":
        if(isset($input->paymentID)
        && isset($input->currency)
        && isset($input->wageType)
        && isset($input->amount)
        && isset($input->employeeID)
        && isset($input->employerID))   {
            
            $sl = Salary_Info::createObj($input);
            Salary_Info::updateDetail($sl);
        }else{
            echo json_encode(array("message" => "Missing required fields."));
        }
    break;

    case "DELETE":
        if(isset($input->paymentID)
        && isset($input->currency)
        && isset($input->wageType)
        && isset($input->amount)
        && isset($input->employeeID)
        && isset($input->employerID))   {
            
            $sl = Salary_Info::createObj($input);
            Salary_Info::deleteDetail($sl);
        
    }else{
            echo json_encode(array("message" => "Missing required fields."));
    }
    break;

}