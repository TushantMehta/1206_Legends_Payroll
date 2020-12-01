<?php

class ShiftInfo {
    private int $id;
    private $date;
    private  $hours;
    private $employee_id;

    //setters:

    public function setId(int $id) {
        $this->id = $id;
    }

    public function setDate( $dt)
    {
        $this->date = $dt;
    }

    public function setHrs( $hrs)
    {
        $this->hours = $hrs;
    }

    public function setEmployeeId( $id) {
        $this->employee_id = $id;
    }



      //getters:
    public function getId() {
        return $this->id;
    }

    public function getDate(){
        return $this->date;
    }

    public function getHrs(){
        return $this->hours;
    }

    public function getEmployeeId() {
        return $this->employee_id;
    }


}