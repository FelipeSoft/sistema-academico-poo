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
            <tbody>
                <?php if($users !== null): ?>
                    <?php foreach($users as $user): ?>
                        <tr>
                            <td><?= $user->getUserAttribute("id"); ?></td>
                            <td><?= $user->getUserAttribute("name"); ?></td>
                            <td><?= $user->getUserAttribute("email"); ?></td>
                            <td><?= $user->getUserAttribute("password"); ?></td>
                            <td>
                                <?php 
                                    if($user->getUserAttribute("access_level") === 1){
                                        echo "Aluno";
                                    } else if($user->getUserAttribute("access_level") === 2){
                                        echo "Professor";
                                    } else if($user->getUserAttribute("access_level") === 3){
                                        echo "Administrador";
                                    }
                                ?>
                            </td>
                            <td>
                                <div class="actionsTableUsers">
                                    <a href="<?=$base_url?>/edit_user.php?id=<?= $user->getUserAttribute("id"); ?>">Editar</a>
                                    <a href="<?=$base_url?>/delete_user_action.php?id=<?= $user->getUserAttribute("id"); ?>">Excluir</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<?php require("C:/xampp/htdocs/sistema-academico-poo/components/footer.php"); ?>