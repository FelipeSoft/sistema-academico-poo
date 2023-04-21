<?php
require_once("C:/xampp/htdocs/sistema-academico-poo/models/User.php");
require_once("C:/xampp/htdocs/sistema-academico-poo/dao/UserDataAccessObjectMySql.php");
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
        $dao = new UserDataAccessObjectMySql($this->pdo);
        $user_access = $dao->getUserByAuthorization($this->email, $this->access);
        $email_exists = $dao->checkIfEmailExists($this->email);

        if($user_access !== null && $email_exists){
            return (password_verify($this->password, $user_access->getUserAttribute("password"))) ? true : false;  
        }
        return false;
    }
}