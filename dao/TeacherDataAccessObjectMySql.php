<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema-academico-poo/models/Teacher.php");
class TeacherDataAccessObjectMySql{
    private $pdo;
    public function __construct($engine){
        $this->pdo = $engine;
    }

    public function all(){
        $teachers = null;
        try{
            $sql = $this->pdo->prepare("SELECT * FROM teachers");
            $sql->execute();

            if($sql->rowCount() > 0){
                foreach($sql as $data){
                    $teacher = new Teacher();
                    $teacher->setTeacherAttribute([
                        "id" => $data["id"],
                        "name" => $data["name"],
                        "email" => $data["email"],
                        "password" => $data["password"],
                        "access_level" => $data["access_level"],
                    ]);
    
                    $teachers[] = $teacher;
                }
                return $teachers;
            } else {
                return null;
            }

        } catch(PDOException $error){
            echo $error->getMessage();
            die;
        }
    }
}