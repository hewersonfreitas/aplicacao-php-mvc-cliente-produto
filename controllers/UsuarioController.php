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
            //array data verificação
            $data_check = explode('/', $dados[3]); //Explode data para verificação

            /* Verificação de email antes de enviar, valores resgatados ao Objeto */
            if (filter_var($dados[1], FILTER_VALIDATE_EMAIL) && checkdate($data_check[1], $data_check[0], $data_check[2])) {
                //Formatando data
                $data = implode("-", array_reverse(explode("/", $dados[3])));
                //Enviando dados para o Objeto de usuario
                $usuario = new Usuario($dados[0], $dados[1], $dados[2], $data);
                //Persistindo Usuario no Banco
                $daoUsuario = new UsuarioDao();

                //Verifica duplicidade de email
                if ($daoUsuario->getEmail($dados[1])->email_usuario == $dados[1]) {

                    header("location: ../views/Aviso.php?info=Email");
                } else {
                    $daoUsuario->insert($usuario);
                    header("location: ../views/CadastroUsuario.php");
                }
            }else{
                header("location: ../views/Aviso.php?info=Houve um erro ao cadastrar, confira seus dados corretamente!");
            }
        }
        break;
    case 2:
        //Deletando registro

        $daoUsuario = new UsuarioDao();
        $data = $daoUsuario->getId($_REQUEST['id']); //Passando parametro do id do registro a ser deletado
        @session_start();
        $_SESSION['user_update'] = serialize($data);
        $_SESSION['action'] = 4;
        header("location: ../views/CadastroUsuario.php?action=4");
        break;
    case 3:
        //Deletando registro
        $daoUsuario = new UsuarioDao();
        $daoUsuario->delete($_REQUEST['id']); //Passando parametro do id do registro a ser deletado
        header("location: ../views/CadastroUsuario.php");
        break;
    case 4:
        //Inserção de Usuario no Banco

        $flag = 1; //Varivel booleana, verificação dados
        //Verificando se existe dados vazios
        foreach ($dados as $valor) {
            if ($valor == "") {
                $flag = 0;
            }
        }

        //Inicio de Envio para persistencia
        if ($flag) {
//array data verificação
            $data_check = explode('/', $dados[3]); //Explode data para verificação

            /* Verificação de email antes de enviar, valores resgatados ao Objeto */
            if (filter_var($dados[1], FILTER_VALIDATE_EMAIL) && checkdate($data_check[1], $data_check[0], $data_check[2])) {
                //Formatando data
                $data = implode("-", array_reverse(explode("/", $dados[3])));

                //Enviando dados para o Objeto de usuario
                $usuario = new Usuario($dados[0], $dados[1], $dados[2], $dados[3]);

                //Persistindo Usuario no Banco
                $daoUsuario = new UsuarioDao();

                //Verifica duplicidade de email
                if ($daoUsuario->getEmail($dados[1])->email_usuario == $dados[1]) {
                    header("location: ../views/Aviso.php?info=Email já existente, tente novamente com email válido !");
                } else {
                    $daoUsuario->update($usuario, $dados[4]);
                    header("location: ../views/CadastroUsuario.php");
                }
            }else{
                header("location: ../views/Aviso.php?info=Houve um erro ao cadastrar, confira seus dados corretamente!");
            }
        }
        break;
    default:
        break;
}