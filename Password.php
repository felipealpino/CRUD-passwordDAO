<?php

class Password{
/*  Tem que ter a mesma estrutura de dados da minha tabela do banco de dados
    Essa classe é a que sera utilizada sempre que estivermos manipulando algum password
*/
private $id;
private $software;
private $login;
private $senha;

public function getId(){
    return $this->id;
}
public function setId($i){
    $this->id = trim($i);
}

public function getSoftware(){
    return $this->software;
}
public function setSoftware($s){
    $this->software = ucwords(trim($s)); //deixa todas as primeiras letras maiusculas 
}

public function getLogin(){
    return $this->login; 
}
public function setLogin($l){
    //$this->login = strtolower(trim($l)); //joga todo o texto para minusculo
    $this->login = trim($l);
}

public function getSenha(){
    return $this->senha;
}
public function setSenha($p){
    $this->senha = trim($p);
}

}

/*  Criando uma classe que vai manipular o bando de dados (padronizando com banco de dados)
    Sera uma interface da class password e sendo assim, toda classe que quiser fazer a implentação dessa class password, ou seja, toda dao 
de password precisará seguir determinado padrão 
    O DAO é onde manipulamos tudo que tem a ver com o banco de dados

*/

interface PasswordDAO{
    public function add(Password $p);
    public function findAll();
    public function findById($id);
    public function update(Password $p);
    public function delete($id);


}