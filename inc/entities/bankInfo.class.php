<?php


class BankInfo {

    private int $id;
    private $account_number;
    private $transit_number;
    private $institute_number;
    private int $employee_id;


    public function setId(int $id) {
        $this->id = $id;
    }

    public function setAC(string $ac) {
        $this->account_number = $ac;
    }

    public function setTN(string $tn) {
        $this->transit_number = $tn;

    }

    public function setIN(string $in) {
        $this->institute_number = $in;
    }

    public function setEmployeeId(int $id) {
        $this->employee_id = $id;
    }


    //getters:
    public function getId() {
        return $this->id;

    }

    public function getAC() {
        return $this->account_number;
    }

    public function getTN() {
        return $this->transit_number;
    }

    public function getIN() {
        return $this->institute_number;
    }

    public function getEmployeeId() {
        return $this->employee_id;
    }


}



?>