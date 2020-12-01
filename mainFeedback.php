<?php
require_once('./inc/config.inc.php');
require_once('./inc/entities/custFeedback.class.php');
require_once('./inc/utilities/fileService.class.php');
require_once('./inc/utilities/feedbackParser.class.php');
require_once('./inc/utilities/feedbackDAO.class.php');
$input = json_decode(file_get_contents("php://input"));

switch($_SERVER["REQUEST_METHOD"]) {
    case "GET":

            $data = feedbackDAO::getMessages();
            if(!empty($data)){
                echo json_encode($data);
            }

        break;

    case "POST":

        feedbackDAO::addMessage($input);
    break;

    

}


?>