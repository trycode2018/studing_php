<?php

namespace Source\Models;

class User extends Model
{
    protected static $safe = ["id","created_at","update_at"];

    /** @var string entity database table */
    protected static $entity = "users";

    public function bootstrap($firstName,$lastName,$email,$document=null)
    {
        $this->first_name = $firstName;
        $this->last_name = $lastName;
        $this->email = $email;
        $this->document = $document;
        return $this;
    }

    public function load(int $id,$columns ="*"){

        $load = $this->read("SELECT {$columns} FROM ".self::$entity." WHERE id=:id","id={$id}");
        if($this->fail() || !$load->rowCount()){
            $this->message = "Usuario nao encontrado!";
            return null;
        }
        return $load->fetchObject(__CLASS__);
    }

    public function find(string $email,$columns="*"){
        $find = $this->read("SELECT {$columns} FROM ".self::$entity." WHERE email=:email",
        "email={$email}");
        if($this->fail() || !$find->rowCount()){
            $this->message = "Usuario nao encontrado ao email";
            return null;
        }
        return $find->fetchObject(__CLASS__);
    }

    public function all(int $limit=30,int $offset=0,$columns="*"){
        $all = $this->read("SELECT {$columns} FROM ".self::$entity." LIMIT :limit OFFSET :offset",
        "limit={$limit}&offset={$offset}");
        if($this->fail() || !$all->rowCount()){
            $this->message = "Nao foram encontrados nenhum usuario";
            return null;
        }
        return $all->fetchAll(\PDO::FETCH_CLASS,__CLASS__);
    }

    public function save(){
        if(!$this->required()){
            return null;
        }

        /** User Update */
        if(!empty($this->id)){
            $userId = $this->id;
        }

        /** User Create */
        if(empty($this->id)){
            if($this->find($this->email)){
                $this->message = "O email informado ja existe";
            return null;
            }
            $userId = $this->create(self::$entity,$this->safe());
            if($this->fail()){
                $this->message = "Erro ao cadastrar";
            }
            $this->message = "Cadastro realizado com sucesso";
        }
        $this->data = $this->read("SELECT * FROM users WHERE id=:id","id={$userId}");
        return $this;
    }
    public function destroy(){
        if(!empty($this->id)){
            $this->delete(self::$entity,"id=:id","id={$this->id}");
        }

        if($this->fail()){
            $this->message = "Nao foi possivel remover usuario";
            return null;
        }

        $this->message = "Usuario removido com sucesso !";
        $this->data =null;
        return $this;
    }

    private function required(){
        if(empty($this->first_name) || empty($this->last_name) || empty($this->email)){
            $this->message = "Nome, Sobre nome e email sao obrigatorios!";
            return false;
        }

        if(!filter_var($this->email,FILTER_VALIDATE_EMAIL)){
            $this->message = "O email informado parece invalido";
            return false;
        }

        return true;
    }
}