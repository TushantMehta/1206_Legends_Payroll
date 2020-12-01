<?php
require_once('./inc/config.inc.php');
require_once('./inc/entities/employer.class.php');
require_once('./inc/utilities/employerDAO.class.php');
require_once('./inc/utilities/PDOService.class.php');
$input = json_decode(file_get_contents("php://input"));

EmployerDAO::intialize();

switch($_SERVER["REQUEST_METHOD"]) {
    case "GET":

        if (isset($input->id)) {
            echo json_encode(EmployerDAO::getEmployer($input->id));
        } else {
            //Tell the recipient JSON is incomming
            header("Content-Type: application/json");
            //echo out the people from the database after converting to JSON
            echo json_encode(EmployerDAO::getEmployers());
            //Do get things
        }
        
    break;

    case "POST":
        if(isset($input->id) && isset($input->fName) && isset($input->lName) && isset($input->email)
            && isset($input->phoneNo) && isset($input->companyCode) && isset($input->password))
            {
                    $emp = EmployerDAO::createEmployerObj($input);
                    EmployerDAO::addEmployer($emp);
            }

            else {
                echo json_encode(array("message" => "Missing required fields."));
            }
    break;


    case "PUT":

        if(isset($input->id) && isset($input->fName) && isset($input->lName) && isset($input->email)
            && isset($input->phoneNo) && isset($input->companyCode) && isset($input->password))
        {

            $emp = EmployerDAO::createEmployerObj($input);
            EmployerDAO::editEmployer($emp);

        }
        else {
            echo json_encode(array("message" => "Missing required fields."));
        }

    break;

    case "DELETE":

        $emp = new Employer;
        $emp->setId($input->id);
        EmployerDAO::deleteEmployer($emp); 
        
    break;


}






?>