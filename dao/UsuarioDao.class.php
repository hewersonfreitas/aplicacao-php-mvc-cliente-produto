<?php

include 'Conexao.php';
include '../models/Usuario.class.php';

class UsuarioDao {

    private $conn;

    public function __construct() {
        $this->conn = new Conexao();
    }

    public function insert(Usuario $user) {

        $sql = "INSERT INTO usuario (nome,email,senha,data_nascimento)"
                . "values(:nome,:email,:senha,:data_nascimento)";
        $statement = $this->conn->Conectar()->prepare($sql);
        $statement->bindValue(":nome", $user->getNomeUsuario());
        $statement->bindValue(":email", $user->getEmailUsuario());
        $statement->bindValue(":senha", $user->getSenhaUsuario());
        $statement->bindValue(":data_nascimento", $user->getDataNascimentoUsuario());
    }

}