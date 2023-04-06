<?php
require_once("C:/xampp/htdocs/sistema-academico-poo/models/User.php");
class UserDataAccessObjectMySql{
    private $pdo;
    public function __construct($driver){
        $this->pdo = $driver;
    }

    public function create(user $user){
        try{
            $sql = $this->pdo->prepare("INSERT INTO users (name, email, password, born_date, cpf, rg, access_level) 
            VALUES (:name, :email, :password, :born_date, :cpf, :rg, :access_level)");
            $sql->bindValue(":name", $user->getUserAttribute("name"));
            $sql->bindValue(":email", $user->getUserAttribute("email"));
            $sql->bindValue(":password", password_hash($user->getUserAttribute("password"), PASSWORD_DEFAULT));
            $sql->bindValue(":born_date", $user->getUserAttribute("born_date"));
            $sql->bindValue(":cpf", $user->getUserAttribute("cpf"));
            $sql->bindValue(":rg", $user->getUserAttribute("rg"));
            $sql->bindValue(":access_level", $user->getUserAttribute("access_level"));
            $sql->execute();
        } catch(PDOException $error) {
            $error->getMessage();
        }
    }

    public function getUserByAuthorization(string $email, int $access_level){
        try{
            $sql = $this->pdo->prepare("SELECT * FROM users WHERE access_level = :access_level AND email = :email");
            $sql->bindValue(":access_level", $access_level);
            $sql->bindValue(":email", $email);
            $sql->execute();
    
            if($sql->rowCount() > 0){
                $data = $sql->fetch(PDO::FETCH_ASSOC);
                $user = new user();
                $user->setUserAttribute($data);
    
                return $user;
            }
            return null;
        } catch(PDOException $error){
            echo "Error: " . $error->getMessage();
        }
    }
}