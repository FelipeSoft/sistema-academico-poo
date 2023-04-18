<?php 
session_start();
require("C:/xampp/htdocs/sistema-academico-poo/config.php");
require("C:/xampp/htdocs/sistema-academico-poo/components/header.php"); 
require("C:/xampp/htdocs/sistema-academico-poo/dao/UserDataAccessObjectMySql.php"); 

$dao = new UserDataAccessObjectMySql($connection);
$users = $dao->all();
?>

<main>
    <?php require("C:/xampp/htdocs/sistema-academico-poo/components/asideAdministrator.php"); ?>
    <div class="container">
        <?php 
            if(isset($_SESSION['flash_session'])){
                require($_SERVER['DOCUMENT_ROOT'] . "/sistema-academico-poo/components/message.php");
            }
        ?>
        <h3>Lista de Usuários</h3>
        <table id="usersTable">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Email</td>
                    <td>Senha</td>
                    <td>Nível de Acesso</td>
                    <td>Ações</td>
                </tr>
            </thead>
            <?php if($users !== null): ?>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td><?= $user->getUserAttribute("id"); ?></td>
                        <td><?= $user->getUserAttribute("name"); ?></td>
                        <td><?= $user->getUserAttribute("email"); ?></td>
                        <td><?= $user->getUserAttribute("password"); ?></td>
                        <td><?= $user->getUserAttribute("access_level"); ?></td>
                        <td>
                            <div class="actions">
                                <a href="<?=$base_url;?>/edit_user.php">Editar <i class="fa fa-pencil"></i></a>
                                <a href="<?=$base_url;?>/actions/delete_user_action.php?id=<?=$user->getUserAttribute("id");?>" onclick="return confirm('Deseja realmente excluir esse registro?')">Excluir <i class="fa fa-trash"></i></a>
                            </div>    
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
</main>

<?php require("C:/xampp/htdocs/sistema-academico-poo/components/footer.php"); ?>