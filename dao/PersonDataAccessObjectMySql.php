<?php
require_once("C:/xampp/htdocs/sistema-academico-poo/models/Person.php");
class PersonDataAccessObjectMySql{
    private $pdo;
    public function __construct($driver){
        $this->pdo = $driver;
    }

    public function create(Person $person){
        try{
            $sql = $this->pdo->prepare("INSERT INTO persons (name, email, password, born_date, cpf, rg, access_level) 
            VALUES (:name, :email, :password, :born_date, :cpf, :rg, :access_level)");
            $sql->bindValue(":name", $person->getPersonAttribute("name"));
            $sql->bindValue(":email", $person->getPersonAttribute("email"));
            $sql->bindValue(":password", password_hash($person->getPersonAttribute("password"), PASSWORD_DEFAULT));
            $sql->bindValue(":born_date", $person->getPersonAttribute("born_date"));
            $sql->bindValue(":cpf", $person->getPersonAttribute("cpf"));
            $sql->bindValue(":rg", $person->getPersonAttribute("rg"));
            $sql->bindValue(":access_level", $person->getPersonAttribute("access_level"));
            $sql->execute();
        } catch(PDOException $error) {
            $error->getMessage();
        }
    }

    public function getPersonByEmail(string $email){
        try{
            $sql = $this->pdo->prepare("SELECT * FROM persons WHERE email = :email");
            $sql->bindValue(":email", $email);
            $sql->execute();
    
            if($sql->rowCount() > 0){
                $data = $sql->fetch(PDO::FETCH_ASSOC);
                $person = new Person();
                $person->setPersonAttribute($data);
    
                return $person;
            }
            return null;
        } catch(PDOException $error){
            $error->getMessage();
        }
    }

    public function getPersonByAccessLevel(int $access_level){
        try{
            $sql = $this->pdo->prepare("SELECT * FROM persons WHERE access_level = :access_level");
            $sql->bindValue(":access_level", $access_level);
            $sql->execute();
    
            if($sql->rowCount() > 0){
                $data = $sql->fetch(PDO::FETCH_ASSOC);
                $person = new Person();
                $person->setPersonAttribute($data);
    
                return $person;
            }
            return null;
        } catch(PDOException $error){
            $error->getMessage();
        }
    }
}