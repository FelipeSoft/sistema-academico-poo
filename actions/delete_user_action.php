<?php
session_start();
require("C:/xampp/htdocs/sistema-academico-poo/config.php");
require_once("C:/xampp/htdocs/sistema-academico-poo/dao/UserDataAccessObjectMySql.php");

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
if($id){
    if($id != $_SESSION['user_id']){
        $dao = new UserDataAccessObjectMySql($connection);
        $dao->delete($id);
        $_SESSION["flash"] = "Registro excluído com sucesso!";
        header("Location:$base_url/users.php");
        exit;
    } 
    $_SESSION["flash_session"] = "Você não pode excluir a si mesmo!";
    header("Location:$base_url/users.php");
    exit;
}

header("Location:$base_url/users.php");
exit;