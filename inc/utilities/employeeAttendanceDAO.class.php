<?php

class Employee_Attendance{

    private static $attendance = array();
    private static $_db;

    public static function initialize() {
        self::$_db = new PDOService("EmployeeAttendance");

    }

    static public function convertToStd($dataToConvert) {
        
        $employerStd = array();

        if(is_array($dataToConvert)) {

            if(!empty($dataToConvert)) {
            
              
                foreach($dataToConvert as $att) {
                    $emp = new stdClass;

                    $emp->id = $att->getId();
                    $emp->date = $att->getDate();
                    $emp->present = $att->getPresent();
                    $emp->employee_id = $att->getEmployeeId();
                    
                    $attendance[] = $emp;

                    
                }
                    return $attendance;
            
            }
        }

        else {

            $emp = new stdClass;

            $emp->id = $att->getId();
            $emp->date = $att->getDate();
            $emp->present = $att->getPresent();
            $emp->employee_id = $att->getEmployeeId();
            

            return $emp;
        }


    }


    static public function createAttendanceObj($data) {


        $att = new EmployeeAttendance;

        $att->setId($data->id);
        $att->setDate($data->date);
        $att->setPresent($data->present);
        $att->setEmployeeId($data->employee_id);
        

        return $att;
    }
    

    static public function getAttendance() {

        $sql = "SELECT * FROM attendance;";

            //Query
            self::$_db->query($sql);

            //Execute
            self::$_db->execute();

            //Return Results
            return self::convertToStd(self::$_db->resultSet());

    }

   
    public static function addAttendance(EmployeeAttendance $p) {

        $sql = "INSERT INTO attendance (id, date, present, employee_id)
                        VALUES (:id, :date, :present, :emplyId);";
        

        self::$_db->query($sql);

        self::$_db->bind(":id", $p->getId());
        self::$_db->bind(":date", $p->getDate());
        self::$_db->bind(":present", $p->getPresent());
        self::$_db->bind(":emplyId", $p->getEmployeeId());


        self::$_db->execute();

        
    }


    // static public function editEmployer(Employer $p) {

    //     $sql = "UPDATE att 
    //             SET first_name = :fName, last_name= :lName, email = :email, 
    //                 phone_number = :phoneNo, company_code = :companyCode, password = :password
    //                 WHERE id = :id";

    //     self::$_db->query($sql);

    //     self::$_db->bind(":id", $p->getId());
    //     self::$_db->bind(":fName", $p->getFName());
    //     self::$_db->bind(":lName", $p->getLName());
    //     self::$_db->bind(":email", $p->getEmail());
    //     self::$_db->bind(":phoneNo", $p->getPhoneNo());
    //     self::$_db->bind(":companyCode", $p->getCompanyCode());
    //     self::$_db->bind(":password", $p->getPassword());


    //     self::$_db->execute();

    // }


    // static public function deleteEmployer(Employer $p) { 

    //     $sql = "DELETE FROM att 
    //             WHERE id = :id";

    //     self::$_db->query($sql);

    //     self::$_db->bind(":id", $p->getId());

    //     self::$_db->execute();

        
    // }
}


?>