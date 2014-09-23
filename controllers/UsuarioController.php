<?php

include '../dao/UsuarioDao.class.php';

$dados = $_POST['dados'];

if ($action == 'insert') {
    $flag = 1;
    
    //Verificando se existe dados vazios
    foreach ($dados as $valor) {
        if ($valor == "") {
            $flag = 0;
        }
    }

    //Inicio de Envio para persistencia
    if ($flag) {
        /* Verificação de email antes de enviar, valores resgatados ao Objeto */
        if (filter_var($dados[1], FILTER_VALIDATE_EMAIL)) {

            //Convertendo data BR dd/mm/YYYY para formato da base de dados MySQL YYYY-mm-dd
            $data = explode('/', $dados[3]);
            $data = $data[2] . '-' . $data[1] . '-' . $data[0];

            //Enviando dados para o Objeto de usuario
            $usuario = new Usuario($dados[0], $dados[1], $dados[2], $data);

            //Persistindo Usuario no Banco
            $daoUsuario = new UsuarioDao();
            $daoUsuario->insert($usuario);
        }
    }
}
