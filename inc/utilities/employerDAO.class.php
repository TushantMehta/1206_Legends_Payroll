<?php

class EmployerDAO {

    static private $employers = array();
    
    
    
    static public function updateEmployers() {

        $content = FileService::readFile(DATA_FILE);
        EmployerParser::ParseEmployers($content);
        self::$employers = EmployerParser::$employers;


    }

    static public function convertToStd($dataToConvert) {
        
        $employerStd = array();

        if(is_array($dataToConvert)) {

            if(!empty($dataToConvert)) {
            
              
                foreach($dataToConvert as $employer) {
                    $emp = new stdClass;

                    $emp->id = $employer->getId();
                    $emp->fName = $employer->getFName();
                    $emp->lName = $employer->getlName();
                    $emp->phoneNo = $employer->getPhoneNo();
                    $emp->companyCode = $employer->getCompanyCode();
                    $emp->password = $employer->getPassword();
                    $emp->email = $employer->getEmail();
                    
                    $employerStd[] = $emp;

                    
                }
                    return $employerStd;
            
            }
        }

        else {

            $emp = new stdClass;

                $emp->id = $dataToConvert->getId();
                $emp->fName = $dataToConvert->getFName();
                $emp->lName = $dataToConvert->getlName();
                $emp->phoneNo = $dataToConvert->getPhoneNo();
                $emp->companyCode = $dataToConvert->getCompanyCode();
                $emp->password = $dataToConvert->getPassword();
                $emp->email = $dataToConvert->getEmail();

            return $emp;
        }


    }


    static public function createEmployerObj($data) {


        $emp = new Employer;

        $emp->setId($data->id);
        $emp->setfName($data->fName);
        $emp->setlName($data->lName);
        $emp->setphoneNo($data->phoneNo);
        $emp->setEmail($data->email);
        $emp->setPassword($data->password);
        $emp->setCompanyCode($data->companyCode);

        return $emp;
    }
    

    static public function getEmployers() {

        self::updateEmployers();

        return self::convertToStd(self::$employers);

    }
    
    
    static public function addEmployer($data) {

        self::updateEmployers();
        
        $emp = self::createEmployerObj($data);
        array_push(self::$employers, $emp);

        self::updateCSV();
    }


    static public function editEmployer($input) {

        self::updateEmployers();

        $emp = self::createEmployerObj($input);
        $i = 0;
        foreach(self::$employers as $employer) {
            if($employer->getId() == $emp->getId()) {

                self::$employers[$i] = $emp;
            break;
            
            }

            ++$i;
        }

        self::updateCSV();



    }


    static public function deleteEmployer($input) { 

        self::updateEmployers();

        $emp = self::createEmployerObj($input);

        $i = 0;
        foreach(self::$employers as $employer) {
            if($employer->getId() == $emp->getId()) {

                array_splice(self::$employers, $i, 1);
            break;
            
            }

            ++$i;
        }

        self::updateCSV();

        
    }


    public static function updateCSV() {

        $csvStr = "id,First_Name,Last_Name,Email,PhoneNumber,Company Code,Password";

        foreach(self::$employers as $person) {
            $csvStr .= "\n".
            $person->getId().",".
            $person->getFName().",".
            $person->getLName().",".
            $person->getEmail().",".
            $person->getPhoneNo().",".
            $person->getCompanyCode().",".
            $person->getPassword();

            FileService::writeFile(DATA_FILE, $csvStr);

        }
    }

}
?>