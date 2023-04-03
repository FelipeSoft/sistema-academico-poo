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
    <script src="https://use.fontawesome.com/a443ad607e.js"></script>
</head>
<body>
    <!-- <p>
        <?php
            //if(isset($_SESSION['logged_person'])){
            //    echo $_SESSION['logged_person'];
            //}
        ?>
        -
        <a href="<?=$base_url?>/actions/logout_action.php">Sair</a>
    </p> -->
    <header>
        <div class="max-width">
            <h3>SISTEMA ACADÊMICO</h3>
        </div>
    </header>

    <main>
        <aside>
            <div class="sections">
                <div class="section-item s1">Resultados <i class="fa fa-caret-down"></i></div>
                <div class="toggle-area-1">
                    <div class="toggle-item"><a href="">Notas Parcias</a></div>
                    <div class="toggle-item"><a href="">Notas Finais</a></div>
                </div>
                <div class="section-item s2">Aluno <i class="fa fa-caret-down"></i></div>
                <div class="toggle-area-2">
                    <div class="toggle-item"><a href="">Aulas e Conteúdos</a></div>
                    <div class="toggle-item"><a href="">Calendário</a></div>
                    <div class="toggle-item"><a href="">Comunicados</a></div>
                    <div class="toggle-item"><a href="">Mensagens</a></div>
                    <div class="toggle-item"><a href="">Quadro de Horários</a></div>
                    <div class="toggle-item"><a href="">Atividades e Avaliações</a></div>
                </div>
                <div class="section-item s3"><a href="">Dashboard</a></div>
            </div>
        </aside>
    </main>
    <script src="<?=$base_url?>/assets/js/asideToggleAnimation.js"></script>
</body>
</html>