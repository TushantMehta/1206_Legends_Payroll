<?php
require_once('./inc/config.inc.php');
require_once('./inc/entities/taxDetails.class.php');
require_once('./inc/utilities/taxDetailsDAO.class.php');
require_once('./inc/utilities/PDOService.class.php');
$input = json_decode(file_get_contents("php://input"));

Tax_Details::initialize();

switch($_SERVER["REQUEST_METHOD"]) {

    case "GET":
        echo json_encode(Tax_Details::getDetail());

    break;

    case "POST":

        if
        (isset($input->tax_Id) 
            && isset($input->employee_address) 
            && isset($input->sin_number) 
            && isset($input->salary_generated) 
            && isset($input->employee_id))   {
            

                $td = Tax_Details ::createTaxDetailsObj($input);
                Tax_Details::addDetail($td);

            } else {
                echo json_encode(array("message" => "Missing required fields."));
            }

        

    break;

    case "PUT":

        if
        (isset($input->tax_Id) 
            && isset($input->employee_address) 
            && isset($input->sin_number) 
            && isset($input->salary_generated) 
            && isset($input->employee_id))    {
            

                $td = Tax_Details::createTaxDetailsObj($input);
                Tax_Details::updateDetail($td);

            } else {
                echo json_encode(array("message" => "Missing required fields."));
            }


    break;

    case "DELETE":

        if
        (isset($input->tax_Id) 
            && isset($input->employee_address) 
            && isset($input->sin_number) 
            && isset($input->salary_generated) 
            && isset($input->employee_id))  {
            
                $td = Tax_Details::createTaxDetailsObj($input);
                Tax_Details::deleteTaxDetails($td);

            } else {
                echo json_encode(array("message" => "Missing required fields."));
            }

    break;
}

?>