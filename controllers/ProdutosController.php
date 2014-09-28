<?php

@session_start();

require_once '../dao/ProdutoDao.class.php';

$dados = $_POST['dados'];

switch ($_REQUEST['action']) {
    case 1:

        //Inserção de Produto no Banco

        $flag = 1; //Varivel booleana, verificação dados
        //Verificando se existe dados vazios
        foreach ($dados as $valor) {
            if ($valor == "") {
                $flag = 0;
            }
        }

        //Inicio de Envio para persistencia
        if ($flag) {
            //moeda verificação
            $moeda_check = str_replace(',', '.', str_replace('.', '', $dados[2])); //Explode moeda para verificação

            /* Verificação de valores numericos antes de enviar valores resgatados ao Objeto */
            if (is_int((int) $dados[1]) && is_numeric($moeda_check)&&((int)$dados[1] > 0 )) {

                //Enviando dados para o Objeto de produtos, convertendo Nome do produto em UCWORDS
                $produto = new Produto(ucwords($dados[0]), $dados[1], $moeda_check);

                //Persistindo Produto no Banco
                $daoProduto = new ProdutoDao();
                
                //Variavel para comparação de igualdade de registro
                $p_nome = $daoProduto->getProduto($dados[0]);

                /*Verifica duplicidade de produto ,para inserção
                 * usando a função strcmp para comparar como case sensitive
                 * usando ucwords para formatar nome
                 */
                if (!strcmp(ucwords($p_nome[0]->nome_produtos),$produto->getNomeProduto())) {
                    header("location: ../views/Aviso.php?info=Produto já existente!");
                } else {
                    $daoProduto->insert($produto);
                    header("location: ../views/CadastroProduto.php");
                }
            } else {
                header("location: ../views/Aviso.php?info=Houve um erro ao cadastrar, confira seus dados corretamente!");
            }
        }
        break;
    case 2:
        //Resgatando registro
        $daoProduto = new ProdutoDao();
        $data = $daoProduto->getId($_REQUEST['id']); //Passando parametro do id do registro a ser deletado
        $_SESSION['produto_update'] = serialize($data);//Passando objeto serializado por sessão
        $_SESSION['action'] = 4;//sessão para atualização
        header("location: ../views/CadastroProduto.php");
        break;
    case 3:
        //Deletando registro
        $daoProduto = new ProdutoDao();
        $daoProduto->delete($_REQUEST['id']); //Passando parametro do id do registro a ser deletado
        header("location: ../views/CadastroProduto.php");
        break;
    case 4:
        //Alteração de Produto no Banco

        $flag = 1; //Varivel booleana, verificação dados
        //Verificando se existe dados vazios
        foreach ($dados as $valor) {
            if ($valor == "") {
                $flag = 0;
            }
            
        }

        //Inicio de Envio para persistencia
         if ($flag) {
            //moeda verificação
            $moeda_check = str_replace(',', '.', str_replace('.', '', $dados[2])); //Explode moeda para verificação
            
            /* Verificação de valores numericos antes de enviar valores resgatados ao Objeto */
            if (is_int((int) $dados[1]) && is_numeric($moeda_check)&&((int)$dados[1] > 0 )) {

                //Enviando dados para o Objeto de produtos, convertendo Nome do produto em UCWORDS
                $produto = new Produto(ucwords($dados[0]), $dados[1],  $moeda_check);

                //Persistindo Produto no Banco
                $daoProduto = new ProdutoDao();
                
                //Verifica duplicidade de produto,para inserção
                if (($daoProduto->getProduto($produto->getNomeProduto())->nome_produtos == $produto->getNomeProduto())&&($daoProduto->getProduto($produto->getNomeProduto())->id_produtos != (int)$dados[3])) {
                    header("location: ../views/Aviso.php?info=Produto já existente!");
                } else {
                    $daoProduto->update($produto, $dados[3]);
                    header("location: ../views/CadastroProduto.php");
                }
            } else {
                header("location: ../views/Aviso.php?info=Houve um erro ao cadastrar, confira seus dados corretamente!");
            }
        }
        break;
        case 5:
        //Resgatando registro
        $daoProduto = new ProdutoDao();
        $data = $daoProduto->getProduto($_REQUEST['search-produto']); //Passando parametro do produto a ser procurado
        $_SESSION['produtos'] = serialize($data);
        header("location: ../views/CadastroProduto.php");
        break;
    
    default:
        break;
}
