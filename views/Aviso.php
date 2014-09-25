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
                            <li><a href="CadastroUsuario.php"><i class="icon-tasks icon-aqua"></i> Cadastro Cliente</a></li>
                        </ul>
                    </div>
                </div><!--/span-->
                <div class="span10 content">
                    <div id="content">
                        <div class="span11 panel">
                            <div class="panel-header">
                                <i class="icon-exclamation-sign icon-blue"></i>
                                <h2>Operação</h2>
                            </div>
                            <div class="panel-content">
                                <p>
                                </p>
                                <div class="alert alert-danger">
                                    <a class="close" data-dismiss="alert" href="#">×</a>
                                    <div class="alert-icon">
                                        <i class="icon-exclamation-sign icon-red"></i>
                                    </div>
                                    <div class="alert-content">
                                        <h4>Erro ao cadastrar !</h4>
                                        <?php echo $_REQUEST['info']?> já existente, tente novamente com email válido !<br><br>
                                        <a class="btn" href="../index.php"> Voltar ao Inicio </a>
                                    </div>
                                </div>
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
        <script type='text/javascript' src='../sjs/bootstrap.min.js'></script>
    </body>
</html>
