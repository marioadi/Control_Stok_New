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
                            <li class="active">Dashboard > Cadastro Produtos</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- INIT CODE -->
        <?php
            
        ?>
        <div class="content mt-3">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="receberProduto.php">

                         <div class="container">
                            <div class="accordion">
                                <div class="card">
                                    <div class="card-header">
                                       Dados do Produto
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12">
                                                <div class="form-group">
                                                    <div class="col-xs-12 col-md-4">
                                                        <label class="control-label">Imagem</label>
                                                        <input class="form-control" type="file" name="imagem-cad">
                                                    </div>
                                                    <div class="col-xs-12 col-sm-4">
                                                        <label class="control-label">Nome</label>
                                                        <input class="form-control" type="text" name="nome-cad">
                                                    </div>
                                                    <div class="col-xs-12 col-sm-4">
                                                        <label class="control-label">Descrição</label>
                                                        <input class="form-control" type="text" name="descricao-cad">
                                                    </div>    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12">
                                                <div  class="form-group espaco-topo">
                                                    <div class="col-xs-12 col-sm-4">
                                                        <label class="control-label">Preço</label>
                                                        <input class="form-control" type="text" name="preco-cad" >
                                                    </div>
                                                    <div class="col-xs-12 col-sm-4">
                                                        <label class="control-label">Quantidade</label>
                                                        <input class="form-control" type="text" name="quantidade-cad" >
                                                    </div>
                                                    <div class="col-xs-12 col-sm-4">
                                                        <label class="control-label">Data</label>
                                                        <input class="form-control" type="text" name="data-cad" value="<?php echo date("Y-m-d"); ?>">
                                                    </div> 
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="centralizar-divs">
                                            <div class="row espaco-topo">
                                                <div  class="form-group  centralizar-divs">
                                                    <div class="col-xs-12 col-sm-12">
                                                        <input type="submit" value="Cadastrar" class="btn btn-primary">
                                                    </div>    
                                                    
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        </div>
					</form>
                </div>
            </div>
        </div>

       
        

        <!-- THE END CODE -->

    </div><!-- /#right-panel -->
    <!-- Right Panel -->
    <?php include 'footer.php'?>