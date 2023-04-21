<?php
require_once("C:/xampp/htdocs/sistema-academico-poo/config.php");
require_once("C:/xampp/htdocs/sistema-academico-poo/models/Guardian.php");
require_once("C:/xampp/htdocs/sistema-academico-poo/dao/UserDataAccessObjectMySql.php");
class GuardianDataAccessObjectMySql{
    private $pdo;
    public function __construct($engine){
        $this->pdo = $engine;
    }

    public function create(Guardian $guardian){
        $user_dao = new UserDataAccessObjectMySql($this->pdo);
        try{
            if(!$user_dao->checkIfEmailExists($guardian->getGuardianAttribute("email"))){
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
            }
        } catch (PDOException $error){
            echo $error->getMessage();
            exit;
        }
    }

    public function all( ){
        try{
            $sql = $this->pdo->prepare("SELECT * FROM guardians");
            $sql->execute();

            if($sql->rowCount() > 0){
                $fetch = [];
                $data = $sql->fetchAll(PDO::FETCH_ASSOC);

                foreach($data as $d){
                    $guardian = new Guardian();
                    $guardian->setGuardianAttribute([
                        "id" => $d["id"],
                        "name" => $d["name"],
                        "email" => $d["email"],
                        "cellphone" => $d["cellphone"],
                        "tellphone" => $d["tellphone"],
                        "born_date" => $d["born_date"],
                        "rg" => $d["rg"],
                        "cpf" => $d["cpf"],
                        "frequency" => $d["frequency"],
                        "payment" => $d["payment"],
                        "student_id" => $d["student_id"],
                    ]);

                    $fetch[] = $guardian;
                }
                return $fetch;
            }
        } catch(PDOException $error){
            echo $error->getMessage();
            exit;
        }
    }
}
