<?php

namespace Source\Related;


use Source\Related\Adress;

class Company{
    private $company;

    /**
     * @var Adress
    */
    private $adress;


    private $team;
    private $products;


    public function bootCompany($company,$adress){
        $this->company = $company;
        $this->adress = $adress;
    }

    public function boot($company, \Source\Related\Adress $adress){
        $this->company = $company;
        $this->adress = $adress;
    }

    public function addProduct(\Source\Related\Product $product){
        $this->products[] = $product;
    }
    

    public function setCompany($company){
        $this->company = $company;
    }
    public function getCompany(){return $this->company;}

    public function setAdress($adress) 
    {
        $this->adress=$adress;
    }
    public function getAdress(){return $this->adress;}

    public function setTeam($team){
        $this->team = $team;
    }
    public function getTeam(){
        return $this->team;
    }

    public function setProducts($products){
        $this->products = $products;
    }
    public function getProducts(){
        return $this->products;
    }
    
}