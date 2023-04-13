<?php
require_once("C:/xampp/htdocs/sistema-academico-poo/models/Guardian.php");
class GuardianDataAccessObjectMySql{
    private $pdo;
    public function __construct($engine){
        $this->pdo = $engine;
    }

    public function create(Guardian $guardian){
        try{
            $sql = $this->pdo->prepare("INSERT INTO guardians (name, email, cellphone, tellphone, born_date, cpf, rg, frequency, payment, student_id) VALUES (:name, :email, :cellphone, :tellphone, :born_date, :cpf, :rg, :frequency, :payment, :student_id)");
            $sql->bindValue(":name", $guardian->getGuardianAttribute("name"));
            $sql->bindValue(":email", $guardian->getGuardianAttribute("email"));
            $sql->bindValue(":cellphone", $guardian->getGuardianAttribute("cellphone"));
            $sql->bindValue(":tellphone", $guardian->getGuardianAttribute("tellphone"));
            $sql->bindValue(":born_date", $guardian->getGuardianAttribute("born_date"));
            $sql->bindValue(":cpf", $guardian->getGuardianAttribute("cpf"));
            $sql->bindValue(":rg", $guardian->getGuardianAttribute("rg"));
            $sql->bindValue(":frequency", $guardian->getGuardianAttribute("frequency"));
            $sql->bindValue(":payment", $guardian->getGuardianAttribute("payment"));
            $sql->bindValue(":student_id", $guardian->getGuardianAttribute("student_id"));
            $sql->execute();
        } catch (PDOException $error){
            echo $error->getMessage();
            exit;
        }
    }
}
