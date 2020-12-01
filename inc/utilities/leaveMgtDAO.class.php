<?php

class Leave_Mgt{

    private static $_db;

    static function initialize(){
        self::$_db = new PDOService("LeaveMgt");
    }
    static function getDetail(){
        $sql = "SELECT * FROM leave_Mgt";

        self::$_db->query($sql);

        self::$_db->execute();
        return self::convertToStd(self::$_db->resultSet());
    }

    static function addDetail(LeaveMgt $lm ){

        $sql ="INSERT INTO leave_Mgt(leave_Id, leave_Type, date_To, date_From, description, status, employee_id)
                    VALUES(:id, :leaveType, :dateTo, :dateFrom, :description, :status, :emp)";

        self::$_db->query($sql);

        self::$_db->bind(":id", $lm->getLeaveId());
        self::$_db->bind(":leaveType", $lm->getLeaveType());
        self::$_db->bind(":dateTo", $lm->getDateTo());
        self::$_db->bind(":dateFrom", $lm->getDateFrom());
        self::$_db->bind(":description", $lm->getDescription());
        self::$_db->bind(":status", $lm->getStatus());
        self::$_db->bind(":emp", $lm->getEmployeeId());

        self::$_db->execute();



    }

    static function updateDetail(LeaveMgt $lm){

    $sql = "UPDATE leave_Mgt
                SET leave_Type = :leaveType, date_To = :dateTo, date_From = :dateFrom, description = :description, status = :status
                    WHERE leave_Id = :id";
    
    self::$_db->query();

    self::$_db->bind(":leaveType", $lm->getLeaveType());
    self::$_db->bind(":dateTo", $lm->getDateTo());
    self::$_db->bind(":dateFrom", $lm->getDateFrom());
    self::$_db->bind(":description", $lm->getDescription());
    self::$_db->bind(":status", $lm->getStatus());
    self::$_db->bind(":id", $lm->getLeaveId());

    self::$_db->execute();

    }

    static public function deleteLeave(LeaveMgt $lm){

    $sql = "DELETE FROM leave_Mgt
                WHERE leave_Id = :id";

    self::$_db->query($sql);
    echo "leave id is : ", $lm->getLeaveId();
    self::$_db->bind(":id", $lm->getLeaveId());

    self::$_db->execute();
    }

    static public function convertToStd($dataToConvert){

    $leaveMgtStd = array();

    if(is_array($dataToConvert)){

        if(!empty($dataToConvert)){


            foreach($dataToConvert as $leaveMgt){
                $emp = new stdClass;

                $emp->leave_Id = $leaveMgt->getLeaveId();
                $emp->leave_Type = $leaveMgt->getLeaveType();
                $emp->date_To = $leaveMgt->getDateTo();
                $emp->date_From = $leaveMgt->getDateFrom();
                $emp->description = $leaveMgt->getDescription();
                $emp->status = $leaveMgt->getStatus();
                $emp->employee_id = $leaveMgt->getEmployeeId();

                $leaveMgtStd[] = $emp;
            }

            return $leaveMgtStd;

        }
    }

    else{

        $emp = new stdClass;

        $emp->leave_Id = $leaveMgt->getLeaveId();
        $emp->leave_Type = $leaveMgt->getLeaveType();
        $emp->date_To = $leaveMgt->getDateTo();
        $emp->date_From = $leaveMgt->getDateFrom();
        $emp->description = $leaveMgt->getDescription();
        $emp->status = $leaveMgt->getStatus();
        $emp->employee_id = $leaveMgt->getEmployeeId();

        return $emp;

        }

    }

    static public function createLeaveMgtObj($dataToConvert){


    $emp = new LeaveMgt;

    $emp->setLeaveId($dataToConvert->leave_Id);
    $emp->setLeaveType($dataToConvert->leave_Type);
    $emp->setDateTo($dataToConvert->date_To);
    $emp->setDateFrom($dataToConvert->date_From);
    $emp->setDescription($dataToConvert->description);
    $emp->setStatus($dataToConvert->status);
    $emp->setEmployeeId($dataToConvert->employee_id);

    return $emp;

    }


}
?>