<!DOCTYPE html>
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
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>
        <script type="text/javascript" src="../js/jquery.min.js"></script>
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
                    <div class="btn-group pull-right">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon-user"></i> Nome
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="icon-user"></i> Pefil</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="icon-off"></i> Sair</a></li>
                        </ul>
                    </div>
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
                            <li class="active"><a href="../index.php"><i class="icon-home icon-aqua"></i> Home</a></li>
                            <li><a href="views/CadastroUsuario.php.php"><i class="icon-tasks icon-aqua"></i> Cadastro Cliente</a></li>
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
                                </p><form id="form-cad-usuario" class="form-horizontal" action="../controllers/UsuarioController.php?action=1" method="POST">
                                    <fieldset>
                                        <div class="control-group">
                                            <label for="inputSuccess" class="control-label">Nome:</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="nome" name="dados[]">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="inputSuccess" class="control-label">Email:</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="email" name="dados[]"><i id="email-msg"></i>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="inputSuccess" class="control-label">Senha:</label>
                                            <div class="controls">
                                                <input type="password" class="input-medium" id="senha" name="dados[]">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="inputSuccess" class="control-label">Data Nascimento:</label>
                                            <div class="controls">
                                                <input type="date" class="input-medium" id="data_nascimento" name="dados[]">
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button class="btn btn-primary" type="submit">Enviar</button>
                                            <button class="btn">Cancel</button>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
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