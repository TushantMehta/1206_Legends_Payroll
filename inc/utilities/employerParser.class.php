<?php

class EmployerParser {

    static public $employers = array();
    

    static public function ParseEmployers($content) {

        
        if (!empty($content)) {
            try {
                
            // {
            //         foreach ($content as $employer) {
            //             $emp = new Employer();
            //             $emp->setId($employer->id);
            //             $emp->setfName($employer->fName);
            //             $emp->setlName($employer->lName);
            //             $emp->setEmail($employer->email);
            //             $emp->setphoneNo($employer->phoneNo);
            //             $emp->setCompanyCode($employer->companyCode);
            //             $emp->setPassword($employer->password);

                        
            //             self::$employers[] = $emp;

            //         }
            //     }  

                $lines = explode("\n", $content);

                        
                //Check the number of columns is correct
                for ($i = 1; $i < count($lines); $i++)  {
                    $columns = explode(",",$lines[$i]);

                    if (count($columns) == 7)   {
                        //we have what we need
                        //Make new Person object
                        $np = new Employer();
                        $np->setId($columns[0]);
                        $np->setFName($columns[1]);
                        $np->setLName($columns[2]);
                        $np->setEmail($columns[3]);
                        $np->setPhoneNo($columns[4]);
                        $np->setCompanyCode($columns[5]);
                        $np->setPassword($columns[6]);

                        self::$employers[] = $np;
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