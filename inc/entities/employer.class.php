<?php


class Employer {

    private int $id;
    private string $fName;
    private string $lName;
    private string $email;
    private string $phoneNo;
    private string $companyCode;
    private string $password;


    // public function __construct(
    //     // int $id,
    //     // string $fName, 
    //     // string $lName,
    //     // string $email,
    //     // string $phoneNo,
    //     // string $companyCode,
    //     // string $password
    
    // ) 
    // {
    //     $this->fName = $fName;
    //     $this->lName = $lName;
    //     $this->email = $email;
    //     $this->phoneNo = $phoneNo;
    //     $this->companyCode = $companyCode;
    //     $this->password = $password;
    // }



    // getters:

    public function getId() {
        return $this->id;
    }
    public function getFName() {
        return $this->fName;
    }
    
    public function getLName() {
        return $this->lName;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPhoneNo() {
        return $this->phoneNo;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getCompanyCode() {
        return $this->companyCode;
    }

    // setters

    public function  setId(int $n) {
        $this->id = $n;
    }
    public function setfName(string $fN) {
        $this->fName = $fN;
    }

    public function setlName(string $lN) {
        $this->lName = $lN;
    }
    public function setEmail(string $email) {
        $this->email = $email;
    }
    public function setphoneNo(string $num) {
        $this->phoneNo = $num;
    }
    public function setCompanyCode(string $cCode) {
        $this->companyCode = $cCode;
    }

    public function setPassword(string $pas) {
        $this->password = $pas;
    }

}

?>