<?php 
require 'conexao.php'; 
session_start();

if (isset($_SESSION['login']) && !empty($_SESSION['login']) ) {
    $id = addslashes($_SESSION['login']);

    $sql = $pdo->query("SELECT * FROM login WHERE id = ".$id);
    if ($sql->rowCount() > 0) {
        $ln = $sql->fetch();
        $nome = $ln['usuario'];
    }
}



?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Adi Manager</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="css/MyStyle.css" type="text/css">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
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
                <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"> <i></i> PAINEL DE CONTROLE </a>
                    </li>

                    <h3 class="menu-title">PROCEDIMENTOS</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i></i>PRODUTOS</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i></i><a href="cadastro_produto.php">Cadastrar</a></li>
                            <li><i></i><a href="#">Editar</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i></i>USUÁRIO</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i></i><a href="#">Cadastrar</a></li>
                            <li><i></i><a href="#">Editar</a></li>
                        </ul>
                    </li>

                    <h3 class="menu-title">OUTROS</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i></i>PAGINAS</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i></i><a href="index.php">Login</a></li>
                            <li><i></i><a href="carrinho.php">Carrinho</a></li>
                            <li><i></i><a href="#">Recuperar senha</a></li>
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
                            <h6><?php echo $nome; ?></h6>
                        </a>
                        <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="#"><i class="fa fa- user"></i>Meu Perfil</a>
                                <a class="nav-link" href="#"><i class="fa fa- user"></i>Notificações <span class="count">5</span></a>
                                <a class="nav-link" href="#"><i class="fa fa -cog"></i>Configurações</a>
                                <a class="nav-link" href="sair.php"><i class="fa fa-power -off"></i>Sair</a>
                        </div>
                    </div>
                </div>
            </div>
        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Painel de Controle</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- INIT CODE -->

        <div class="content mt-3">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover table-light">
                        <tr>
                            <td class="bg-info" colspan="10" align="center"><b>DADOS DO PRODUTO</b></td>
                        </tr>
                        <tr>
                            <td colspan="10" align="center">
                                <form  method="POST">
                                    BUSCAR: <input style="border-radius: 10px;" type="text" name="buscar" onchange="submit();"  require="true">
                                    <!-- <input type="submit" value="BUSCAR" > -->
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <th>ID</th>
                            <th>IMAGEM</th>
                            <th>NOME</th>
                            <th>DESCRICAO</th>
                            <th>PRECO</th>
                            <th>QUANTIDAE</th>
                            <th>DATA</th>
                            <th> ** </th>
                            <th> ** </th>
                            <th> ** </th>
                        </tr>
                         
                        <?php

                        // Buscar todos
                        $sql = $pdo->query("select * from produtos");

                        // INCIO DA PAGINAÇÃO
                        //Quantidade de registros
                        $nro = $sql->rowCount($sql);

                        if($nro == 0){
                            echo "Não existe registro no banco de dados!";
                        }

                        $regs_pag = 10;
                        if(isset($_GET['num'])){
                            $nro_pag = $_GET['num'];
                        }else{
                            $nro_pag = 1;
                        }

                        if(is_numeric($nro_pag)){
                            $init = ($nro_pag-1) * $regs_pag;
                        }else{
                            $init = 0;
                        }

                        $sql = "select * from produtos ORDER BY nome limit $init, $regs_pag";
                        $sql = $pdo->query($sql);

                        $quant_pag = ceil($nro / $regs_pag);
                        // FIM DA PAGINAÇÃO


                        // Excluir Produto..
                        if (isset($_POST['id_ex'])) {
                                $id = $_POST['id_ex'];
                                $sql = "delete from produtos where id =".$id;
                                $pdo->query($sql);
                                
                                $sql = "select * from produtos ORDER BY `id` ASC";
                                $sql = $pdo->query($sql);
                        }

                        // Buscar todos
                        //$sql = "select * from produtos ORDER BY `id` ASC";
                        //$sql = $pdo->query($sql);
                        

                        // Bucar pelo campo de busca
                        if (isset($_POST['buscar'])) {
                            $sql = "select * from produtos where nome like '%". $_POST['buscar'] ."%' OR descricao like '%". $_POST['buscar'] ."%' ";
                            $sql = $pdo->query($sql);
                        }
                        
                        if ($sql->rowCount() > 0) {
                            foreach($sql->fetchAll() as $ln){
                                $id = $ln['id'];
                                $imagem = $ln['imagem'];
                                $nome = $ln['nome'];
                                $descricao = $ln['descricao'];
                                $preco = $ln['preco'];
                                $quantidade = $ln['quantidade'];
                                $data = $ln['data'];
                        ?>

                        <tr>
                            <td><?php echo $id; ?></td>
                            <td> <img class="img-thumbnail" src="<?php echo $imagem; ?>" width="60" height="60"/> </td>
                            <td><?php echo $nome; ?></td>
                            <td><?php echo $descricao; ?></td>
                            <td> R$ <?php echo $preco; ?></td>
                            <td><?php echo $quantidade; ?></td>
                            <td><?php echo $data; ?></td>
                            <td>
                                <form action="new_car.php" method="POST">
                                    <input type="hidden" name="id_txt" value="<?php echo $id; ?>">
                                    <input type="hidden" name="nome" value="<?php echo $nome; ?>">
                                    <input type="hidden" name="descricao" value="<?php echo $descricao; ?>">
                                    <input type="hidden" name="preco" value="<?php echo $preco; ?>">
                                    <input type="hidden" name="quantidade" value="1">

                                    <input style="border-radius: 15px;" class="btn btn-primary" type="submit" value="Carrinho">
                                </form>
                            </td>
                            <td>
                                <form method="POST">
                                    <input type="hidden" name="id_ex" value="<?php echo $id; ?>">
                                    <input style="border-radius: 15px;" class="btn btn-danger" type="submit" value="Excluir">
                                </form>
                            </td>
                            <td>
                                <form action="editar-p.php" method="POST">
                                    <input type="hidden" name="id_ed" value="<?php echo $id; ?>">
                                    <input type="hidden" name="imagem" value="<?php echo $imagem; ?>">
                                    <input type="hidden" name="nome" value="<?php echo $nome; ?>">
                                    <input type="hidden" name="descricao" value="<?php echo $descricao; ?>">
                                    <input type="hidden" name="preco" value="<?php echo $preco; ?>">
                                    <input type="hidden" name="quantidade" value="<?php echo $quantidade; ?>">
                                    <input type="hidden" name="data" value="<?php echo $data; ?>">

                                    <input style="border-radius: 15px;" class="btn btn-warning" type="submit" value="Editar">
                                </form>
                            </td>
                        </tr>
                        <?php
                            }
                         }

                        ?>
                    </table>
                </div>
                <?php

                  if($nro_pag > 1){
                      echo '<a href="index.php?num='.($nro_pag-1).'"> Anterior </a>';
                  }

                  for($i = 1; $i <= $quant_pag; $i++){
                      if($i == $nro_pag){
                          echo $i." ";
                      }else{
                          echo '<a href="index.php?num='.$i.'"> '.$i.' <a/>';
                      }
                  }

                  if($nro_pag < $quant_pag){
                      echo '<a href="index.php?num='.($nro_pag + 1).'"> Proximo </a>';
                  }

                ?>
            </div>
        </div>

        <!-- THE END CODE -->

    </div><!-- /#right-panel -->
    <!-- Right Panel -->

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

    <script src="assets/js/popper.min.js"></script>

    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>

    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>

</body>
</html>
