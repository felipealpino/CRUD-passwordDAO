<?php
require 'config.php';
require 'dao/PasswordDaoMysql.php';
$PasswordDao = new PasswordDaoMysql($pdo);

$password = false;
$id = filter_input(INPUT_GET,'id');

if($id){
    $password = $PasswordDao->findById($id);
} 

if ($password===false){
    header("Location:index.php");
    exit;
}
?>


<h1>Editar Usuário</h1>

<form method="POST" action="editar_pass.php">
    <input type="hidden" name="id" value="<?=$password->getId();?>">
    Software: <br>
    <input type="text" name="software" value="<?=$password->getSoftware();?>"> <br><br>

    Login: <br>
    <input type="text" name="login" value="<?=$password->getLogin();?>"> <br><br>

    Senha: <br>
    <input type="text" name="senha" value="<?=$password->getSenha();?>"> <br><br>

    <input type="submit" value="Editar">
</form>