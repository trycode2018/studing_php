<?php 

    namespace Source\Interpretation;

    class User{
      private  $firstName ;
      private $lastName;
      private $email;

      public function __construct(string $firstName,string $lastName,string $email)
      {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
      }

      public function setFirstName(string $firstName){
        $this->firstName = $firstName;
      }
      public function getFirstName(){return $this->firstName;}

      public function setLastName(string $lastName){
        $this->lastName = $lastName;
      }
      public function getLastName(){return $this->lastName;}

      public function setEmail(string $email){
        $this->email = $email;
      }
      public function getEmail(){return $this->email;}


    }
