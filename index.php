<?php include 'header.php' ;
      include 'produto.class.php';

      $produto = new Produto();
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
                                Lista de Produtos
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
                                            <th>IMAGEM</th>
                                            <th>NOME</th>
                                            <th>DESCRICAO</th>
                                            <th>PRECO</th>
                                            <th>QUANTIDAE</th>
                                            <th>DATA</th>
                                            <th>AÇÔES</th>
                                        </tr>
                                    <?php

                                    // Buscar todos
                                    $sql = $produto->listarTodos();

                                    // INCIO DA PAGINAÇÃO
                                    $nro_pag = 10;
                                    if(isset($_GET['num'])){
                                        if(isset($_GET['num'])){
                                            $nro_pag = $_GET['num'];
                                        }else{
                                            $nro_pag = 1;
                                        }
                                    }else{
                                        $nro_pag = 1;
                                    }

                                    $dadosPagination = $produto->pagination( $sql,  $nro_pag );
                                    $sql = $dadosPagination['sql'];
                                    // FIM DA PAGINAÇÃO

                                    // Excluir Produto..
                                    if (isset($_POST['id_ex'])) {
                                        $produto->deleteProduct($_POST['id_ex']);    
                                    }

                                    // Buscar todos
                                    //$sql = "select * from produtos ORDER BY `id` ASC";
                                    //$sql = $pdo->query($sql);

                                    // Bucar pelo campo de busca
                                    if (isset($_POST['buscar'])) {
                                        $sql = $produto->campoDeBusca(); 
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
                                        <td> 
                                            <?php if($imagem == ''): ?>
                                                <img class="img-thumbnail" src="images/produto-sem-imagem.png" width="60" height="60" title="Imagem não cadastrada" />
                                            <?php else: ?>
                                                <img class="img-thumbnail" src="<?php echo $imagem; ?>" width="60" height="60"/>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo $nome; ?></td>
                                        <td><?php echo $descricao; ?></td>
                                        <td> R$ <?php echo $preco; ?></td>
                                        <td><?php echo $quantidade; ?></td>
                                        <td><?php echo $data; ?></td>
                                        <td>
                                            <form method="POST" style="float: left; margin-right: 5px;">
                                                <input type="hidden" name="id_ex" value="<?php echo $id; ?>">

                                                <button class="btn btn-danger" style="border-radius: 20px;" type="submit"><span class="fa fa-remove"></span></button>
                                            </form>
                                            <form action="editar-produto.php" method="POST" style="float: left;">
                                                <input type="hidden" name="id_ed" value="<?php echo $id; ?>">
                                                <input type="hidden" name="imagem" value="<?php echo $imagem; ?>">
                                                <input type="hidden" name="nome" value="<?php echo $nome; ?>">
                                                <input type="hidden" name="descricao" value="<?php echo $descricao; ?>">
                                                <input type="hidden" name="preco" value="<?php echo $preco; ?>">
                                                <input type="hidden" name="quantidade" value="<?php echo $quantidade; ?>">
                                                <input type="hidden" name="data" value="<?php echo $data; ?>">

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
                            
                            <div class="centralizar-divs alocar">
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