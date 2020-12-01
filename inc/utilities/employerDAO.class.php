<?php

class EmployerDAO {

    static private $employers = array();
    
    private static $_db;

    public static function intialize() {
        self::$_db = new PDOService("Employer");
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

        $sql = "SELECT * FROM employer;";

            //Query
            self::$_db->query($sql);

            //Execute
            self::$_db->execute();

            //Return Results
            return self::convertToStd(self::$_db->resultSet());

    }

    public static function getEmployer(int $id)   {
            

        $stdPerson = new stdClass;
        $sql = "SELECT * FROM employer  WHERE id = :id";

        // Query 
        self::$_db->query($sql);

        //Bind
        self::$_db->bind(":id", $id);

        //Execute
        self::$_db->execute();

        //return 
        $stdPerson =  self::convertToStd(self::$_db->singleResult());

        if ( empty($stdPerson)) {
            return array("message"=>"We couldnt find person $id");
        } else {
            return $stdPerson;
        }
    }
    
    
    public static function addEmployer(Employer $p) {

        $sql = "INSERT INTO employer (id, first_name, last_name, 
                    email, phone_number, company_code, password)
                        VALUES (:id, :fName, :lName, :email, :phoneNo, 
                                :companyCode, :password)";
        

        self::$_db->query($sql);

        self::$_db->bind(":id", $p->getId());
        self::$_db->bind(":fName", $p->getFName());
        self::$_db->bind(":lName", $p->getLName());
        self::$_db->bind(":email", $p->getEmail());
        self::$_db->bind(":phoneNo", $p->getPhoneNo());
        self::$_db->bind(":companyCode", $p->getCompanyCode());
        self::$_db->bind(":password", $p->getPassword());


        self::$_db->execute();

        
    }


    static public function editEmployer(Employer $p) {

        $sql = "UPDATE employer 
                SET first_name = :fName, last_name= :lName, email = :email, 
                    phone_number = :phoneNo, company_code = :companyCode, password = :password
                    WHERE id = :id";

        self::$_db->query($sql);

        self::$_db->bind(":id", $p->getId());
        self::$_db->bind(":fName", $p->getFName());
        self::$_db->bind(":lName", $p->getLName());
        self::$_db->bind(":email", $p->getEmail());
        self::$_db->bind(":phoneNo", $p->getPhoneNo());
        self::$_db->bind(":companyCode", $p->getCompanyCode());
        self::$_db->bind(":password", $p->getPassword());


        self::$_db->execute();

    }


    static public function deleteEmployer(Employer $p) { 

        $sql = "DELETE FROM employer 
                WHERE id = :id";

        self::$_db->query($sql);

        self::$_db->bind(":id", $p->getId());

        self::$_db->execute();

        
    }


}
?>