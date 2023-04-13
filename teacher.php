<?php 
session_start();
require("C:/xampp/htdocs/sistema-academico-poo/config.php");
require("C:/xampp/htdocs/sistema-academico-poo/components/header.php");
?>

<main>
    <?php require("C:/xampp/htdocs/sistema-academico-poo/components/asideAdministrator.php") ?>
    <div class="container">
        <h2 class="main-title">Novo Cadastro</h2>
        <form action="<?=$base_url?>/actions/student_action.php" method="POST">
                <h3>Área do Professor</h3>
                <div class="student-area">
                    <div class="column-left-sa">
                        <label>
                        Nome:
                        <input type="text" name="teacherName">
                        </label>
                        <label>
                            Data de Nascimento:
                            <input type="date" name="teacherBornDate">
                        </label>
                        <label>
                            RG:
                            <input type="text" name="teacher">
                        </label>
                        <label>
                            CPF:
                            <input type="text" name="">
                        </label>
                        <label>
                            Salário
                            <input type="text" name="">
                        </label>
                    </div>
                    <div class="column-right-sa" name="">
                        <label>
                            Escolaridade:
                            <select name="schooling">
                                <option value="1">Ensino Fundamental I</option>
                                <option value="2">Ensino Fundamental II</option>
                                <option value="3">Ensino Médio</option>
                                <option value="4">Ensino Superior</option>
                            </select>
                        </label>    
                        <label>
                            Formação Acadêmica
                            <textarea name="academic_education"></textarea>
                        </label>
                    </div>
                </div> 
                <div class="button-area">
                    <button>Cadastrar</button>
                </div> 
            </form>
    </div>
</main>

<?php require("C:/xampp/htdocs/sistema-academico-poo/components/footer.php") ?>