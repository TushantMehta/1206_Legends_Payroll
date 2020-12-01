<?php

class EmployeeDAO {

    static private $employees = array();
    
    
    
    static public function updateEmployees() {

        $content = FileService::readFile(EMPLOYEE_DATA_FILE);
        EmployeeParser::ParseEmployees($content);
        self::$employees = EmployeeParser::$employees;


    }

    static public function convertToStd($dataToConvert) {
        
        $employeeStd = array();

        if(is_array($dataToConvert)) {

            if(!empty($dataToConvert)) {
            
              
                foreach($dataToConvert as $employee) {
                    $emp = new stdClass;

                    $emp->id = $employee->getId();
                    $emp->fName = $employee->getFName();
                    $emp->lName = $employee->getlName();
                    $emp->phoneNo = $employee->getPhoneNo();
                    $emp->companyCode = $employee->getCompanyCode();
                    $emp->password = $employee->getPassword();
                    $emp->email = $employee->getEmail();
                    
                    $employeeStd[] = $emp;

                    
                }
                    return $employeeStd;
            
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


    static public function createEmployeeObj($data) {


        $emp = new Employee;

        $emp->setId($data->id);
        $emp->setfName($data->fName);
        $emp->setlName($data->lName);
        $emp->setphoneNo($data->phoneNo);
        $emp->setEmail($data->email);
        $emp->setPassword($data->password);
        $emp->setCompanyCode($data->companyCode);

        return $emp;
    }
    

    static public function getEmployees() {

        self::updateEmployees();

        return self::convertToStd(self::$employees);

    }
    
    
    static public function add_Employee($data) {

        self::updateEmployees();
        
        $emp = self::createEmployeeObj($data);
        array_push(self::$employees, $emp);

        self::updateCSV();
    }


    // static public function edit_Employee($input) {

    //     self::updateEmployees();

    //     $emp = self::createEmployeeObj($input);
    //     $i = 0;
    //     foreach(self::$employees as $employee) {
    //         if($employee->getId() == $emp->getId()) {

    //             self::$employees[$i] = $emp;
    //         break;
            
    //         }

    //         ++$i;
    //     }

    //     self::updateCSV();



    // }


    static public function delete_Employee($input) { 


        self::updateEmployees();


        $emp = self::createEmployeeObj($input);

        $i = 0;
        foreach(self::$employees as $employee) {
            if($employee->getId() == $emp->getId()) {

                array_splice(self::$employees, $i, 1);
            break;
            
            }

            ++$i;
        }

        self::updateCSV();

        
    }


    public static function updateCSV() {

        $csvStr = "id,First_Name,Last_Name,Email,PhoneNumber,Company Code,Password";

        foreach(self::$employees as $person) {
            $csvStr .= "\n".
            $person->getId().",".
            $person->getFName().",".
            $person->getLName().",".
            $person->getEmail().",".
            $person->getPhoneNo().",".
            $person->getCompanyCode().",".
            $person->getPassword();

            FileService::writeFile(EMPLOYEE_DATA_FILE, $csvStr);

        }
    }

}
?>