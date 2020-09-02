<?php

use ClanCats\Hydrahon\Query\Sql\Insert;

require 'config.php';
require 'dao/PasswordDaoMysql.php';
$PasswordDao = new PasswordDaoMysql($pdo);

$software = filter_input(INPUT_POST,'software');
$login = filter_input(INPUT_POST,'login');
$senha = filter_input(INPUT_POST,'senha');

if($software && $login && $senha){

    $novoPassword = new Password();
    $novoPassword->setSoftware($software);
    $novoPassword->setLogin($login);
    $novoPassword->setSenha($senha);

    $PasswordDao->add($novoPassword);

    header("Location: index.php");
    exit;
} else {
    header("Location: adicionar.php");
    exit;
}


?>