<?php
session_start();

require("C:/xampp/htdocs/sistema-academico-poo/config.php");
require_once("C:/xampp/htdocs/sistema-academico-poo/models/Student.php");
require_once("C:/xampp/htdocs/sistema-academico-poo/models/User.php");
require_once("C:/xampp/htdocs/sistema-academico-poo/dao/StudentDataAccessObjectMySql.php");
require_once("C:/xampp/htdocs/sistema-academico-poo/dao/UserDataAccessObjectMySql.php");

$name = filter_input(INPUT_POST, "studentName", FILTER_SANITIZE_SPECIAL_CHARS);
$born_date = filter_input(INPUT_POST, "studentBornDate", FILTER_SANITIZE_SPECIAL_CHARS);
$rg = filter_input(INPUT_POST, "studentRG", FILTER_SANITIZE_SPECIAL_CHARS);
$cpf = filter_input(INPUT_POST, "studentCPF", FILTER_SANITIZE_SPECIAL_CHARS);
$grade = filter_input(INPUT_POST, "studentGrade", FILTER_SANITIZE_SPECIAL_CHARS);
$schooling = filter_input(INPUT_POST, "studentSchooling", FILTER_SANITIZE_SPECIAL_CHARS);
$period = filter_input(INPUT_POST, "studentPeriod", FILTER_SANITIZE_SPECIAL_CHARS);

if($name && $born_date && $rg && $cpf && $grade && $schooling && $period){
    $enrollment_register = null;

    for($i = 0; $i <= 4; $i++){
        $enrollment_register .= rand(0, 9);
    }

    $dao = new StudentDataAccessObjectMySql($connection);
    $user_dao = new UserDataAccessObjectMySql($connection);

    if($dao->checkIfEnrollmentRegisterExists($enrollment_register)){
        while(!$dao->checkIfEnrollmentRegisterExists($enrollment_register)){
            for($i = 0; $i <= 4; $i++){
                $enrollment_register .= rand(0, 9);
            }
        }
    }
    $student = new Student();
    $email = $student->generateStudentEmail($name);
    $student->setStudentAttribute([
        "id" => 0,
        "name" => $name,
        "email" => $email,
        "born_date" => $born_date,
        "rg" => $rg,
        "cpf" => $cpf,
        "grade" => $grade,
        "schooling" => $schooling,
        "period" => $period,
        "rm" => $enrollment_register,
    ]);
    $dao->create($student);

    $user = new User();
    $password = $user->generateDefaultPassword();
    $user->setUserAttribute([
        "id" => 0,
        "name" => $name,
        "email" => $email,
        "password" => $password,
        "access_level" => 1
    ]);
    $user_dao->create($user);

    $_SESSION["flash_session"] = "O registro de matrícula do aluno cadastrado é: " . $enrollment_register;
    $_SESSION["password"] = "A senha padrão do aluno é: " . $password;

    header("Location:$base_url/student.php");
    exit;
}
$_SESSION["flash_session"] = "Preencha todos os campos corretamente!";
header("Location:$base_url/student.php");
exit;

