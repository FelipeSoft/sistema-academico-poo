<?php
session_start();
require("C:/xampp/htdocs/sistema-academico-poo/config.php");

if(!isset($_SESSION['logged_user']) || $_SESSION['logged_user'] === null){
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
    <div class="container container-home">
        <div class="home-buttons">
            <div class="home-option">
                Transações
            </div>
            <div class="home-option">
                Salários
            </div>
            <div class="home-option">
                Comunicados
            </div>
            <div class="home-option">
                Dashboard
            </div>
        </div>
        <div class="average-graphic">
            Área do Gráfico das Médias
        </div>
        <div class="courses">
        <h3>Nossos Cursos</h3>
            <div class="container-courses">
                <div class="courses-item">
                    Item 1
                </div>
                <div class="courses-item">
                    Item 2
                </div>
                <div class="courses-item">
                    Item 3
                </div>
                <div class="courses-item">
                    Item 4
                </div>
                <div class="courses-item">
                    Item 1
                </div>
                <div class="courses-item">
                    Item 2
                </div>
                <div class="courses-item">
                    Item 3
                </div>
                <div class="courses-item">
                    Item 4
                </div>
                <div class="courses-item">
                    Item 1
                </div>
                <div class="courses-item">
                    Item 2
                </div>
                <div class="courses-item">
                    Item 3
                </div>
                <div class="courses-item">
                    Item 4
                </div>
            </div>
        </div>
    </div>
</main>

<?php require("C:/xampp/htdocs/sistema-academico-poo/components/footer.php") ?>