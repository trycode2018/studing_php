<?php

namespace Source\Models;

use Source\Database\Connect;
use stdClass;

abstract class Model {

    /** 
     * @var object|null
    */
    protected $data;
    
    /** @var string|null */
    protected $fail;

    /** @var string|null */
    protected $message;

    /** @return null|object */
    public function data():object
    {
        return $this->data;
    }
    /** @return \PDOException */
    public function fail(){
        return $this->fail;
    }
    /** @return string|null */
    public function message(){
        return $this->message;
    }

    public function __set($name, $value)
    {
        if(empty($this->data)){
            $this->data = new stdClass();
        }       
        $this->data->$name = $value;
    }
    public function __get($name)
    {
        return ($this->data->$name??null);
    }
    public function __isset($name)
    {
        return isset($this->data->$name);
    }
    
    protected function create(string $entity,array $data)
    {
       try{
        $columns = implode(", ",array_keys($data));
        $values = ":".implode(", :",array_values($data));

        $stmt = Connect::getInstance()->prepare("INSERT INTO {$entity} ({$columns}) VALUES ({$values});");
        $stmt->execute($this->filter($data));

        return Connect::getInstance()->lastInsertId();
       }catch(\PDOException $exception){
        $this->message = $exception;
        return null;
       }
    }

    protected function read(string $select, $paramns=null)
    {
        try
        {
            $stmt = Connect::getInstance()->prepare($select);

            if($paramns){
                parse_str($paramns,$paramns);

                foreach($paramns as $key=>$value)
                {
                    $type = (is_numeric($value)?\PDO::PARAM_INT:\PDO::PARAM_STR);
                    $stmt->bindValue(":{$key}",$value,$type);
                }
            }
            $stmt->execute();
            return $stmt;

        }catch(\PDOException $exception)
        {
            $this->fail = $exception;
            return null;
        }
    }

    protected function update(string $entity,array $data,string $terms,string $params)
    {
        try{
            $dataSet = [];
            foreach($data as $bind=>$value){
                $dataSet[] = "{$bind}=:{$bind}";
            }
            $dataSet = implode(", ",$dataSet);
            parse_str($params,$params);

            $stmt = Connect::getInstance()->prepare("UPDATE {$entity} SET {$dataSet}");
            $stmt->execute($this->filter(array_merge($data,$params)));
            
            return ($stmt->rowCount()??1);

        }catch(\PDOException $exception){
            $this->message = "Ocorreu um erro ao actualizar dados do usuario";
            return null;
        }
    }

    protected function delete(string $entity,string $terms,string $params)
    {
        try{

            $stmt = Connect::getInstance()->prepare("DELETE FROM {$entity} WHERE {$terms}");
            parse_str($params,$params);
            $stmt->execute($params);
        }catch(\PDOException $exception){
            $this->message = $exception;
            return null;
        }
    }

    protected function safe()
    {
        $safe = (array)$this->data;
        $unsafe = ['id','created_at','updated_at'];
        foreach($unsafe as $unset){
            unset($safe[$unset]);
        }
        return $safe;
    }

    private function filter(array $data)
    {
        $filter = [];
        foreach($data as $key=>$value){
            $filter[$key] = (is_null($value)?null:filter_var($value,FILTER_SANITIZE_SPECIAL_CHARS));
        }
        return $filter;
    }


}