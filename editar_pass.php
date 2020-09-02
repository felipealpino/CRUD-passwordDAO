<?php
require 'config.php';
require 'dao/PasswordDaoMysql.php';
$PasswordDao = new PasswordDaoMysql($pdo);

$id = filter_input(INPUT_POST,'id');
$software = filter_input(INPUT_POST,'software');
$login = filter_input(INPUT_POST,'login');
$senha = filter_input(INPUT_POST,'senha');

if($id && $software && $login && $senha){

    //$password = $PasswordDao->findById($id);
    $password = new Password();
    $password->setId($id);
    $password->setSoftware($software);
    $password->setLogin($login);
    $password->setSenha($senha);

    $PasswordDao->update($password);

    header("Location: index.php");
    exit;
} else {
    header("Location: editar.php?id=".$id);
    exit;
}


?>