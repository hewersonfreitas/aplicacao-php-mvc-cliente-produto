<!DOCTYPE html>
<?php
@session_start(); //Inicia sessão
$data; //Valor para Objeto de alteração

/* Verifica se a $_SESSION['produto_update'] existe, caso exista a action recebera 
 * o valor para alteração, caso contrario valor de inserção; */
isset($_SESSION['produto_update']) ? $_SESSION['action'] = 4 : $_SESSION['action'] = 1;

/* Se existir sessão $_SESSION, iremos passar o Objeto a variavel $data */
isset($_SESSION['produto_update']) ? $data = unserialize($_SESSION['produto_update']) : false;
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>App MVC Cadastro Usuarios e Produtos</title>
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="../css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" href="../css/aquaadmin.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    </head>
    <body>
        <script type="text/javascript" src="../js/jquery.min.js"></script>
        <script type="text/javascript" src="../js/jquery.maskMoney.js"></script>
        <script type="text/javascript" src="../js/validar-produtos.js"></script>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">App MVC Cadastro Usuarios e Produtos</a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12 top-bar">                   
                </div>
                <div class="span2 sp2 all-left">
                    <div class="sidebar-nav">
                        <ul class="nav nav-list">
                            <li class="active"><a href="../index.php" ><i class="icon-home icon-aqua"></i> Home </a></li>
                            <li><a href="CadastroUsuario.php"><i class="icon-user icon-aqua"></i> Cadastro de Usuarios</a></li>
                            <li><a href="CadastroProduto.php" ><i class="icon-shopping-cart icon-aqua"></i> Cadastro de Produtos  </a></li>
                        </ul>
                    </div>
                </div><!--/span-->
                <div class="span10 content">
                    <div id="content">
                        <div class="span11 panel">
                            <div class="panel-header">
                                <i class="icon-tasks icon-blue"></i>
                                <h2>Cadastro Produto </h2>
                            </div>
                            <div class="panel-content">
                                <p>
                                </p><form id="form-cad-produto" class="form-horizontal" action="../controllers/ProdutosController.php?action=<?php echo $_SESSION['action'] ?>" method="POST">
                                    <fieldset>
                                        <div class="control-group">
                                            <label for="inputSuccess" class="control-label">Produto:</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="produto" name="dados[]" value="<?php echo $data->nome_produtos; ?>"><i id="prod-msg"></i>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="inputSuccess" class="control-label">Quantidade:</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="quantidade" name="dados[]"  value="<?php echo $data->qtd_produtos; ?>"><i id="qtd-msg"></i>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="inputSuccess" class="control-label">Valor:</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="valor" value="<?php echo number_format($data->valor_produtos, 2, ',', '.'); ?>"name="dados[]"><i id="valor-msg"></i>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <div class="controls">
                                                <input type="hidden" class="input-medium" value="<?php echo ($data->id_produtos == "") ? "-" : $data->id_produtos; ?>"name="dados[]">
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button class="btn btn-primary" type="submit">Enviar</button>
                                            <button class="btn" type="reset">Cancel</button>
                                        </div>
                                    </fieldset>
                                </form>
                                <?php
                                unset($_SESSION["produto_update"]); //Destruindo sessão de update
                                ?>
                            </div>
                        </div>

                        <!-- Listagem Produtos-->
                        <div class="span11 panel">
                            <div class="panel-header" style="margin-bottom: 0px;">
                                <i class="icon-list-alt icon-blue"></i>
                                <h2>Produtos</h2>                                
                            </div>
                            <table class="table table-striped table-bordered table-condensed">

                                <div class="controls" style="margin-bottom: 5px;">
                                    <div class="btn-group">                                        
                                        <form class="hidden-phone" style="margin-bottom: 5px;" action="<?php echo $PHP_SELF; ?>" method="POST" >
                                            <label class="pull-left" style="margin-top: 3px;" for="inputSuccess" class="control-label">Buscar Produto: </label>
                                            <input class="input-medium pull-left" type="text" name="search-produto" placeholder="Digite o produto!!" title="Clique no botão de busca, para ver todos!" style="margin-bottom: 0px;" >
                                            <button type="submit" class="btn btn-small btn-info"><i class="icon-search"></i></button>
                                        </form>
                                    </div>
                                </div>

                                <thead>
                                    <tr>
                                        <th>#Id</th>
                                        <th>Produto</th>
                                        <th class=>Quantidade</th>
                                        <th class="hidden-phone">Valor</th>
                                        <th>Operações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once '../dao/ProdutoDao.class.php';
                                    /* Logo abaixo faremos uma busca por produtos cadastrados
                                     * para exibirmos em um lista. Com suas operações de edição
                                     * e remoção
                                     */
                                    $daoProduto = new ProdutoDao();

                                    //Variavel para armazenar produtos
                                    $produtos = 0;

                                    /* Caso tenha sido enviado algum dado da mesma pagina
                                     * verifica-se na busca quais foram requisitados.
                                     * 
                                     * Se todos os registros, ou por produtos.
                                     * 
                                     */
                                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                        $produtos = $daoProduto->getProduto($_REQUEST['search-produto']); //Resgata registro de unico produto ou vários através da clausula LIKE
                                    } else {
                                        $produtos = $daoProduto->getAll(); //Resgata todos os registros
                                    }

                                    //Listagem de Produtos
                                    foreach ($produtos as $row) {
                                        ?>
                                        <!-- Linha e Colunas a serem exibidos os registros através de 
                                             um foreach
                                        -->
                                        <tr class="id<?php echo $row->id_produtos; ?>">
                                            <td class="id"><?php echo $row->id_produtos; ?></td>
                                            <td><?php echo $row->nome_produtos; ?></td>
                                            <td><?php echo $row->qtd_produtos; ?></td>
                                            <td class="hidden-phone"><?php echo "R$" . number_format($row->valor_produtos, 2, ',', '.'); ?></td>

                                            <td class="operations">
                                                <div class="btn-group pull-left">
                                                    <a href="../controllers/ProdutosController.php?action=2&id=<?php echo $row->id_produtos; ?>" class="btn btn-small btn-warning table-edit"><i class="icon-edit"></i></a>
                                                </div>
                                                <div class="btn-group pull-left">
                                                    <a href="../controllers/ProdutosController.php?action=3&id=<?php echo $row->id_produtos; ?>"class="btn btn-small btn-danger"><i class="icon-remove"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td class="hidden-phone">Total Quantidade: 
                                            <?php
                                            /*
                                             * Somando quantidade total, a partir produtos resgatados 
                                             * na busca anterior.
                                             */

                                            //Variavel para armazenamento de soma das quantidades
                                            $somaQtd = 0;

                                            //Verificando se existe algo enviado para a pagina
                                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                                /*
                                                 * Laço foreach para verificar quantos registros
                                                 * recuperados, e feita a soma e armazenada na variavel
                                                 * para impressão logo após
                                                 */
                                                foreach ($produtos as $row) {
                                                    $somaQtd += (int) $daoProduto->getQtd($row->id_produtos)->qtd_produtos;
                                                }
                                                echo $somaQtd;
                                            } else {
                                                //Resgata soma de todos os registros, imprime.
                                                isset($daoProduto->getSumQtdAll()->sum_qtd) ? $val = $daoProduto->getSumQtdAll()->sum_qtd : false;
                                                echo $val;
                                            }
                                            ?>
                                        </td>
                                        <td class="hidden-phone">
                                            Total Valor:
                                            <?php
                                            /*
                                             * Somando quantidade total, a partir produtos resgatados 
                                             * na busca anterior.
                                             */

                                            //Variavel para armazenamento de soma dos
                                            $somaValor = 0;

                                            //Verificando se existe algo enviado para a pagina
                                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                                /*
                                                 * Laço foreach para verificar quantos registros
                                                 * recuperados, e feita a soma e armazenada na variavel
                                                 * para impressão logo após
                                                 */
                                                foreach ($produtos as $row) {
                                                    $somaValor += $daoProduto->getVal($row->id_produtos)->valor_produtos;
                                                }
                                                echo "R$" . number_format($somaValor, 2, ',', '.');
                                            } else {
                                                //Resgata soma de todos os registros
                                                echo "R$" . number_format($daoProduto->getSumValAll()->sum_valor, 2, ',', '.');
                                            }
                                            ?>
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="clear"></div>
                        </div><!--Fim Listagem-->
                    </div><!-- content -->
                </div>
            </div><!--/row-->
            <hr />
            <footer>
                <p>&copy; <a href="">App MVC Cadastro Usuarios e Produtos</a></p>
            </footer>
        </div><!--/.fluid-container-->
        <script type='text/javascript' src='../js/bootstrap.min.js'></script>

    </body>
</html>