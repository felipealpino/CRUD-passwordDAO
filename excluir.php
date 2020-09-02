<?php
require 'config.php';
require 'dao/PasswordDaoMysql.php';
$PasswordDao = new PasswordDaoMysql($pdo);

$id = filter_input(INPUT_GET,'id');
if($id){
    $PasswordDao->delete($id);
}

header("Location:index.php");
exit;
?>