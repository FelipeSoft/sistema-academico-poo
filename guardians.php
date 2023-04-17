<?php 
session_start();
require("C:/xampp/htdocs/sistema-academico-poo/config.php");
require("C:/xampp/htdocs/sistema-academico-poo/components/header.php");
require_once("C:/xampp/htdocs/sistema-academico-poo/dao/GuardianDataAccessObjectMySql.php");

$dao = new GuardianDataAccessObjectMySql($connection);
$guardians = $dao->all();
?>

<main>
    <?php require("C:/xampp/htdocs/sistema-academico-poo/components/asideAdministrator.php"); ?>
    <div class="container">
        <h3>Lista de Responsáveis</h3>
        <table id="guardiansTable">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Email</td>
                    <td>Telefone</td>
                    <td>Celular</td>
                    <td>Data de Nascimento</td>
                    <td>RG</td>
                    <td>CPF</td>
                    <td>Frequência do Pagamento</td>
                    <td>Valor do Pagamento</td>
                </tr>
            </thead>
            <tbody>
                <?php if($guardians !== null): ?>
                    <?php foreach($guardians as $guardian): ?>
                        <tr>
                            <td><?= $guardian->getGuardianAttribute("id"); ?></td>
                            <td><?= $guardian->getGuardianAttribute("name"); ?></td>
                            <td><?= $guardian->getGuardianAttribute("email"); ?></td>
                            <td>
                                <?php 
                                    echo $guardian->getGuardianAttribute("tellphone") !== "" ? $guardian->getGuardianAttribute("tellphone") : "Não informado";
                                ?>
                            </td>
                            <td><?= $guardian->getGuardianAttribute("cellphone"); ?></td>
                            <td><?= date("d/m/Y", strtotime($guardian->getGuardianAttribute("born_date"))); ?></td>
                            <td><?= $guardian->getGuardianAttribute("rg"); ?></td>
                            <td><?= $guardian->getGuardianAttribute("cpf"); ?></td>
                            <td>
                                <?php 
                                    switch($guardian->getGuardianAttribute("frequency")){
                                        case 1:
                                            echo "Mensal";
                                        break;
                                        case 2:
                                            echo "Trimestral";
                                        break;
                                        case 3:
                                            echo "Semestral";
                                        break;
                                        case 4:
                                            echo "Anual";
                                        break;   
                                    }
                                ?>
                            </td>
                            <td><?= "R$ " . $guardian->getGuardianAttribute("payment"); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<?php require("C:/xampp/htdocs/sistema-academico-poo/components/footer.php"); ?>

