<?php
require("C:/xampp/htdocs/sistema-academico-poo/models/DatabaseConnection.php");

$DB_NAME = "sistema_academico";
$DB_HOST = "localhost";
$DB_USER = "root";
$DB_PASSWORD = "root";

$database_connection = new DatabaseConnection($DB_NAME, $DB_HOST, $DB_USER, $DB_PASSWORD);
$connection = $database_connection->connect();

$base_url = "http://localhost/sistema-academico-poo";