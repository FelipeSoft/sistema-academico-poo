<?php
session_start();
require("C:/xampp/htdocs/sistema-academico-poo/config.php");
unset($_SESSION['logged_user']);
header("Location:".$base_url."/login.php");
exit;