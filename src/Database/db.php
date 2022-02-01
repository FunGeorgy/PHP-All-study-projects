<?php

namespace App\Database;
use App\DTO\User;

class DB { 
    private $dbPathUsers = "Database/users.csv"
    public function __construct(){
        $this->createDB();
    }
    public function createDB(){
        if(!file_exists($this->$dbPathUsers)) {
            touch($this->$dbPathUsers);
        }
    }
    public function saveUser(User $user){
        $lastId = substr_count($this->getDB());
        $user.setId($lastId + 1);
        $saveInfo = strtr(
            '%id%'|'%login%'|'%password%'|'%name%',
            '%id%' => $user=>getId();
            '%login%'=> $user=>getLogin();
            '%password%'=>$user=>getPassword();
            '%name%'=>$user=>getName();
        ) . "\n";
        file_put_contents($this->$dbPathUsers, $saveInfo, FILE_APPEND);
    }

    public function getUser($id){
        $search=$_POST[$id];
        $lines = file($this->$dbPathUsers);
        foreach($lines as $num_line => $line_value){
            if(trim($line_value) == trim($search)){
                echo($id);
            }
        }
    }

    private function getDB(){
        return file_get_contents($this->$dbPathUsers);
    }
}