<?php
session_start();

require("C:/xampp/htdocs/sistema-academico-poo/config.php");
require_once("C:/xampp/htdocs/sistema-academico-poo/models/Auth.php");
require_once("C:/xampp/htdocs/sistema-academico-poo/dao/PersonDataAccessObjectMySql.php");

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
$access = filter_input(INPUT_POST, 'access', FILTER_SANITIZE_SPECIAL_CHARS);

if($email && $password && $access){
    $auth = new Auth($connection, $email, $password, $access);
    $dao = new PersonDataAccessObjectMySql($connection);

    $logged_person = $dao->getPersonByEmail($email);
    $first_name = explode(" ", $logged_person->getPersonAttribute("name"))[0];
    $access_level = "";

    switch($access){
        case 1:
            $access_level = "Aluno";
        break;
        case 2:
            $access_level = "Professor";
        break;
        case 3:
            $access_level = "Administrador";
        break;
    }
    if($auth->check()){    
        $_SESSION['logged_person'] = $first_name . " | " . $access_level; 
        header("Location:".$base_url."/");
        exit;
    }
    $_SESSION['auth_error'] = "Email e/ou senha incorretos!";
    header("Location:".$base_url."/login.php");
    exit;
}

header("Location:".$base_url."/login.php");
exit;
