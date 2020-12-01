<?php
require_once('./inc/config.inc.php');
require_once('./inc/entities/bankInfo.class.php');
require_once('./inc/utilities/bankInfoDAO.class.php');
require_once('./inc/utilities/PDOService.class.php');
$input = json_decode(file_get_contents("php://input"));

Bank_Info::initialize();

switch($_SERVER["REQUEST_METHOD"]) {

    case "GET":
        echo json_encode(Bank_Info::getDetail());

    break;

    case "POST":

        if
        (isset($input->id)
            && isset($input->account_number)
            && isset($input->transit_number)
            && isset($input->institute_number) 
            && isset($input->employee_id))   {
            

                $bn = Bank_Info::createBankInfoObj($input);
                Bank_Info::addDetail($bn);

            } else {
                echo json_encode(array("message" => "Missing required fields."));
            }

        

    break;

    case "PUT":

        if
        (isset($input->id)
            && isset($input->account_number)
            && isset($input->transit_number)
            && isset($input->institute_number) 
            && isset($input->employee_id))   {
            

                $bn = Bank_Info::createBankInfoObj($input);
                Bank_Info::updateDetail($bn);

            } else {
                echo json_encode(array("message" => "Missing required fields."));
            }


    break;

    case "DELETE":

        if
        (isset($input->account_number)
            && isset($input->transit_number)
            && isset($input->institute_number) )   {
            

                $bn = Bank_Info::createBankInfoObj($input);
                Bank_Info::deleteBank($bn);

            } else {
                echo json_encode(array("message" => "Missing required fields."));
            }

    break;
}





?>