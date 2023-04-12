<?php
require("C:/xampp/htdocs/sistema-academico-poo/config.php");
require_once("C:/xampp/htdocs/sistema-academico-poo/models/Student.php");
require_once("C:/xampp/htdocs/sistema-academico-poo/dao/StudentDataAccessObjectMySql.php");

$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
$born_date = filter_input(INPUT_POST, "born_date", FILTER_SANITIZE_SPECIAL_CHARS);
$rg = filter_input(INPUT_POST, "rg", FILTER_SANITIZE_SPECIAL_CHARS);
$cpf = filter_input(INPUT_POST, "cpf", FILTER_SANITIZE_SPECIAL_CHARS);
$grade = filter_input(INPUT_POST, "grade", FILTER_SANITIZE_SPECIAL_CHARS);
$schooling = filter_input(INPUT_POST, "schooling", FILTER_SANITIZE_SPECIAL_CHARS);

if($name && $email && $born_date && $rg && $cpf && $grade && $schooling){
    $enrollment_register = null;
    for($i = 0; $i <= 4; $i++){
        $enrollment_register .= rand(0, 9);
    }
    $dao = new StudentDataAccessObjectMySql($connection);
    if($dao->checkIfEnrollmentRegisterExists($enrollment_register)){
        while(!$dao->checkIfEnrollmentRegisterExists($enrollment_register)){
            for($i = 0; $i <= 4; $i++){
                $enrollment_register .= rand(0, 9);
            }
        }
    }
    $student = new Student();
    $student->setStudentAttribute([
        "id" => 0,
        "name" => $name,
        "email" => $email,
        "born_date" => $born_date,
        "rg" => $rg,
        "cpf" => $cpf,
        "grade" => $grade,
        "schooling" => $schooling,
        "rm" => $enrollment_register,
    ]);
    $dao->create($student);

    $_SESSION["flash_session"] = "O registro de matrícula do aluno cadastro é: " . $enrollment_register;
    header("Location:$base_url/student.php");
    exit;
}
$_SESSION["flash_session"] = "Preencha todos os campos corretamente!";
header("Location:$base_url/student.php");
exit;

