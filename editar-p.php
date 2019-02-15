<?php
	require 'conexao.php';

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
<!DOCTYPE html>
<html>
<head>
	<title>Editar Produto</title>

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/MyStyle.css" type="text/css">
	<link rel="stylesheet" href="assets/scss/style.css">
</head>
<body>
	<br/><br/>
	<div class="container">
		<form method="POST" enctype="multipart/form-data">
			<table class="table  table-bordered table-light">
				<tr>
					<td align="center" colspan="2"><b>EDITAR PRODUTO</b></td>
					<td><input type="hidden" name="id-edit" value="<?php echo $id; ?>"></td>
				</tr>
				<tr>
					<td><img class="img-thumbnail" src="<?php echo $imagem; ?>" width="100" heiht="100"></td>
					<td><input type="file" name="imagem-edit" ></td>
				</tr>
				<tr>
					<td>NOME</td>
					<td><input type="text" name="nome-edit" value="<?php echo $nome; ?>"></td>
				</tr>
				<tr>
					<td>DESCRIÇÂO</td>
					<td><input type="text" name="descricao-edit" value="<?php echo $descricao; ?>"></td>
				</tr>
				<tr>
					<td>PREÇO</td>
					<td><input type="text" name="preco-edit" value="<?php echo $preco; ?>"></td>
				</tr>
				<tr>
					<td>QUANTIDADE</td>
					<td><input type="text" name="quantidade-edit" value="<?php echo $quantidade; ?>"></td>
				</tr>
				<tr>
					<td>DATA</td>
					<td><input type="text" name="data-edit" value="<?php echo $data; ?>"></td>
				</tr>
				<tr>
					<td>  </td>
					<td><input type="submit" value="Atualizar" class="btn btn-primary"></td>
				</tr>
			</table>
		</form>	
		<a href="index.php" class="btn btn-primary"> Voltar </a>
	</div>
</body>
</html>