<?php

class Produto {
    private $nomeProduto;
    private $quantidadeProduto;
    private $valorProduto;
    
    function __construct($nomeProduto, $quantidadeProduto, $valorProduto) {
        $this->nomeProduto = $nomeProduto;
        $this->quantidadeProduto = $quantidadeProduto;
        $this->valorProduto = $valorProduto;
    }
    
    public function getNomeProduto() {
        return $this->nomeProduto;
    }

    public function getQuantidadeProduto() {
        return $this->quantidadeProduto;
    }

    public function getValorProduto() {
        return $this->valorProduto;
    }

    public function setNomeProduto($nomeProduto) {
        $this->nomeProduto = $nomeProduto;
    }

    public function setQuantidadeProduto($quantidadeProduto) {
        $this->quantidadeProduto = $quantidadeProduto;
    }

    public function setValorProduto($valorProduto) {
        $this->valorProduto = $valorProduto;
    }

}
