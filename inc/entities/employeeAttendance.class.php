<?php


class EmployeeAttendance {

    private $id;
    private $date;
    private $present;
    private $employee_id;


    public function setId( $id) {
        $this->id = $id;
    }

    public function setDate($ac) {
        $this->date = $ac;
    }

    public function setPresent( $tn) {
        $this->present = $tn;

    }

    public function setEmployeeId($id) {
        $this->employee_id = $id;
    }


    //getters:
    public function getId() {
        return $this->id;

    }

    public function getDate() {
        return $this->date;
    }

    public function getPresent() {
        return $this->present;
    }



    public function getEmployeeId() {
        return $this->employee_id;
    }


}



?>