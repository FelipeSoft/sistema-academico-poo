<?php
require_once("C:/xampp/htdocs/sistema-academico-poo/models/Student.php");
class StudentDataAccessObjectMySql{
    private $pdo;
    
    public function __construct($engine){
        $this->pdo = $engine;
    }

    public function create(Student $student){
        try{
            $sql = $this->pdo->prepare("INSERT INTO students (name, email, born_date, rg, cpf, grade, schooling, period, rm) VALUES (:name, :email, :born_date, :rg, :cpf, :grade, :schooling, :period, :rm)");
            $sql->bindValue(":name", $student->getStudentAttribute("name"));
            $sql->bindValue(":email", $student->getStudentAttribute("email"));
            $sql->bindValue(":born_date", $student->getStudentAttribute("born_date"));
            $sql->bindValue(":rg", $student->getStudentAttribute("rg"));
            $sql->bindValue(":cpf", $student->getStudentAttribute("cpf"));
            $sql->bindValue(":grade", $student->getStudentAttribute("grade"));
            $sql->bindValue(":schooling", $student->getStudentAttribute("schooling"));
            $sql->bindValue(":period", $student->getStudentAttribute("period"));
            $sql->bindValue(":rm", $student->getStudentAttribute("rm"));
            $sql->execute();
        } catch (PDOException $error){
            echo $error->getMessage();
            exit;
        }
    }
    public function checkIfEnrollmentRegisterExists(int $rm){
        try{
            $sql = $this->pdo->prepare("SELECT * FROM students WHERE rm = :rm");
            $sql->bindValue(":rm", $rm);
            $sql->execute();
            return $sql->rowCount() > 0 ? true : false;
        } catch (PDOException $error) {
            echo $error->getMessage();
            exit;
        }
    }
    public function getStudentByEnrollmentRegister(int $enrollment_register){
        try{
            $sql = $this->pdo->prepare("SELECT * FROM students WHERE rm = :rm");
            $sql->bindValue(":rm", $enrollment_register);
            $sql->execute();

            if($sql->rowCount() > 0){
                $data = $sql->fetch(PDO::FETCH_ASSOC);
                $student = new Student();
                $student->setStudentAttribute([
                    "id" => $data["id"],
                    "name" => $data["name"],
                    "email" => $data["email"],
                    "rg" => $data["rg"],
                    "cpf" => $data["cpf"],
                    "born_date" => $data["born_date"],
                    "grade" => $data["grade"],
                    "schooling" => $data["schooling"],
                    "period" => $data["period"],
                    "rm" => $data["rm"],
                ]);
                return $student;
            }
            return null;
        } catch (PDOException $error){
            echo $error->getMessage();
            exit;
        }
    }
}