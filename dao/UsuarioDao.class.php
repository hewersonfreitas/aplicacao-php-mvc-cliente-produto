<?php

include 'Conexao.php';
include '../models/Usuario.class.php';

class UsuarioDao {

    private $conn;

    public function __construct() {
        $this->conn = new Conexao();
    }

    public function insert(Usuario $user) {

        $sql = "INSERT INTO usuario (nome_usuario,email_usuario,senha_usuario,data_nasc_usuario)"
                . "values(:nome,:email,:senha,:data_nascimento)";
        $statement = $this->conn->Conectar()->prepare($sql);
        $statement->bindValue(":nome", $user->getNomeUsuario());
        $statement->bindValue(":email", $user->getEmailUsuario());
        $statement->bindValue(":senha", $user->getSenhaUsuario());
        $statement->bindValue(":data_nascimento", $user->getDataNascimentoUsuario());
        $statement->execute();
    }
    
    public function getAll() {
        $sql = "SELECT * FROM usuario";
        return $resultSet = $this->conn->Conectar()->query($sql)->fetch(PDO::FETCH_OBJ);
       // return $resultSet->execute();
        
    }
    
    public function getId($id) {
        $sql = "SELECT * FROM usuario WHERE id_pessoa = ".$id;
        $resultSet = $this->conn->Conectar()->query($sql);
        $resultSet->execute();
        return $resultSet->fetch(PDO::FETCH_OBJ);
    }
    
    public function update(Usuario $user) {

        $sql = "UPDATE usuario SET nome_usuario=:nome,email_usuario=:email,senha_usuario = :senha,data_nasc_usuario=:data_nascimento)";
        $statement = $this->conn->Conectar()->prepare($sql);
        $statement->bindValue(":nome", $user->getNomeUsuario());
        $statement->bindValue(":email", $user->getEmailUsuario());
        $statement->bindValue(":senha", $user->getSenhaUsuario());
        $statement->bindValue(":data_nascimento", $user->getDataNascimentoUsuario());
        $statement->execute();
    }
    
    public function delete($id) {
        $sql = "SELECT * FROM usuario WHERE id_pessoa = :id";
        $resultSet = $this->conn->Conectar()->query($sql);
        $resultSet->bindValue("id", $id);
        $resultSet->execute();
        return $resultSet->fetch(PDO::FETCH_OBJ);;
    }

}