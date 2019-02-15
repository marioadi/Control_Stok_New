<?php include('conexao.php'); ?>
<!DOCTYPE html>
<html lang="pt_BR">
<head>
	<title>Carrinho</title>
	<meta charset="utf-8">

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/MyStyle.css" type="text/css">
	<link rel="stylesheet" href="assets/scss/style.css">
</head>
<body>	
		<br/><br/>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <?php

	            if(isset($_POST['id_txt'])) {
		            $id = $_POST['id_txt'];
		            $nome = $_POST['nome'];
		            $preco = $_POST['preco'];
		            $quantidade = $_POST['quantidade'];

	            	$mycarrinho[] = array('id' => $id, 'nome' => $nome, 'preco' => $preco, 'quantidade' => $quantidade);
		        }

		        //Init Session
		        session_start();
		        if(isset($_SESSION['carrinho'])){
		            $mycarrinho = $_SESSION['carrinho'];
		            if(isset($_POST['id_txt'])){
		                $id = $_POST['id_txt'];
		                $nome = $_POST['nome'];
		                $preco = $_POST['preco'];
		                $quantidade = $_POST['quantidade'];
		                $pos = -1;

		                for($i = 0; $i < count($mycarrinho); $i++){
		                    if($id == $mycarrinho[$i]['id']){
		                        $pos = $i;
		                    }
		                }

		                if($pos <> -1){
		                    $quant = $mycarrinho[$pos]['quantidade'] + $quantidade;
		                    $mycarrinho[$pos] = array('id' => $id, 'nome' => $nome, 'preco' => $preco, 'quantidade' => $quant);
		                }else{
		                    $mycarrinho[] = array('id' => $id, 'nome' => $nome, 'preco' => $preco, 'quantidade' => $quantidade);
		                }
		            }
		        }

		        if (isset($_POST['id_2'])) {
	            	$indice = $_POST['id_2'];
	            	$mycarrinho[$indice] = NULL;
	            }

			    if(isset($mycarrinho)) $_SESSION['carrinho'] = $mycarrinho;

				?>

                    <table class="table table-bordered table-hover table-light">
                        <tr  align="center">
                            <th>NOME</th>
                            <th>PRECO</th>
                            <th>QUANTIDADE</th>
                            <th>**</th>
                        </tr>
                        <?php
                        $total = 0;

                        if(isset($mycarrinho)){
                            for($i = 0; $i < count($mycarrinho); $i++){
                            	if ($mycarrinho[$i] <> NULL) {
                        ?>
                        <tr>
                            <td align="center"><?php echo $mycarrinho[$i]['nome']; ?></td>
                            <td align="center">R$ <?php echo $mycarrinho[$i]['preco']; ?></td>
                            <td align="center"><?php echo $mycarrinho[$i]['quantidade']; ?></td>
                            <td align="center">
                            	<form method="POST">
                            		<input type="hidden" name="id_2" value="<?php echo $i ?>" />
                            		<input type="submit" value="Excluir" class="btn btn-danger" />
                            	</form>
                            </td>
                        </tr>
                        <?php
                                $subtotal = $mycarrinho[$i]['quantidade'] * $mycarrinho[$i]['preco'];
                                $total = $total + $subtotal;

                                }
                            }
                        }
                        ?>
                        <tr>
                            <td colspan="3" align="right">TOTAL</td>
                            <td align="center">R$ <?php if(isset($total)) echo $total; ?></td>
                        </tr>
                    </table>
                    <a href="index.php" class="btn btn-primary"> Voltar </a>
                </div>
            </div>
        </div>

</body>
</html>