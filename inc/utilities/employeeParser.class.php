<?php

class EmployeeParser {

    static public $employees = array();
    

    static public function ParseEmployees($content) {

        
        if (!empty($content)) {
           
            try {
                
            $lines = explode("\n", $content);

                    
            //Check the number of columns is correct
            for ($i = 1; $i < count($lines); $i++)  {
                $columns = explode(",",$lines[$i]);

                if (count($columns) == 7)   {
                    //we have what we need
                    //Make new Person object
                    $np = new Employee();
                    $np->setId($columns[0]);
                    $np->setFName($columns[1]);
                    $np->setLName($columns[2]);
                    $np->setEmail($columns[3]);
                    $np->setPhoneNo($columns[4]);
                    $np->setCompanyCode($columns[5]);
                    $np->setPassword($columns[6]);

                    self::$employees[] = $np;
                }  
            }
        }
            catch (Exception $pe) {
                echo $pe->getMessage();
            }
        

        


    }


}
}


?>