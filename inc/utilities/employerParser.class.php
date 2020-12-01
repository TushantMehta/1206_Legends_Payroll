<?php

class EmployerParser {

    static public $employers = array();
    

    static public function ParseEmployers($content) {

        
        if (!empty($content)) {
            try {
                
            {
                    foreach ($content as $employer) {
                        $emp = new Employer();
                        $emp->setId($employer->id);
                        $emp->setfName($employer->fName);
                        $emp->setlName($employer->lName);
                        $emp->setEmail($employer->email);
                        $emp->setphoneNo($employer->phoneNo);
                        $emp->setCompanyCode($employer->companyCode);
                        $emp->setPassword($employer->password);

                        
                        self::$employers[] = $emp;

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