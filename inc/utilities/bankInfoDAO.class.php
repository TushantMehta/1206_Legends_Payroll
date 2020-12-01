<?php 

class Bank_Info {

    private static $_db;

    static function initialize() {
        self::$_db = new PDOService("BankInfo");
    }


    static function getDetail() {
        $sql = "SELECT * FROM bank_detail";

        self::$_db->query($sql);

        self::$_db->execute();

        return self::convertToStd(self::$_db->resultSet());
    
    }

    static function addDetail(BankInfo $bn) {

        $sql = "INSERT INTO bank_detail (id, account_number, transit_number,
                    institute_number, employee_id)
                        VALUES (:id, :AC, :TN, :Itn, :emp)";

        self::$_db->query($sql);

        self::$_db->bind(":id", $bn->getId());
        self::$_db->bind(":AC", $bn->getAC());
        self::$_db->bind(":TN", $bn->getTN());
        self::$_db->bind(":Itn", $bn->getIN());
        self::$_db->bind(":emp", $bn->getEmployeeId());


        self::$_db->execute();
   
   
    }


    static public function updateDetail(BankInfo $bn) {

        $sql = "UPDATE bank_detail
                    SET account_number = :AC, transit_number = :TN, institute_number = :Itn
                        WHERE id = :id";

        self::$_db->query($sql);

        self::$_db->bind(":AC", $bn->getAC());
        self::$_db->bind(":TN", $bn->getTN());
        self::$_db->bind(":Itn", $bn->getIN());
        self::$_db->bind(":id", $bn->getId());

        self::$_db->execute();
    }


    static public function deleteBank(BankInfo $bn) {

        $sql = "DELETE FROM bank_detail 
                    WHERE id = :id";

        self::$_db->query($sql);
        self::$_db->bind(":id", $bn->getId());

        self::$_db->execute();
    }
    


    static public function convertToStd($dataToConvert) {
        
        $accountDetailStd = array();

        if(is_array($dataToConvert)) {

            if(!empty($dataToConvert)) {
            
              
                foreach($dataToConvert as $accountDetail) {
                    $emp = new stdClass;

                    $emp->id = $accountDetail->getId();
                    $emp->account_number = $accountDetail->getAC();
                    $emp->transit_number = $accountDetail->getTN();
                    $emp->institute_number = $accountDetail->getIN();
                    $emp->employee_id = $accountDetail->getEmployeeId();
                    
                    $accountDetailStd[] = $emp;

                    
                }
                    return $accountDetailStd;
            
            }
        }

        else {

            $emp = new stdClass;

            $emp->id = $accountDetail->getId();
            $emp->account_number = $accountDetail->getAC();
            $emp->transit_number = $accountDetail->getTN();
            $emp->institute_number = $accountDetail->getIN();
            $emp->employee_id = $accountDetail->getEmployeeId();

            return $emp;
        }


    }


    static public function createBankInfoObj($dataToConvert) {


        $emp = new BankInfo;

        $emp->setId($dataToConvert->id);
        $emp->setAC($dataToConvert->account_number);
        $emp->setTN($dataToConvert->transit_number);
        $emp->setIN($dataToConvert->institute_number);
        $emp->setEmployeeId($dataToConvert->employee_id);

        return $emp;
    }
    
}



?>