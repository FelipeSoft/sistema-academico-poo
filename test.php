<?php
require("C:/xampp/htdocs/sistema-academico-poo/config.php");
require_once("C:/xampp/htdocs/sistema-academico-poo/models/User.php");
require_once("C:/xampp/htdocs/sistema-academico-poo/dao/UserDataAccessObjectMySql.php");

$data = [
    "id" => 0,
    "name" => "Felipe de Castro Lima",
    "email" => "felipedecastrolima2@gmail.com",
    "password" => "felipe1330245",
    "access_level" => 3
];

$user = new User();
$user->setUserAttribute($data);

$dao = new UserDataAccessObjectMySql($connection);
$dao->create($user);

header("Location:$base_url/login.php");
exit;