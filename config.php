<?php

$db_name = 'test';
$db_host = 'localhost';
$db_user = 'root';
$db_pass ='';

$pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host,"root","");
//$sql = $pdo->query('SELECT * FROM passwords');
// $dados= $sql->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// print_r($dados);