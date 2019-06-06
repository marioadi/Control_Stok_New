<?php session_start();
include 'usuario.class.php';
include 'log.class.php';

$usuario = new Usuario();
$log = new Log();

$usuario->loginAuth($_SESSION['login']);

if(isset($_GET['logout'])){
    $log->getLog("Usuário ".strtoupper($usuario->getNomeUsuarioLogado())." deslogou do sistema!");
    $usuario->logout();
}

?>
<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Control Stok</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/MyStyle.css" type="text/css">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body>
        <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="dashboard.php"><p class="text-info text-uppercase">Control Stok</p></a>
                <a class="navbar-brand hidden" href="./"><p class="text-info text-uppercase">CS</p></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="dashboard.php"> <i></i> PAINEL DE CONTROLE </a>
                    </li>

                    <h3 class="menu-title">PROCEDIMENTOS</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i></i>PRODUTOS</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i></i><a href="index.php">Listar</a></li>
                            <li><i></i><a href="cadastro_produto.php">Cadastrar</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i></i>USUÁRIO</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i></i><a href="listar_usuarios.php">Listar</a></li>
                            <li><i></i><a href="cadastro_usuario.php">Cadastrar</a></li>
                        </ul>
                    </li>

                    <h3 class="menu-title">OUTROS</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i></i>PAGINAS</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i></i><a href="new_car.php">Carrinho</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class=" right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">

                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <h6><?php echo $usuario->getNomeUsuarioLogado(); ?></h6>
                        </a>
                        <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="#"><i class="fa fa- user"></i>Meu Perfil</a>
                                <a class="nav-link" href="#"><i class="fa fa- user"></i>Notificações <span class="count">5</span></a>
                                <a class="nav-link" href="#"><i class="fa fa -cog"></i>Configurações</a>
                                <a class="nav-link" href="?logout"><i class="fa fa-power -off"></i>Sair</a>
                        </div>
                    </div>
                </div>
            </div>
        </header><!-- /header -->
        <!-- Header-->