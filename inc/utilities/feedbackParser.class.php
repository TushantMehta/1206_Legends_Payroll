<?php
class FeedbackParser{
    static public $feedbackMsg = array();

    static public function ParserMessage($content)  {
        if(!empty($content)){
            try {
                $lines = explode("\n", $content);
                        
                //Check the number of columns is correct
                for ($i = 1; $i < count($lines); $i++)  {
                    $columns = explode(",",$lines[$i]);
                    if(count($columns) == 3){
                        $np = new Feedback();
                        $np->setName($columns[0]);
                        $np->setEmail($columns[1]);
                        $np->setMsg($columns[2]);
                        
                        self::$feedbackMsg[] = $np;
                        }
                }
            }catch(Exception $ex){
                echo $ex->getMessage();
            }
    }
    }
}
?>
