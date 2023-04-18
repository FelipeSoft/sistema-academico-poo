<?php
session_start();
require($_SERVER["DOCUMENT_ROOT"] . "/sistema-academico-poo/config.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/sistema-academico-poo/dao/StudentDataAccessObjectMySql.php");
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if($id){
    $dao = new StudentDataAccessObjectMySql($connection);
    $dao->delete($id);
    $_SESSION["flash"] = "Aluno excluído com sucesso!";
    header("Location:$base_url/students.php");
    exit;
}

header("Location:$base_url/students.php");
exit;