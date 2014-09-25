<?php

include '../dao/UsuarioDao.class.php';

$dados = $_POST['dados'];

switch ($_REQUEST['action']) {
    case 1:
        //Inserção de Usuario no Banco
        
        $flag = 1; //Varivel booleana, verificação dados
        //
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

                //Enviando dados para o Objeto de usuario
                $usuario = new Usuario($dados[0], $dados[1], $dados[2], $dados[3]);

                //Persistindo Usuario no Banco
                $daoUsuario = new UsuarioDao();
                $daoUsuario->insert($usuario);

                header("location: ../views/Sucesso.php");
            }
        }
        break;
    case 2:
        
        break;

    default:
        break;
}