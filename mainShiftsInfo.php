<?php

require_once('./inc/config.inc.php');
require_once('./inc/entities/shiftInfo.class.php');
require_once('./inc/utilities/shiftInfoDAO.class.php');
require_once('./inc/utilities/PDOService.class.php');
$input = json_decode(file_get_contents("php://input"));

Shift_info::initialize();

switch($_SERVER["REQUEST_METHOD"]) {

    case "GET":
        echo json_encode(Shift_info::getDetails());
    break;

    case "POST":

        if
        (isset($input->id)
            && isset($input->date)
            && isset($input->hours)
            && isset($input->employee_id))   {
            

                $si = Shift_info::createObj($input);
                Shift_info::addDetail($si);

            } else {
                echo json_encode(array("message" => "Missing required fields."));
            }

    break;
    case "DELETE":

        if
        (isset($input->id)
            && isset($input->date)
            && isset($input->hours)
            && isset($input->employee_id))   {
            

                $si = Shift_info::createObj($input);
                Shift_info::delete($si);

            } else {
                echo json_encode(array("message" => "Missing required fields."));
            }
    break;
}



?>