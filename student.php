<?php 
session_start();
require("C:/xampp/htdocs/sistema-academico-poo/config.php");
require("C:/xampp/htdocs/sistema-academico-poo/components/header.php");
?>

<main>
    <?php require("C:/xampp/htdocs/sistema-academico-poo/components/asideAdministrator.php") ?>
    <div class="container">
        <?php
            if(isset($_SESSION['flash_session'])){
                require_once("C:/xampp/htdocs/sistema-academico-poo/components/message.php");
            }
            unset($_SESSION['flash_session']);
        ?>
        <?php
            if(isset($_SESSION['password'])){
                require_once("C:/xampp/htdocs/sistema-academico-poo/components/message.php");
            }
            unset($_SESSION['password']);
        ?>
        <h2 class="main-title">Novo Cadastro</h2>
        
        <form action="<?=$base_url?>/actions/student_action.php" method="POST">
                <h3>Área do Estudante</h3>
                <div class="student-area">
                    <div class="column-left-sa">
                        <label>
                            Nome:
                        <input type="text" name="studentName">
                        </label>
                        <label>
                            Data de Nascimento:
                            <input type="date" name="studentBornDate">
                        </label>
                        <label>
                            RG:
                            <input type="text" name="studentRG">
                        </label>
                        <label>
                            CPF:
                            <input type="text" name="studentCPF">
                        </label>
                    </div>
                    <div class="column-right-sa">
                        <label>
                            Sexo:
                            <select name="studentGender">
                                <option value="1">Masculino</option>
                                <option value="2">Feminino</option>
                                <option value="3">Prefiro não dizer</option>
                            </select>
                        </label>    
                        <label>
                            Ano:
                            <input type="text" name="studentGrade">
                        </label>
                        <label>
                            Escolaridade:
                            <select name="studentSchooling">
                                <option value="1">Ensino Fundamental I</option>
                                <option value="2">Ensino Fundamental II</option>
                                <option value="3">Ensino Médio</option>
                                <option value="4">Ensino Superior</option>
                            </select>
                        </label>    
                        <label>
                            Período:
                            <select name="studentPeriod">
                                <option value="1">Matutino</option>
                                <option value="2">Vespertino</option>
                                <option value="3">Noturno</option>
                                <option value="4">Integral</option>
                            </select>
                        </label>
                    </div>
                </div>
                <div class="button-area">
                    <button>Cadastrar Estudante</button>
                </div>
                </form>
                <form action="<?=$base_url?>/actions/guardian_action.php" method="POST">
                <h3>Área do Responsável</h3>
                    <div class="guardian-area">
                        <div class="column-left-ga">
                            <label>
                            Nome:
                            <input type="text" name="guardianName">
                            </label>
                            <label>
                                Email:
                                <input type="text" name="guardianEmail">
                            </label>
                            <label>
                                Data de Nascimento:
                                <input type="date" name="guardianBornDate">
                            </label>
                            <label>
                                RG:
                                <input type="text" name="guardianRG">
                            </label>
                            <label>
                                CPF:
                                <input type="text" name="guardianCPF">
                            </label>
                        </div>
                        <div class="column-right-ga">
                            <label>
                                Telefone:
                            <input type="text" name="guardianTellphone">
                            </label>
                            <label>
                                Celular:
                                <input type="text" name="guardianCellphone">
                            </label>
                            <label>
                                Frequência do Pagamento:
                                <select name="frequency">
                                    <option value="1">Mensal</option>
                                    <option value="2">Trimestral</option>
                                    <option value="3">Semestral</option>
                                    <option value="4">Anual</option>
                                </select>
                            </label>
                            <label>
                                Valor do Pagamento:
                                <input type="number     " name="payment">
                            </label>
                            <label>
                                Registro de Matrícula:
                                <input type="text" name="rm">
                            </label>
                        </div>
                    </div>
                    <div class="button-area">
                        <button>Cadastrar Responsável</button>
                    </div>
                </form>
    </div>
</main>

<?php require("C:/xampp/htdocs/sistema-academico-poo/components/footer.php") ?>