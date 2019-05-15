<?php include 'header.php' ;

      $usuario = new Usuario();
?> 

<!-- Inicio do conteudo -->
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
                    
                    <div class="container">
                        <div class="card">
                            <div class="card-header">
                                Lista de Usuarios
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <td colspan="10" align="center">
                                            <form  method="POST">
                                                BUSCAR: <input class="form-control col-sm-4" type="text" name="buscar" onchange="submit();"  require="true">
                                                <!-- <input type="submit" value="BUSCAR" > -->
                                            </form>
                                        </td>
                                    </tr>
                                         <tr>
                                            <th>ID</th>
                                            <th>NOME</th>
                                            <th>USUARIO</th>
                                            <th>SENHA</th>
                                            <th>EMAIL</th>
                                            <th>PERMISSAO</th>
                                        </tr>
                                    <?php

                                    // BUSCAR TODOS
                                    $sql = $usuario->listarTodos();

                                    // INCIO DA PAGINAÇÃO
                                    $nro_pag = 10;
                                    if(isset($_GET['num'])){
                                        $nro_pag = $_GET['num'];
                                    }else{
                                        $nro_pag = 1;
                                    }

                                    $dadosPagination = $usuario->pagination( $sql,  $nro_pag );
                                    $sql = $dadosPagination['sql'];
                                    // FIM DA PAGINAÇÃO

                                    // EXCLUIR USUARIO
                                    if (isset($_POST['id_ex'])) {
                                        $usuario->deleteUser($_POST['id_ex']);
                                        $sql = $usuario->listarTodos();
                                    }

                                    // Buscar todos
                                    //$sql = "select * from produtos ORDER BY `id` ASC";
                                    //$sql = $pdo->query($sql);

                                    // BUSCAR PELO CAMPO
                                    if (isset($_POST['buscar'])) {
                                        $sql = $usuario->campoDeBusca($_POST['buscar']); 
                                    }
                                    
                                    if ($sql->rowCount() > 0) {
                                        foreach($sql->fetchAll() as $ln){
                                            $id = $ln['id'];
                                            $nome = $ln['nome'];
                                            $usuario = $ln['usuario'];
                                            $senha = $ln['senha'];
                                            $email = $ln['email'];
                                            $permissao = $ln['permissao'];
                                    ?>

                                    <tr>
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $nome; ?></td>
                                        <td><?php echo $usuario; ?></td>
                                        <td><?php echo $senha; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $permissao; ?></td>
                                        <td>
                                            <form method="POST" style="float: left; margin-right: 5px;">
                                                <input type="hidden" name="id_ex" value="<?php echo $id; ?>">

                                                <button class="btn btn-danger" style="border-radius: 20px;" type="submit"><span class="fa fa-remove"></span></button>
                                            </form>
                                            <form action="editar-usuario.php" method="POST" style="float: left;">
                                                <input type="hidden" name="id_ed" value="<?php echo $id; ?>">
                                                <input type="hidden" name="nome" value="<?php echo $nome; ?>">
                                                <input type="hidden" name="usuario" value="<?php echo $usuario; ?>">
                                                <input type="hidden" name="senha" value="<?php echo $senha; ?>">
                                                <input type="hidden" name="email" value="<?php echo $email; ?>">
                                                <input type="hidden" name="permissao" value="<?php echo $permissao; ?>">
                                                
                                                <button class="btn btn-warning" style="border-radius: 20px;" type="submit"><span class="fa fa-pencil"></span></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                     }

                                    ?>
                                </table>
                            </div>
                            
                            <div class="centralizar-divs--pagination alocar">
                                <?php

                                    if($dadosPagination['numPag'] > 1){
                                        echo '<a class="btn btn-primary" id="border-radius-left" href="index.php?num='.($dadosPagination['numPag']-1).'"> <span class="fa fa-angle-double-left"></span> </a>';
                                    }else {
                                        echo '<a class="btn btn-primary disabled" id="border-radius-left"> <span class="fa fa-angle-double-left"></span> </a>';
                                    }

                                    for($i = 1; $i <= $dadosPagination['quantPag']; $i++){
                                        if($i == $dadosPagination['numPag']){
                                            echo '<a class="btn btn-primary"> '.$i." ". '</a>';
                                        }else{
                                            echo '<a class="btn btn-primary" href="index.php?num='.$i.'"> '.$i.' </a>';
                                        }
                                     }

                                    if($dadosPagination['numPag'] < $dadosPagination['quantPag']){
                                        echo '<a class="btn btn-primary" id="border-radius-right" href="index.php?num='.($dadosPagination['numPag'] + 1).'"> <span class="fa fa-angle-double-right"></span> </a>';
                                    }else{
                                        echo '<a class="btn btn-primary disabled" id="border-radius-right"> <span class="fa fa-angle-double-right"></span> </a>';
                                    }
                                ?>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- THE END CODE -->
    </div>
<?php include 'footer.php' ?>