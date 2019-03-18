<?php include 'header.php' ?>

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
                                    Lista de Produtoss
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
                                                <form action="new_car.php" style="float: left; margin-right: 5px;" method="POST">
                                                    <input type="hidden" name="id_txt" value="<?php echo $id; ?>">
                                                    <input type="hidden" name="nome" value="<?php echo $nome; ?>">
                                                    <input type="hidden" name="descricao" value="<?php echo $descricao; ?>">
                                                    <input type="hidden" name="preco" value="<?php echo $preco; ?>">
                                                    <input type="hidden" name="quantidade" value="1">

                                                    <!-- <input style="border-radius: 15px;" class="btn btn-primary" type="submit" value="Carrinho"> -->
                                                    <button class="btn btn-primary" type="submit"><span class="fa fa-cart-arrow-down"></span></button>
                                                </form>
                                                <form method="POST" style="float: left; margin-right: 5px;">
                                                    <input type="hidden" name="id_ex" value="<?php echo $id; ?>">
                                                    <!-- <input style="border-radius: 15px;" class="btn btn-danger" type="submit" value="Excluir"></input> -->
                                                    <button class="btn btn-danger" type="submit"><span class="fa fa-remove"></span></button>
                                                </form>
                                                <form action="editar-p.php" method="POST" style="float: left;">
                                                    <input type="hidden" name="id_ed" value="<?php echo $id; ?>">
                                                    <input type="hidden" name="imagem" value="<?php echo $imagem; ?>">
                                                    <input type="hidden" name="nome" value="<?php echo $nome; ?>">
                                                    <input type="hidden" name="descricao" value="<?php echo $descricao; ?>">
                                                    <input type="hidden" name="preco" value="<?php echo $preco; ?>">
                                                    <input type="hidden" name="quantidade" value="<?php echo $quantidade; ?>">
                                                    <input type="hidden" name="data" value="<?php echo $data; ?>">

                                                    <!-- <input style="border-radius: 15px;" class="btn btn-warning" type="submit" value="Editar"> -->
                                                    <button class="btn btn-warning" type="submit"><span class="fa fa-pencil"></span></button>
                                                </form>
                                            </td>
                                            <!-- <td>
                                                
                                            </td>
                                            <td>
                                                
                                            </td> -->
                                        </tr>
                                        <?php
                                            }
                                         }

                                        ?>
                                    </table>

                                </div>
                                 <div class="centralizar-divs">
                                        <?php

                                            if($nro_pag > 1){
                                                echo '<a class="btn btn-success" href="index.php?num='.($nro_pag-1).'"> Voltar </a>';
                                            }

                                            for($i = 1; $i <= $quant_pag; $i++){
                                                if($i == $nro_pag){
                                                    echo '<a class="btn btn-success active"> '.$i." ". '</a>';
                                                }else{
                                                    echo '<a class="btn btn-success" href="index.php?num='.$i.'"> '.$i.' </a>';
                                                }
                                             }

                                            if($nro_pag < $quant_pag){
                                                echo '<a class="btn btn-success" href="index.php?num='.($nro_pag + 1).'"> Proximo </a>';
                                            }
                                        ?>
                        
                                    </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>

        <!-- THE END CODE -->

    </div><!-- /#right-panel -->
    <!-- Right Panel -->

<?php include 'footer.php' ?>
