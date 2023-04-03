<?php
session_start();
require("C:/xampp/htdocs/sistema-academico-poo/config.php");

if(!isset($_SESSION['logged_person'])){
    header("Location:" . $base_url . "/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início</title>
    <link rel="stylesheet" href="<?=$base_url?>/assets/css/home.css">
</head>
<body>
    <p>
        <?php
            if(isset($_SESSION['logged_person'])){
                echo $_SESSION['logged_person'];
            }
        ?>
        -
        <a href="<?=$base_url?>/actions/logout_action.php">Sair</a>
    </p>
</body>
</html>