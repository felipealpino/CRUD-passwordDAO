<?php
require_once 'models/Password.php';
//require_once usado para que nao ocorra o risco de repetir/puxar a classe 2x
//O PasswordDAO será importado no index , então faremos o caminho como se estivessemos na raiz do projeto 

class PasswordDaoMysql implements PasswordDAO {

    private $pdo;

    /* Quando instanciarmos a classe PasswordDaoSql, precisaremos mandar tambem o driver, o cara que está fazendo a manipualação, que é
    o proprio pdo, ou seja : */
    public function __construct(PDO $driver){
        $this->pdo = $driver;    
    }


    public function add(Password $p){
        $sql = $this->pdo->prepare("INSERT INTO passwords (software,login,senha) VALUES (:software, :login, :senha)");
        $sql->bindValue(':software', $p->getSoftware());
        $sql->bindValue(':login',$p->getLogin());
        $sql->bindValue(':senha',$p->getSenha());
        $sql->execute();

        //inserindo o ultimo id adicionado pelo banco de dados e retornando o objeto 
        $p->setId($this->pdo->lastInsertId());
        return $p;

        header("Location:index.php");

    }


    public function findAll(){
        $array = [];

        $sql = $this->pdo->query("SELECT * FROM passwords");
        if($sql->rowCount() > 0){
            $data = $sql->fetchAll();

            foreach($data as $item){
                $p = new Password();
                $p->setId($item['id']);
                $p->setSoftware($item['software']);
                $p->setLogin($item['login']);
                $p->setSenha($item['senha']);

                $array[] = $p;
            }
        }
        return $array;
    }


    public function findById($id){
        $sql = $this->pdo->prepare("SELECT * FROM passwords WHERE id=:id ");
        $sql->bindValue(':id',$id);
        $sql->execute();

        if ( $sql->rowCount() > 0 ){
            $data= $sql->fetch(PDO::FETCH_ASSOC);

            $p = new Password();
            $p->setSoftware($data['software']);
            $p->setLogin($data['login']);
            $p->setSenha($data['senha']);
            $p->setId($data['id']);

            return $p;
        } else {
            return false;
        }
    }
    

    public function update(Password $p){
        $sql = $this->pdo->prepare("UPDATE passwords SET software=:software, login=:login, senha=:senha WHERE id=:id");
        $sql->bindValue(':id', $p->getId());
        $sql->bindValue(':software',$p->getSoftware());
        $sql->bindValue(':login',$p->getLogin());
        $sql->bindValue(':senha',$p->getSenha());
        $sql->execute();

        return true;
    }


    public function delete($id){
        $sql = $this->pdo->prepare("DELETE FROM passwords WHERE id = :id");
        $sql->bindValue(':id',$id);
        $sql->execute();

        return true;
    }

}