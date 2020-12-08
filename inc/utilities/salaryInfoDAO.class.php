<?php
class Salary_Info {
    private static $_db;
    static function initialize(){
        self::$_db = new PDOService("SalaryInfo");
    }

    static function getDetails(){
        $sql = 'SELECT * FROM salary_details';
        
        self::$_db->query($sql);
        
        self::$_db->execute();

        return self::convertToStd(self::$_db->resultSet());
    }

    static function addDetail(SalaryInfo $sl){
        $sql = "INSERT INTO salary_details (paymentID, currency, wageType, amount, employeeID, employerID) VALUES (:pID, :curr, :wTyp, :amt, :eID, :bossID)";

        self::$_db->query($sql);

        self::$_db->bind(":pID", $sl->getId());
        self::$_db->bind(":curr", $sl->getCurrency());
        self::$_db->bind(":wTyp", $sl->getWageType());
        self::$_db->bind(":amt", $sl->getAmount());
        self::$_db->bind(":eID", $sl->getEmpID());
        self::$_db->bind(":bossID", $sl->getEmployerID());

        self::$_db->execute();
        
    }

    static public function updateDetail(SalaryInfo $sl){

        $sql = "UPDATE salary_details 
                    SET paymentID = :pID, currency = :curr, wageType = :wTyp, amount = :amt, employeeID = :eID, employerId = :bossID
                        WHERE paymentID = :pID";

        self::$_db->query($sql);

        self::$_db->bind(":pID", $sl->getId());
        self::$_db->bind(":curr", $sl->getCurrency());
        self::$_db->bind(":wTyp", $sl->getWageType());
        self::$_db->bind(":amt", $sl->getAmount());
        self::$_db->bind(":eID", $sl->getEmpID());
        self::$_db->bind(":bossID", $sl->getEmployerID());
        
        

        self::$_db->execute();
        
    }

    static public function deleteDetail(SalaryInfo $sl) {
        $sql = "DELETE FROM salary_details WHERE paymentID = :pID";

        self::$_db->query($sql);
        self::$_db->bind(":pID", $sl->getId());
        self::$_db->execute();

    }

    static public function convertToStd($dataToConvert) {
        $salaryDetailStd = array();

        if(is_array($dataToConvert))    {
            if(!empty($dataToConvert))  {
                foreach ($dataToConvert as $info){
                    $emp = new stdClass;

                    $emp->paymentID = $info->getId();
                    $emp->currency = $info->getCurrency();
                    $emp->wageType = $info->getWageType();
                    $emp->amount = $info->getAmount();
                    $emp->employeeID = $info->getEmpID();
                    $emp->employerID = $info->getEmployerID();

                    $salaryDetailStd[] = $emp;
                }
                return $salaryDetailStd;
            }
        }
        else{
            $emp = new stdClass;

            $emp->paymentID = $info->getId();
            $emp->currency = $info->getCurrency();
            $emp->wageType = $info->getWageType();
            $emp->amount = $info->getAmount();
            $emp->employeeID = $info->getEmpID();
            $emp->employerID = $info->getEmployerID();

            return $emp;
        }
    }

    static public function createObj($dataToConvert)    {
        
        $emp = new SalaryInfo;

        $emp->setId($dataToConvert->paymentID);
        $emp->setCurrency($dataToConvert->currency);
        $emp->setWageType($dataToConvert->wageType);
        $emp->setAmount($dataToConvert->amount);
        $emp->setEmpID($dataToConvert->employeeID);
        $emp->setEmployerID($dataToConvert ->employerID);

        return $emp;
    }
}
?>