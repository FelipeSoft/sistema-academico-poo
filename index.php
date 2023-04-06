<?php
session_start();
require("C:/xampp/htdocs/sistema-academico-poo/config.php");

if(!isset($_SESSION['logged_user'])){
    header("Location:" . $base_url . "/login.php");
    exit;
}
?>
<?php require("C:/xampp/htdocs/sistema-academico-poo/components/header.php") ?>

<main>
    <?php 
        if(isset($_SESSION['logged_user'])){
            $access_level = explode(" ", $_SESSION['logged_user'])[2];
            if($access_level === "Professor"){
                require("C:/xampp/htdocs/sistema-academico-poo/components/asideTeacher.php");
            } else if($access_level === "Aluno"){
                require("C:/xampp/htdocs/sistema-academico-poo/components/asideStudent.php");
            } else if($access_level === "Administrador"){
                require("C:/xampp/htdocs/sistema-academico-poo/components/asideAdministrator.php");
            }
        }
    ?>
</main>

<?php require("C:/xampp/htdocs/sistema-academico-poo/components/footer.php") ?>