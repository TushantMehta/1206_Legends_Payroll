<?php
require_once('./inc/config.inc.php');
require_once('./inc/entities/leaveMgt.class.php');
require_once('./inc/utilities/leaveMgtDAO.class.php');
require_once('./inc/utilities/PDOService.class.php');
$input = json_decode(file_get_contents("php://input"));

leave_Mgt::initialize();

switch($_SERVER["REQUEST_METHOD"]) {

    case "GET":
        echo json_encode(leave_Mgt::getDetail());

    break;

    case "POST":

        if
        (isset($input->leave_Id)
            && isset($input->leave_Type)
            && isset($input->date_To)
            && isset($input->date_From) 
            && isset($input->description) 
            && isset($input->status) 
            && isset($input->employee_id))   {
            

                $lm = leave_Mgt::createLeaveMgtObj($input);
                Leave_Mgt::addDetail($lm);

            } else {
                echo json_encode(array("message" => "Missing required fields."));
            }

        

    break;

    case "PUT":

        if
        (isset($input->leave_Id)
            && isset($input->leave_Type)
            && isset($input->date_To)
            && isset($input->date_From) 
            && isset($input->description) 
            && isset($input->status) 
            && isset($input->employee_id))   {
            

                $lm = leave_Mtg::createLeaveMgtObj($input);
                Leave_Mgt::updateDetail($lm);

            } else {
                echo json_encode(array("message" => "Missing required fields."));
            }


    break;

    case "DELETE":

        
        if
        (isset($input->leave_Id)
            &&isset($input->leave_Type)
            && isset($input->date_To)
            && isset($input->date_From) 
            && isset($input->description) 
            && isset($input->status)
            && isset($input->employee_id))  {
            
                $lm = leave_Mgt::createLeaveMgtObj($input);
               // echo "lm = ", $lm;
                leave_Mgt::deleteLeave($lm);

            } else {
                echo json_encode(array("message" => "Missing required fields."));
            }

    break;
}

?>