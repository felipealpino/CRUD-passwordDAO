<?php
require 'config.php';
require 'dao/PasswordDaoMysql.php';
$PasswordDao = new PasswordDaoMysql($pdo);
$dados = $PasswordDao->findAll();

?>

<a href="adicionar.php">Adicionar Password:</a> <br><br>

<table border="1" width=100%>
    <tr>
        <th style="width:5%;">ID</th>
        <th style="width:25%;">Software</th>
        <th style="width:30%;">Login</th>
        <th style="width:30%;">Senha</th>
        <th style="width:10%;">  
    </tr>
    
    <?php foreach($dados as $info): ?>
        <tr>
            <td><?=$info->getId();?></td>
            <td><?=$info->getSoftware();?></td>
            <td><?=$info->getLogin();?></td>
            <td><?=$info->getSenha();?></td>
            <td>
                <a href="editar.php?id=<?=$info->getId();?>">[ Editar ]</a>
                <a href="excluir.php?id=<?=$info->getId();?>">[ Excluir ]</a>
            </td>
        </tr>
    <?php endforeach ?>
</table>