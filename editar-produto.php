<?php 
	include 'produto.class.php';

	$produto = new Produto();

	// Vindo do index
	if (isset($_POST['id_ed']) && !empty($_POST['id_ed'])) {
		$ln = $produto->editProduct($_POST['id_ed']);
	}	

	//Vindo do proprio formulário
	if (isset($_POST['id-edit']) && !empty($_POST['id-edit'])) {
		$produto->updateProduct($_POST['id-edit'], 
		$_POST['nome-edit'], $_POST['descricao-edit'], $_POST['preco-edit'], 
		$_POST['quantidade-edit'], $_POST['data-edit'], $_FILES['imagem-edit']);
		$ln = $produto->editProduct($_POST['id-edit']);
	}

	include 'header.php';
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
                            <li class="active">Dashboard > Editar Produto</li>
                        </ol>
                    </div>
                </div>

            </div>
        </div>
        <!-- INIT CODE -->
        <div class="content mt-3">
        	<form method="POST" enctype="multipart/form-data">
	            <div class="row">
	                <div class="col-md-12">
	                    <!-- INICIO CONTEUDO -->
	                    	
	                    	<div class="container">
	                    		<div class="card">
	                    			<div class="card-header">
	                    				Dados do Produto
	                    			</div>
	                    			<div class="card-body">
	                    				<div class="row espaco-topo">
				                    		<div class="col-xs-12 col-sm-12">
				                    			
				                    			<div class="form-group">
				                    				<div class="col-xs-12 col-sm-1">
				                    					<img class="img-circle" src="<?php echo $ln['imagem']; ?>" width="100" heiht="100"/>
				                    					<input class="form-control" type="hidden" name="id-edit" 
				                    						value="<?php echo $ln['id']; ?>">
				                    				</div>

				                    				<div class="col-xs-12 col-sm-6">
				                    					<label class="control-label"> Escolher Imagem </label>
				                    					<input class="form-control" type="file" name="imagem-edit">
				                    				</div>

				                    				<div class="col-xs-12 col-sm-5">
				                    					<label class="control-label"> Nome </label>
				                    					<input class="form-control" type="text" name="nome-edit" 
				                    						value="<?php echo $ln['nome']; ?>">
				                    				</div>
				                    			</div>
				                    		</div>
				                    	</div>

				                    	<div class="row espaco-topo">
				                    		<div class="col-xs-12 col-sm-12">
				                    			<div class="form-group">
				                    				<div class="col-xs-12 col-sm-4">
				                    					<label class="control-label"> Descrição </label>
				                    					<input class="form-control" type="text" name="descricao-edit" 
				                    						value="<?php echo $ln['descricao']; ?>">
				                    				</div>

				                    				<div class="col-xs-12 col-sm-4">
				                    					<label class="control-label"> preco </label>
				                    					<input class="form-control" type="text" name="preco-edit" 
				                    						value="<?php echo $ln['preco']; ?>">
				                    				</div>

				                    				<div class="col-xs-12 col-sm-2">
				                    					<label class="control-label"> Quantidade </label>
				                    					<input class="form-control" type="text" name="quantidade-edit" 
				                    						value="<?php echo $ln['quantidade']; ?>">
				                    				</div>
				                    			
				                    				<div class="col-xs-12 col-sm-2">
				                    					<label class="control-label"> Data </label>
				                    					<input class="form-control" type="text" name="data-edit" 
				                    						value="<?php echo $ln['data']; ?>">
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
                                                        <input type="submit" value="Atualizar" class="btn btn-primary">
                                                    </div>
                                                </div>
                                            </div>    
                                        </div>
	                    			</div>
	                    		</div>
	                    	</div>
	                    <!-- FIM CONTEUDO -->
	                </div>
	            </div>
	        </form>    
        </div>

        <!-- THE END CODE -->

    </div><!-- /#right-panel -->
    <!-- Right Panel -->

<?php include 'footer.php' ?>
