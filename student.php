<?php 
session_start();
require("C:/xampp/htdocs/sistema-academico-poo/config.php");
require("C:/xampp/htdocs/sistema-academico-poo/components/header.php");
?>

<main>
    <?php require("C:/xampp/htdocs/sistema-academico-poo/components/asideAdministrator.php") ?>
    <div class="container">
        <h3>Novo Cadastro</h3>
        <form action="<?=$base_url?>/actions/student_action.php" method="POST">
            <p>Área do Estudante</p>
    
            <div class="student-area">
                <div class="personal-info">  
                    <label>
                    Nome:
                    <input type="text">
                    </label>
                    <label>
                        Data de Nascimento:
                        <input type="date">
                    </label>
                    <label>
                        RG:
                        <input type="text">
                    </label>
                    <label>
                        CPF:
                        <input type="text">
                    </label>
                </div>
        
                <div class="schooling-info">
                    <label>
                        Série/Turma:
                        <input type="text">
                    </label>
                    <label>
                        Escolaridade:
                        <input type="text">
                    </label>
                </div>  
            </div>

            <p>Área do Responsável</p>
            <div class="guardian-area">
                <label>
                    Nome:
                <input type="text">
                </label>
                <label>
                    Email:
                    <input type="text">
                </label>
                <label>
                    Data de Nascimento:
                    <input type="date">
                </label>
                <label>
                    RG:
                    <input type="text">
                </label>
                <label>
                    CPF:
                    <input type="text">
                </label>
                <label>
                    Telefone:
                    <input type="text">
                </label>
                <label>
                    Celular:
                    <input type="text">
                </label>
            </div>
            <button>Cadastrar</button>
        </form>
    </div>
</main>

<?php require("C:/xampp/htdocs/sistema-academico-poo/components/footer.php") ?>