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
                            <li class="active">Dashboard > Editar Produto</li>
                        </ol>
                    </div>
                </div>

            </div>
        </div>
        <!-- INIT CODE -->
	<?php
		// Vindo do index
        if (isset($_POST['id_ed']) && !empty($_POST['id_ed'])) {
			$id = $_POST['id_ed'];
			$imagem = $_POST['imagem'];
			$nome = $_POST['nome'];
			$descricao = $_POST['descricao'];
			$preco = $_POST['preco'];
			$quantidade = $_POST['quantidade'];
			$data = $_POST['data'];	
		}

		//Vindo do proprio formulário
		if (isset($_POST['id-edit']) && !empty($_POST['id-edit'])) {
			$id_ed = $_POST['id-edit'];
			$nome_ed = $_POST['nome-edit'];
			$descricao_ed = $_POST['descricao-edit'];
			$preco_ed = $_POST['preco-edit'];
			$quantidade_ed = $_POST['quantidade-edit'];
			$data_ed = $_POST['data-edit'];	
			$imagem_pro = $_FILES['imagem-edit'];

			if ($_FILES['imagem-edit']['name'] <> "") {
				move_uploaded_file($imagem_pro['tmp_name'], 'images/'.$imagem_pro['name']);

				$sql = $pdo->prepare("UPDATE produtos set nome = :nome, imagem = :imagem, descricao = :descricao, preco = :preco, quantidade = :quantidade, data = :data where id =".$id_ed);
				$sql->bindValue(":nome", $nome_ed);
				$sql->bindValue(":imagem", 'images/'.$imagem_pro['name']);
				$sql->bindValue(":descricao", $descricao_ed);
				$sql->bindValue(":preco", $preco_ed);
				$sql->bindValue(":quantidade", $quantidade_ed);
				$sql->bindValue(":data", $data_ed);
				$sql->execute();
				header("Location: index.php");
			}else{
				$sql = $pdo->query("SELECT imagem from produtos where id =".$id_ed);

				if($sql->rowCount() > 0){

					$ln = $sql->fetch();
					$caminho_final = $ln['imagem'];
					$sql = "UPDATE produtos set nome = '$nome_ed', imagem = '$caminho_final', descricao = '$descricao_ed', preco = '$preco_ed', quantidade = '$quantidade_ed', data = '$data_ed' where id =".$id_ed;
					$pdo->query($sql);
					header("Location: index.php");
				}
			}
		}
	?>
        <div class="content mt-3">
        	<form method="POST" enctype="multipart/form-data">
	            <div class="row">
	                <div class="col-md-12">
	                    <!-- INICIO CONTEUDO -->
	                    	
	                    	<div class="row espaco-topo">
	                    		<div class="col-xs-12 col-sm-12">
	                    			
	                    			<div class="form-group">
	                    				<div class="col-xs-12 col-sm-1">
	                    					<img class="img-circle" src="<?php echo $imagem; ?>" width="100" heiht="100"/>
	                    				</div>

	                    				<div class="col-xs-12 col-sm-6">
	                    					<label class="control-label"> Escolher Imagem </label>
	                    					<input class="form-control" type="file" name="imagem-edit">
	                    				</div>

	                    				<div class="col-xs-12 col-sm-5">
	                    					<label class="control-label"> Nome </label>
	                    					<input class="form-control" type="text" name="nome-edit" value="<?php echo $nome; ?>">
	                    				</div>
	                    			</div>
	                    		</div>
	                    	</div>

	                    	<div class="row espaco-topo">
	                    		<div class="col-xs-12 col-sm-12">
	                    			<div class="form-group">
	                    				<div class="col-xs-12 col-sm-4">
	                    					<label class="control-label"> Descrição </label>
	                    					<input class="form-control" type="text" name="descricao-edit" value="<?php echo $descricao; ?>">
	                    				</div>

	                    				<div class="col-xs-12 col-sm-4">
	                    					<label class="control-label"> preco </label>
	                    					<input class="form-control" type="text" name="preco-edit" value="<?php echo $preco; ?>">
	                    				</div>

	                    				<div class="col-xs-12 col-sm-2">
	                    					<label class="control-label"> Quantidade </label>
	                    					<input class="form-control" type="text" name="quantidade-edit" value="<?php echo $quantidade; ?>">
	                    				</div>
	                    			
	                    				<div class="col-xs-12 col-sm-2">
	                    					<label class="control-label"> Data </label>
	                    					<input class="form-control" type="text" name="data-edit" value="<?php echo $data; ?>">
	                    				</div>
	                    			</div>	
	                    		</div>
	                    	</div>


	                    	<div class="row">
	                    		<div class="centralizar-divs espaco-topo">
	                    			<input type="submit" value="Atualizar" class="btn btn-primary">
	                    			<a href="index.php" class="btn btn-primary"> Voltar </a>
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
