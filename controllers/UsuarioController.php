<?php

include '../models/Usuario.class.php';
include '../dao/UsuarioDao.class.php';

$dados = $_POST['dados'];

$flag = 1;
foreach ($dados as $valor) {
    if ($valor == "") {
        $flag = 0;
    }
}

if ($flag) {
    /* Verificação de email antes de enviar, valores resgatados ao Objeto */
    if (filter_var($dados[1], FILTER_VALIDATE_EMAIL)) {
        $usuario =  new Usuario($dados[0], $dados[1], $dados[2], $dados[3]);
        $daoUsuario = new UsuarioDao();
        $daoUsuario->insert($usuario);
        var_dump($usuario);
    }
}

