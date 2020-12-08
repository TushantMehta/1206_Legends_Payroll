<?php

class SalaryInfo    {

    private int $paymentID;
    private $currency;
    private $wageType;
    private float $amount;
    private int $employeeID;
    private int $employerID;
    //setter

    public function setId(int $id)  {
        $this->paymentID = $id;
    }

    public function setCurrency(string $curr){
        $this->currency = $curr;
    }

    public function setWageType(string $type){
        $this->wageType = $type;        
    }

    public function setAmount(float $price){
        $this->amount = $price;
    }

    public function setEmpID(int $empID){
        $this->employeeID = $empID;
    }

    public function setEmployerID(int $boss){
        $this->employerID = $boss;
    }

    //getters

    public function getId()  {
        return $this->paymentID;
    }

    public function getCurrency(){
        return $this->currency;
    }

    public function getWageType(){
        return $this->wageType;
    }

    public function getAmount(){
        return $this->amount;
    }

    public function getEmpID(){
        return $this->employeeID;
    }
    public function getEmployerID(){
        return $this->employerID;
    }


}