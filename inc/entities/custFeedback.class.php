<?php


class Feedback{
    private string $name;
    private string $email;
    private string $message;

    //getters
    public function getName(){
     return $this->name;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getMsg(){
        return $this->message;
    }
    //setters
    public function setName(string $n){
        $this->name = $n;
    }
    public function setEmail(string $e){
        $this->email = $e;
    }
    public function setMsg(string $m){
        $this->message = $m;
    }

}
?>