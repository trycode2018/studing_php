<?php

namespace Source\Related;

class Adress{

    private $street;
    private $complement;
    private $number;

    public function __construct($street,$complement,$number)
    {
        $this->street = $street;
        $this->complement = $complement;
        $this->number = $number;
    }

    

}