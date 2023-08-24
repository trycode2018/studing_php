<?php

class User{

    public $firstName;
    public $lastName;
    public $email;

    public function getFirstName(){
        return $this->firstName;
    }
    public function setFirstName($firstName){
        $this->firstName = filter_var($firstName,FILTER_SANITIZE_STRIPPED);
    }

    public function setLastName(){
        return $this->lastName;
    }
    public function getLastName($lastName){
        $this->lastName = filter_var($lastName,FILTER_SANITIZE_STRIPPED);
    }

    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            return false;
        }
    }
    
}




