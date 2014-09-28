<?php

require_once 'Conexao.php';
require_once '../models/Produto.class.php';

class ProdutoDao extends Conexao {

    public function insert(Produto $produto) {

        $sql = "INSERT INTO produtos (nome_produtos, qtd_produtos,valor_produtos)"
                . "values(:produto,:qtd,:valor)";
        $statement = $this->Conectar()->prepare($sql);
        $statement->bindValue(":produto", $produto->getNomeProduto());
        $statement->bindValue(":qtd", (int)$produto->getQuantidadeProduto());
        $statement->bindValue(":valor", (double)$produto->getValorProduto());
        $statement->execute();
    }

    public function getAll() {
        $sql = "SELECT * FROM produtos";
        $resultSet = $this->Conectar()->query($sql);
        return $resultSet->fetchAll(PDO::FETCH_OBJ);
    }

    public function getId($id) {
        $sql = "SELECT * FROM produtos WHERE id_produtos = " . (int)$id;
        $resultSet = $this->Conectar()->query($sql);
        $resultSet->execute();
        return $resultSet->fetch(PDO::FETCH_OBJ);
    }

    public function getProduto($produto) {
        $sql = "SELECT * FROM produtos WHERE nome_produtos LIKE '%" . $produto . "%'";
        $resultSet = $this->Conectar()->query($sql);
        $resultSet->execute();
        return $resultSet->fetchAll(PDO::FETCH_OBJ);
    }

    public function getQtd($id) {
        $sql = "SELECT qtd_produtos FROM produtos WHERE id_produtos = " . (int) $id . "";
        $resultSet = $this->Conectar()->query($sql);
        $resultSet->execute();
        return $resultSet->fetch(PDO::FETCH_OBJ);
    }

    public function getSumQtdAll() {
        $sql = "SELECT SUM(qtd_produtos) as sum_qtd FROM produtos";
        $resultSet = $this->Conectar()->query($sql);
        $resultSet->execute();
        return $resultSet->fetch(PDO::FETCH_OBJ);
    }

    public function getVal($id) {
        $sql = "SELECT valor_produtos FROM produtos WHERE id_produtos = " . (int) $id . "";
        $resultSet = $this->Conectar()->query($sql);
        $resultSet->execute();
        return $resultSet->fetch(PDO::FETCH_OBJ);
    }

    public function getSumValAll() {
        $sql = "SELECT SUM(valor_produtos) as sum_valor FROM produtos";
        $resultSet = $this->Conectar()->query($sql);
        $resultSet->execute();
        return $resultSet->fetch(PDO::FETCH_OBJ);
    }

    public function update(Produto $produto, $id) {

        $sql = "UPDATE produtos SET nome_produtos=:produto,qtd_produtos=:qtd,valor_produtos = :valor WHERE id_produtos = :id";
        $statement = $this->Conectar()->prepare($sql);
        $statement->bindValue(":produto", $produto->getNomeProduto());
        $statement->bindValue(":qtd", $produto->getQuantidadeProduto());
        $statement->bindValue(":valor", $produto->getValorProduto());
        $statement->bindValue(":id", (int) $id);
        $statement->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM produtos WHERE id_produtos = :id";
        $resultSet = $this->Conectar()->prepare($sql);
        $resultSet->bindValue(":id", (int) $id);
        $resultSet->execute();
    }

}
