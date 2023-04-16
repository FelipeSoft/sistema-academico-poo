<?php 
session_start();
require("C:/xampp/htdocs/sistema-academico-poo/config.php"); 
require("C:/xampp/htdocs/sistema-academico-poo/components/header.php"); 
require_once("C:/xampp/htdocs/sistema-academico-poo/models/Student.php"); 
require_once("C:/xampp/htdocs/sistema-academico-poo/dao/StudentDataAccessObjectMySql.php"); 

$dao = new StudentDataAccessObjectMySql($connection);
$students = $dao->all();
?>

<main>
    <?php require("C:/xampp/htdocs/sistema-academico-poo/components/asideAdministrator.php"); ?>
    <div class="container">
        <h3>Gerenciamento de Alunos</h3>
        <table id="usersTable">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Email</td>
                    <td>Data de Nascimento</td>
                    <td>RG</td>
                    <td>CPF</td>
                    <td>Série/Turma</td>
                    <td>Escolaridade</td>
                    <td>Período</td>
                    <td>RM</td>
                    <td>Ações</td>
                </tr>
            </thead>
            <?php if($students !== null): ?>
                <?php foreach($students as $student): ?>
                    <tr>
                        <td><?= $student->getStudentAttribute("id"); ?></td>
                        <td><?= $student->getStudentAttribute("name"); ?></td>
                        <td><?= $student->getStudentAttribute("email"); ?></td>
                        <td><?= date("d/m/Y", strtotime($student->getStudentAttribute("born_date"))); ?></td>
                        <td><?= $student->getStudentAttribute("rg"); ?></td>
                        <td><?= $student->getStudentAttribute("cpf"); ?></td>
                        <td><?= $student->getStudentAttribute("grade") . "º Ano"; ?></td>
                        <td>
                        <?php 
                            switch($student->getStudentAttribute("schooling")){
                                case 1:
                                    echo "Ensino Fundamental I";
                                break;
                                case 2:
                                    echo "Ensino Fundamental II";
                                break;
                                case 3:
                                    echo "Ensino Médio";
                                break;
                                case 4:
                                    echo "Ensino Superior";
                                break;
                            }
                        ?>
                        </td>
                        <td>
                            <?php 
                                switch($student->getStudentAttribute("period")){
                                    case 1:
                                        echo "Matutino";
                                    break;
                                    case 2:
                                        echo "Vespertino";
                                    break;
                                    case 3:
                                        echo "Noturno";
                                    break;
                                    case 4:
                                        echo "Integral";
                                    break;
                                }
                            ?>
                        </td>
                        <td><?= $student->getStudentAttribute("rm"); ?></td>
                        <td>
                            <div class="actions">
                                <a href="<?=$base_url;?>/edit_student.php">Editar <i class="fa fa-pencil"></i></a>
                                <a href="<?=$base_url;?>/actions/delete_student_action.php?id=<?=$student->getStudentAttribute("id");?>">Excluir <i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
</main>

<?php require("C:/xampp/htdocs/sistema-academico-poo/components/footer.php"); ?>