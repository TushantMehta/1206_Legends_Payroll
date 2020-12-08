<?php


class TaxDetails {

    private int $tax_Id;
    private $sin_number;
    private $employee_address;
    private int $salary_generated;
    private int $employee_id;


    //setters:
    public function setTaxId(int $id) {
        $this->tax_Id = $id;
    }

    public function setSinNumber(string $SinNumber){
        $this->sin_number= $SinNumber;
    }

    public function setEmployeeAddress(string $EmployeeAddress){
        $this->employee_address = $EmployeeAddress;
    }

    public function setSalaryGenerated(int $SalaryGenerated){
        $this->salary_generated = $SalaryGenerated;
    }

    public function setEmployeeId(int $id) {
        $this->employee_id = $id;
    }


    //getters:
    public function getTaxId() {
        return $this->tax_Id;
    }

    public function getSinNumber(){
        return $this->sin_number;
    }
    public function getEmployeeAddress(){
        return $this->employee_address;
    }

    public function getSalaryGenerated(){
        return $this->salary_generated;
    }

    public function getEmployeeId() {
        return $this->employee_id;
    }


}



?>