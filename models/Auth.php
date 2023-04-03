<?php
require_once("C:/xampp/htdocs/sistema-academico-poo/models/Person.php");
require_once("C:/xampp/htdocs/sistema-academico-poo/dao/PersonDataAccessObjectMySql.php");
class Auth{
    private PDO $pdo;
    private string $email;
    private string $password;
    private int $access;
    public function __construct(PDO $pdo, string $email, string $password, int $access){
        $this->pdo = $pdo;
        $this->email = $email;
        $this->password = $password;
        $this->access = $access;
    }

    public function check(){
        $dao = new PersonDataAccessObjectMySql($this->pdo);
        $person = $dao->getPersonByEmail($this->email);
        $person_access = $dao->getPersonByAccessLevel($this->email, $this->access);

        if($person !== null && $person_access !== null){
            if(password_verify($this->password, $person->getPersonAttribute("password"))){
                return true;
            } else {
                return false;
            }
        }
        return false;
    }
}