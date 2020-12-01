<?php

class feedbackDAO {

    static private $feedbackMsg = array();

    static public function update(){
        $content = FileService::readFile(DATA_FILE2);
        FeedbackParser::ParserMessage($content);
        self::$feedbackMsg = FeedbackParser::$feedbackMsg;
    }

    static public function convertToStd($dataToConvert) {
        $msgStd = array();

        if(is_array($dataToConvert))    {
            if(!empty($dataToConvert))  {
                foreach ($dataToConvert as $message){
                    $msg = new stdClass;

                    $msg->name = $message->getName();
                    $msg->email = $message->getEmail();
                    $msg->message=$message->getMsg();

                    $msgStd[] = $msg;
                }
                    return $msgStd;
            }
        }else{
            $msg = new stdClass;

            $msg->name = $dataToConvert->getName();
            $msg->email = $dataToConvert->getEmail();
            $msg->message=$dataToConvert->getMsg();

            return $msg;

        }
    }

    static public function createObj($data){
        $msg = new Feedback;

        $msg->setName($data->name);
        $msg->setEmail($data->email);
        $msg->setMsg($data->message);

        return $msg;
    }

    static public function getMessages(){
        self::update();
        return self::convertToStd(self::$feedbackMsg);
    }

    static public function addMessage($data){
        self::update();

        $msg = self::createObj($data);
        array_push(self::$feedbackMsg, $msg);

        self::updateCSV();

    }





    public static function updateCSV() {

        $csvStr = "Name,Email,Message";

        foreach(self::$feedbackMsg as $mesg) {
            $csvStr .= "\n".
            $mesg->getName().",".
            $mesg->getEmail().",".
            $mesg->getMsg();

            FileService::writeFile(DATA_FILE2, $csvStr);

        }
    }

}

?>