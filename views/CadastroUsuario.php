<!DOCTYPE html>
<?php
@session_start(); //Inicia sessão
$data; //Valor para Objeto de alteração

/* Verifica se a $_SESSION['user_update'] existe, caso exista a action recebera 
 * o valor para alteração, caso contrario valor de inserção; */
isset($_SESSION['user_update']) ? $_SESSION['action'] = 4 : $_SESSION['action'] = 1;

/* Se existir sessão $_SESSION, iremos passar o Objeto a variavel $data */
isset($_SESSION['user_update']) ? $data = unserialize($_SESSION['user_update']) : false;
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
        <script type="text/javascript" src="../js/jquery.mask.min.js"></script>
        <script type="text/javascript" src="../js/validar.js"></script>
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
                            <li><a href="CadastroUsuario.php"><i class="icon-tasks icon-aqua"></i> Usuario</a></li>
                        </ul>
                    </div>
                </div><!--/span-->
                <div class="span10 content">
                    <div id="content">
                        <div class="span11 panel">
                            <div class="panel-header">
                                <i class="icon-tasks icon-blue"></i>
                                <h2>Cadastro Usuario</h2>
                            </div>
                            <div class="panel-content">
                                <p>
                                </p><form id="form-cad-usuario" class="form-horizontal" action="../controllers/UsuarioController.php?action=<?php echo $_SESSION['action'] ?>" method="POST">
                                    <fieldset>
                                        <div class="control-group">
                                            <label for="inputSuccess" class="control-label">Nome:</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="nome" name="dados[]" value="<?php echo $data->nome_usuario; ?>"><i id="nome-msg"></i>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="inputSuccess" class="control-label">Email:</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="email" name="dados[]"  value="<?php echo $data->email_usuario; ?>"><i id="email-msg"></i>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="inputSuccess" class="control-label">Senha:</label>
                                            <div class="controls">
                                                <input type="password" class="input-medium" id="senha" value="<?php echo $data->senha_usuario; ?>"name="dados[]"><i id="senha-msg"></i>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="inputSuccess" class="control-label">Data Nascimento:</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="data_nascimento" value="<?php echo $data->data_nasc_usuario; ?>" name="dados[]"><i id="data-msg"></i>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <div class="controls">
                                                <input type="hidden" class="input-medium" value="<?php echo ($data->id_usuario == "") ? "-" : $data->id_usuario; ?>"name="dados[]">
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button class="btn btn-primary" type="submit">Enviar</button>
                                            <button class="btn" type="reset">Cancel</button>
                                        </div>
                                    </fieldset>
                                </form>
                                <?php
                                unset($_SESSION["user_update"]); //Destruindo sessão de update
                                ?>
                            </div>
                        </div>

                        <!-- Listagem Usuarios-->
                        <div class="span11 panel">
                            <div class="panel-header">
                                <i class="icon-list-alt icon-blue"></i>
                                <h2>Usuarios</h2>
                            </div>
                            <table class="table table-striped table-bordered table-condensed">
                                <thead>
                                    <tr>
                                        <th>#Id</th>
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th>Data Nacimento</th>
                                        <th>Operações</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php
                                    require_once '../dao/UsuarioDao.class.php';
                                    /* Logo abaixo faremos uma busca por usuario cadastrados
                                     * para exibirmos em um lista. Com suas operações de edição
                                     * e remoção
                                     */
                                    $daoUsuario = new UsuarioDao();
                                    //Imprimindo Usuarios
                                    foreach ($daoUsuario->getAll() as $row) {
                                        ?>

                                        <tr class="id<?php echo $row->id_usuario; ?>">
                                            <td class="id"><?php echo $row->id_usuario; ?></td>
                                            <td><?php echo $row->nome_usuario; ?></td>
                                            <td><?php echo $row->email_usuario; ?></td>
                                            <td><?php echo implode("/", array_reverse(explode("-", $row->data_nasc_usuario))); ?></td>

                                            <td class="operations">
                                                <div class="btn-group pull-left">
                                                    <a href="../controllers/UsuarioController.php?action=2&id=<?php echo $row->id_usuario; ?>" class="btn btn-small btn-warning table-edit"><i class="icon-edit"></i></a>
                                                </div>
                                                <div class="btn-group pull-left">
                                                    <a href="../controllers/UsuarioController.php?action=3&id=<?php echo $row->id_usuario; ?>"class="btn btn-small btn-danger"><i class="icon-remove"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
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