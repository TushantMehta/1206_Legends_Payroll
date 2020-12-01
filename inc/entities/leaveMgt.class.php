<?php


class LeaveMgt {

    private int $leave_Id;
    private $leave_Type;
    private $date_To;
    private $date_From;
    private $description;
    private $status;
    private int $employee_id;


    //setters:
    public function setLeaveId(int $id) {
        $this->leave_Id = $id;
    }

    public function setLeaveType(string $leaveType){
        $this ->leave_Type = $leaveType;
    }

    public function setDateTo(string $dateTo) {
        $this->date_To = $dateTo;
    }

    public function setDateFrom(string $dateFrom) {
        $this->date_From = $dateFrom;

    }

    public function setDescription(string $description) {
        $this->description = $description;
    }

    public function setStatus(string $status){
        $this->status = $status;
    }

    public function setEmployeeId(int $id) {
        $this->employee_id = $id;
    }


    //getters:
    public function getLeaveId() {
        return $this->leave_Id;

    }

    public function getLeaveType() {
        return $this->leave_Type;
    }

    public function getDateTo() {
        return $this->date_To;
    }

    public function getDateFrom() {
        return $this->date_From;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getStatus(){
        return $this->status;
    }
    public function getEmployeeId() {
        return $this->employee_id;
    }


}



?>