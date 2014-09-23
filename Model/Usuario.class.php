<?php

class Usuario {

    private $nomeUsuario;
    private $emailUsuario;
    private $senhaUsuario;
    private $dataNascimentoUsuario;

    function __construct($nomeUsuario, $emailUsuario, $senhaUsuario, $dataNascimentoUsuario) {
        $this->nomeUsuario = $nomeUsuario;
        $this->emailUsuario = $emailUsuario;
        $this->senhaUsuario = $senhaUsuario;
        $this->dataNascimentoUsuario = $dataNascimentoUsuario;
    }
    
    public function getNomeUsuario() {
        return $this->nomeUsuario;
    }

    public function getEmailUsuario() {
        return $this->emailUsuario;
    }

    public function getSenhaUsuario() {
        return $this->senhaUsuario;
    }

    public function getDataNascimentoUsuario() {
        return $this->dataNascimentoUsuario;
    }

    public function setNomeUsuario($nomeUsuario) {
        $this->nomeUsuario = $nomeUsuario;
    }

    public function setEmailUsuario($emailUsuario) {
        $this->emailUsuario = $emailUsuario;
    }

    public function setSenhaUsuario($senhaUsuario) {
        $this->senhaUsuario = $senhaUsuario;
    }

    public function setDataNascimentoUsuario($dataNascimentoUsuario) {
        $this->dataNascimentoUsuario = $dataNascimentoUsuario;
    }

}
