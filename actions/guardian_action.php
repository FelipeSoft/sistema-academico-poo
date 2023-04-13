<?php
session_start();
require("C:/xampp/htdocs/sistema-academico-poo/config.php");
require_once("C:/xampp/htdocs/sistema-academico-poo/models/Student.php");
require_once("C:/xampp/htdocs/sistema-academico-poo/models/Guardian.php");
require_once("C:/xampp/htdocs/sistema-academico-poo/dao/StudentDataAccessObjectMySql.php");
require_once("C:/xampp/htdocs/sistema-academico-poo/dao/GuardianDataAccessObjectMySql.php");

$name = filter_input(INPUT_POST, "guardianName", FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, "guardianEmail", FILTER_VALIDATE_EMAIL);
$born_date = filter_input(INPUT_POST, "guardianBornDate", FILTER_SANITIZE_SPECIAL_CHARS);
$rg = filter_input(INPUT_POST, "guardianRG", FILTER_SANITIZE_SPECIAL_CHARS);
$cpf = filter_input(INPUT_POST, "guardianCPF", FILTER_SANITIZE_SPECIAL_CHARS);
$cellphone = filter_input(INPUT_POST, "guardianCellphone", FILTER_SANITIZE_SPECIAL_CHARS);
$tellphone = filter_input(INPUT_POST, "guardianTellphone", FILTER_SANITIZE_SPECIAL_CHARS);
$rm = filter_input(INPUT_POST, "rm", FILTER_VALIDATE_INT);
$payment = filter_input(INPUT_POST, "payment", FILTER_VALIDATE_FLOAT);
$frequency = filter_input(INPUT_POST, "frequency", FILTER_VALIDATE_INT);

if($name && $email && $born_date && $rg && $cpf && $cellphone && $rm && $payment && $frequency){
    $student_dao = new StudentDataAccessObjectMySql($connection);
    $guardian_dao = new GuardianDataAccessObjectMySql($connection);

    if($student_dao->checkIfEnrollmentRegisterExists($rm)){
        $student = $student_dao->getStudentByEnrollmentRegister($rm);
        $student_id = $student->getStudentAttribute("id");

        $guardian = new Guardian();
        $guardian->setGuardianAttribute([
            "id" => 0,
            "name" => $name,
            "email" => $email,
            "born_date" => $born_date,
            "rg" => $rg,
            "cpf" => $cpf,
            "cellphone" => $cellphone,
            "tellphone" => $tellphone,
            "rm" => $rm,
            "payment" => $payment,
            "frequency" => $frequency,
            "student_id" => $student_id
        ]);
        $guardian_dao->create($guardian);

        $_SESSION['flash_session'] = "Aluno e responsável cadastrados com sucesso!";
        header("Location:$base_url/student.php");
        exit;
    }
}
$_SESSION['flash_session'] = "Preencha todos os campos corretamente!";
header("Location:$base_url/student.php");
exit;


