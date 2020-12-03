<?php

class Shift_info {
    private static $_db;

    static function initialize(){
        self::$_db = new PDOService("ShiftInfo");
    }

    static function getDetails() {
        $sql = "SELECT * FROM shift_details";

        self::$_db->query($sql);

        self::$_db->execute();

        return self::convertToStd(self::$_db->resultSet());
    }

    static function addDetail(ShiftInfo $sn){
        $sql = "INSERT into shift_details (id, date, hours, employee_id) VALUES (:id, :date, :hrs, :emp)";
        self::$_db-> query($sql);

        self::$_db->bind(":id", $sn->getId());
        self::$_db->bind(":date", $sn->getDate());
        self::$_db->bind(":hrs", $sn->getHrs());
        self::$_db->bind(":emp", $sn->getEmployeeId());
        
        self::$_db->execute();
        }

    static public function delete(ShiftInfo $sn){
        //$sql = "DELETE FROM shift_details WHERE date = :date and hours = :hrs and employee_id = :emp and id = :id";

        $sql = "DELETE FROM shift_details WHERE id = :id";

        self::$_db->query($sql);

        self::$_db->bind(":id", $sn->getId());

        // self::$_db->bind(":date", $sn->getDate());
        // self::$_db->bind(":hrs", $sn->getHrs());
        // self::$_db->bind(":emp", $sn->getEmployeeId());
        
        self::$_db->execute();
    }

    static public function convertToStd($dataToConvert) {
        $detailStd = array();
        if(is_array($dataToConvert)) {
            if(!empty($dataToConvert)) {
                foreach ($dataToConvert as $data) {
                    $emp = new stdClass;
                    $emp->id = $data->getId();
                    $emp->date = $data->getDate();
                    $emp->hours = $data->getHrs();
                    $emp->employee_id = $data->getEmployeeId();

                    $detailStd[] = $emp;
                }
                return $detailStd;
            }
        }
        else    {
            $emp = new stdClass;
            
            $emp->id = $data->getId();
            $emp->date = $data->getDate();
            $emp->hours = $data->getHrs();
            $emp->employee_id = $data->getEmployeeId();

            return $emp;


        }
    }

    static public function createObj($dataToConvert) {
        $emp = new ShiftInfo;

        $emp->setId($dataToConvert->id);
        $emp->setDate($dataToConvert->date);
        $emp->setHrs($dataToConvert->hours);
        $emp->setEmployeeId($dataToConvert->employee_id);

        return $emp;
    }

}
?>