<?php

include 'Conexao.php';
include '../models/Usuario.class.php';

class UsuarioDao extends Conexao{

    public function insert(Usuario $user) {

        $sql = "INSERT INTO usuario (nome_usuario,email_usuario,senha_usuario,data_nasc_usuario)"
                . "values(:nome,:email,:senha,:data_nascimento)";
        $statement = $this->Conectar()->prepare($sql);
        $statement->bindValue(":nome", $user->getNomeUsuario());
        $statement->bindValue(":email", $user->getEmailUsuario());
        $statement->bindValue(":senha", md5($user->getSenhaUsuario()));
        $statement->bindValue(":data_nascimento", $user->getDataNascimentoUsuario());
        $statement->execute();
    }

    public function getAll() {
        $sql = "SELECT  * FROM usuario";
        $resultSet = $this->Conectar()->query($sql);
        return $resultSet->fetchAll(PDO::FETCH_OBJ);
    }

    public function getId($id) {
        $sql = "SELECT * FROM usuario WHERE id_usuario = " . $id;
        $resultSet = $this->Conectar()->query($sql);
        $resultSet->execute();
        return $resultSet->fetch(PDO::FETCH_OBJ);
    }
    
    public function getEmail($email) {
        $sql = "SELECT email_usuario FROM usuario WHERE email_usuario = '" . $email."'";
        $resultSet = $this->Conectar()->query($sql);
        $resultSet->execute();
        return $resultSet->fetch(PDO::FETCH_OBJ);
    }

    public function update(Usuario $user, $id) {

        $sql = "UPDATE usuario SET nome_usuario=:nome,email_usuario=:email,senha_usuario = :senha,data_nasc_usuario=:data_nascimento WHERE id_usuario = :id";
        $statement = $this->Conectar()->prepare($sql);
        $statement->bindValue(":nome", $user->getNomeUsuario());
        $statement->bindValue(":email", $user->getEmailUsuario());
        if (md5($user->getSenhaUsuario()) != $this->getId((int) $id)->senha_usuario) {
            $statement->bindValue(":senha", $user->getSenhaUsuario());
        }
        $statement->bindValue(":data_nascimento", $user->getDataNascimentoUsuario());
        $statement->bindValue(":id", (int) $id);
        $statement->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM usuario WHERE id_usuario = :id";
        $resultSet = $this->Conectar()->prepare($sql);
        $resultSet->bindValue(":id", (int) $id);
        $resultSet->execute();
    }

}
