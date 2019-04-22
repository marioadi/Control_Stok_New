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
                    <!-- INICIO CONTEUDO -->

                <?php

	            if(isset($_POST['id_txt'])) {
		            $id = $_POST['id_txt'];
		            $nome = $_POST['nome'];
		            $preco = $_POST['preco'];
		            $quantidade = $_POST['quantidade'];

	            	$mycarrinho[] = array('id' => $id, 'nome' => $nome, 'preco' => $preco, 'quantidade' => $quantidade);
		        }

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
                     <div class="col-xs-12 col-sm-12">
                        <a href="index.php" class="btn botao-cinza">
                            <i class="fa fa-angle-double-left"></i>
                            <span>Voltar</span>
                        </a>
                    </div>
<!-- FIM CONTEUDO -->
                </div>
            </div>
        </div>

        <!-- THE END CODE -->

    </div><!-- /#right-panel -->
    <!-- Right Panel -->

<?php include 'footer.php' ?>
