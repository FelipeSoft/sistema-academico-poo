<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início</title>
    <link rel="stylesheet" href="<?=$base_url?>/assets/css/home.css">
    <link rel="stylesheet" href="<?=$base_url?>/assets/css/forms.css">
    <script src="https://use.fontawesome.com/a443ad607e.js"></script>
</head>
<body>
    
    <header>
        <h3><a href="index.php">SISTEMA ACADÊMICO</a></h3>
        <div class="profile">
            <div class="profile-support">
                <i class="fa fa-user" style="font-size: 25px;"></i>
                <p>
                    <?php
                        if(isset($_SESSION['logged_user'])){
                            echo $_SESSION['logged_user'];
                        }
                    ?>
                </p>
                <i class="fa fa-caret-down"></i>
            </div>
            <div class="profile-dropdown">
                <a href="" >Perfil</a>
                <a href="<?=$base_url?>/actions/logout_action.php" >Sair</a>
            </div>
        </div>
    </header>