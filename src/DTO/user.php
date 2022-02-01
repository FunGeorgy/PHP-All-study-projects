<?php

namespace App\DTO;

class User { 
    /**
    *  @var integer 
    */
    private $id;
    /**
    *  @var string 
    */
    private $login;
    /**
    *  @var string 
    */
    private $password;
    /**
    *  @var string 
    */
    private $name;

    public function setId(integer $id){
        $this->id = $id;
    }

    public function getId(): integer{
        return $this->id;
    }

    public function setLogin(string $login){
        $this->login = $login;
    }

    public function getLogin(): string{
        return $this->login;
    }

    public function setPassword(string $password){
        $this->password = md5($password);
    }

    public function getPassword(): string{
        return $this->password;
    }

    public function setName(string $name){
        $this->name = $name;
    }

    public function getName(): string{
        return $this->name;
    }
}

$user = new User();

$user->setName('Ivan');

echo $user->getName();