<?php   include 'header.php'; 
        include 'produto.class.php';

$produto = new Produto();

if(isset($_POST['nome-cad']) && !empty($_POST['nome-cad']) || isset($_POST['valor-cad']) && !empty($_POST['valor-cad']) || isset($_POST['quantidade-cad']) && !empty($_POST['quantidade-cad'])){

    $produto->cadastrar($_POST['imagem-cad'], $_POST['nome-cad'], $_POST['descricao-cad'], $_POST['preco-cad'], $_POST['quantidade-cad'], $_POST['data-cad']);
    
}



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
                    <form method="POST">

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
                                                    <div class="col-xs-12 col-sm-6">
                                                        <a href="index.php" class="btn botao-cinza">
                                                            <i class="fa fa-angle-double-left"></i>
                                                            <span>Voltar</span>
                                                        </a>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6">
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