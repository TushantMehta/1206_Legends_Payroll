<?php
require_once('./inc/config.inc.php');
require_once('./inc/entities/employer.class.php');
require_once('./inc/utilities/fileService.class.php');
require_once('./inc/utilities/EmployerParser.class.php');
require_once('./inc/utilities/employerDAO.class.php');
$input = json_decode(file_get_contents("php://input"));

switch($_SERVER["REQUEST_METHOD"]) {
    case "GET":

        $data = EmployerDAO::getEmployers();
        if (!empty($data)) {
            echo json_encode($data);
        }
        
    break;

    case "POST":
        EmployerDAO::addEmployer($input);
        
    break;

    case "PUT":

        EmployerDAO::editEmployer($input);

    break;

    case "DELETE":

        EmployerDAO::deleteEmployer($input); 
        
    break;


}






?>