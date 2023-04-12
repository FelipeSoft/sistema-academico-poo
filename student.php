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
                <h3>Área do Estudante</h3>
                <div class="student-area">
                    <div class="column-left-sa">
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
                    <div class="column-right-sa">
                        <label>
                            Sexo:
                            <select name="gender">
                                <option value="1">Masculino</option>
                                <option value="2">Feminino</option>
                                <option value="3">Prefiro não dizer</option>
                            </select>
                        </label>    
                        <label>
                            Ano:
                            <input type="text">
                        </label>
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
                            Período:
                            <select name="period">
                                <option value="1">Matutino</option>
                                <option value="2">Vespertino</option>
                                <option value="3">Noturno</option>
                                <option value="4">Integral</option>
                            </select>
                        </label>  
                    </div>
                </div>
    
                <h3>Área do Responsável</h3>
                    <div class="guardian-area">
                        <div class="column-left-ga">
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
                        </div>
                        <div class="column-right-ga">
                            <label>
                            Telefone:
                            <input type="text">
                            </label>
                            <label>
                                Celular:
                                <input type="text">
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