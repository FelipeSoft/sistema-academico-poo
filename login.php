<?php
session_start();
require("C:/xampp/htdocs/sistema-academico-poo/config.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="http://localhost/sistema-academico-poo/assets/css/login.css">
    <script src="https://use.fontawesome.com/a443ad607e.js"></script>
</head>
<body>
    <div class="container">
        <div class="login-box">
            <div class="login-box-header">
                <h3>Login</h3>
            </div>
            <form action="<?=$base_url?>/actions/login_action.php" id="login-form" method="POST">
                <div class="checkbox-area">
                    <label>
                        Aluno
                        <input type="radio" name="access" id="student" value="0" checked>
                    </label>
                    <label>
                        Professor
                        <input type="radio" name="access" id="teacher" value="1">
                    </label>
                </div>
                <div class="input-area">
                    <div class="input-box">
                        <div class="icon-box"><i class="fa fa-user"></i></div>
                        <input type="email" name="email" placeholder="exemplo@domínio.com" data-rules="required|email">
                    </div>
                    <div class="input-box">
                        <div class="icon-box"><i class="fa fa-key"></i></div>
                        <input type="password" name="password" data-rules="required|min=8">
                    </div>
                    <p class="error-message"></p>
                </div>
                <div class="button-area">
                    <button>ENTRAR</button>
                    <a href="">Esqueceu a senha?</a>
                </div>
            </form>
            <?php
                if(isset($_SESSION['auth_error'])){
                    echo '<p class="session_message">'. $_SESSION['auth_error'] .'</p>';
                    unset($_SESSION['auth_error']);
                }
            ?>
        </div>
    </div>
    <script src="http://localhost/sistema-academico-poo/assets/js/loginValidation.js"></script>
</body>
</html>