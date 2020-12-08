<?php

class Tax_Details{

    private static $_db;

    static function initialize(){
        self::$_db = new PDOService("TaxDetails");
    }
    static function getDetail(){
        $sql = "SELECT * FROM tax_details";

        self::$_db->query($sql);

        self::$_db->execute();
        return self::convertToStd(self::$_db->resultSet());
    }

    static function addDetail(TaxDetails $td ){

        $sql ="INSERT INTO tax_details(tax_Id, employee_address,sin_number, salary_generated,  employee_id)
                    VALUES(:id, :employeeAddress, :sinNumber, :salaryGenerated,  :emp)";

        self::$_db->query($sql);

        self::$_db->bind(":id", $td->getTaxId());
        self::$_db->bind(":employeeAddress", $td->getEmployeeAddress());
        self::$_db->bind(":sinNumber", $td->getsinNumber());
        self::$_db->bind(":salaryGenerated", $td->getSalaryGenerated());
        self::$_db->bind(":emp", $td->getEmployeeId());

        self::$_db->execute();



    }

    

    static function updateDetail(TaxDetails $td){

    $sql = "UPDATE tax_details
                SET employee_address = :employeeAddress,
                    sin_number = :sinNumber,
                    salary_generated = :salaryGenerated
                    WHERE tax_Id = :id";
    
    self::$_db->query($sql);

    self::$_db->bind(":employeeAddress", $td->getEmployeeAddress());
    self::$_db->bind(":sinNumber", $td->getsinNumber());
    self::$_db->bind(":salaryGenerated", $td->getSalaryGenerated());
    self::$_db->bind(":id", $td->getTaxId());

    self::$_db->execute();

    }

    static public function deleteTaxDetails(TaxDetails $td){

    $sql = "DELETE FROM tax_details
                WHERE tax_Id = :id";

    self::$_db->query($sql);
    echo "tax id is : ", $td->getTaxId();
   // alert("inside delete");
    self::$_db->bind(":id", $td->getTaxId());

    self::$_db->execute();
    }

    static public function convertToStd($dataToConvert){

    $taxDetailsStd = array();

    if(is_array($dataToConvert)){

        if(!empty($dataToConvert)){


            foreach($dataToConvert as $taxDetails){
                $emp = new stdClass;

                $emp->tax_Id = $taxDetails->getTaxId();
                $emp->employee_address = $taxDetails->getEmployeeAddress();
                $emp->sin_number = $taxDetails->getSinNumber();
                $emp->salary_generated = $taxDetails->getSalaryGenerated();
                $emp->employee_id = $taxDetails->getEmployeeId();

                $taxDetailsStd[] = $emp;
            }

            return $taxDetailsStd;

        }
    }

    else{

        $emp = new stdClass;

        $emp->tax_Id = $taxDetails->getTaxId();
        $emp->employee_address = $taxDetails->getEmployeeAddress();
        $emp->sin_number = $taxDetails->getSinNumber();
        $emp->salary_generated = $taxDetails->getSalaryGenerated();
        $emp->employee_id = $taxDetails->getEmployeeId();

        return $emp;

        }

    }

    static public function createTaxDetailsObj($dataToConvert){


    $emp = new TaxDetails;

    $emp->setTaxId($dataToConvert->tax_Id);
    $emp->setEmployeeAddress($dataToConvert->employee_address);
    $emp->setSinNumber($dataToConvert->sin_number);
    $emp->setSalaryGenerated($dataToConvert->salary_generated);
    $emp->setEmployeeId($dataToConvert->employee_id);

    return $emp;

    }


}
?>