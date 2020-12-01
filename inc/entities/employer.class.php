<?php


class Employer {

    private int $id;
    private string $first_name;
    private string $last_name;
    private string $email;
    private int $phone_number;
    private string $company_code;
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
        return $this->first_name;
    }
    
    public function getLName() {
        return $this->last_name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPhoneNo() {
        return $this->phone_number;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getCompanyCode() {
        return $this->company_code;
    }

    // setters

    public function  setId(int $n) {
        $this->id = $n;
    }
    public function setfName(string $fN) {
        $this->first_name = $fN;
    }

    public function setlName(string $lN) {
        $this->last_name = $lN;
    }
    public function setEmail(string $email) {
        $this->email = $email;
    }
    public function setphoneNo(string $num) {
        $this->phone_number = $num;
    }
    public function setCompanyCode(string $cCode) {
        $this->company_code = $cCode;
    }

    public function setPassword(string $pas) {
        $this->password = $pas;
    }

}

?>