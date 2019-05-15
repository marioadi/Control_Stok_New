<?php include 'header.php';

	$usuario = new Usuario();

	// Vindo do index
	if (isset($_POST['id_ed']) && !empty($_POST['id_ed'])) {
		$ln = $usuario->editUser($_POST['id_ed']);
	}    

	//Vindo do proprio formulário
	if (isset($_POST['id-edit']) && !empty($_POST['id-edit'])) {
	   $usuario->updateUser($_POST['id-edit'], 
	   $_POST['nome-edit'], $_POST['usuario-edit'], $_POST['senha-edit'], 
	   $_POST['email-edit'], $_POST['permissao-edit']);
	   $ln = $usuario->editUser($_POST['id-edit']);
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
                            <li class="active">Dashboard > Editar Produto</li>
                        </ol>
                    </div>
                </div>

            </div>
        </div>
                        
        <!-- INIT CODE -->
        <div class="content mt-3">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST">

                         <div class="container">
                            <div class="accordion">
                                <div class="card">
                                    <div class="card-header">
                                       Dados do Usuário
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12">
                                                <div class="form-group">
                                                    <div class="col-xs-12 col-sm-4">
                                                        <label class="control-label">Nome</label>
                                                        <input class="form-control" type="text" value="<?php echo $ln['nome']; ?>" name="nome-edit">
                                                        <input class="form-control" type="hidden" name="id-edit" 
				                    						value="<?php if(isset($ln)) echo $ln['id']; ?>">
                                                    </div>
                                                    <div class="col-xs-12 col-sm-4">
                                                        <label class="control-label">Usuario</label>
                                                        <input class="form-control" type="text" value="<?php echo $ln['usuario']; ?>" name="usuario-edit">
                                                    </div>
                                                    <div class="col-xs-12 col-md-4">
                                                        <label class="control-label">Senha</label>
                                                        <input class="form-control" type="text" value="<?php echo $ln['senha']; ?>" name="senha-edit">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12">
                                                <div  class="form-group espaco-topo">
                                                    <div class="col-xs-12 col-sm-4">
                                                        <label class="control-label">Email</label>
                                                        <input class="form-control" type="text" value="<?php echo $ln['email']; ?>" name="email-edit" >
                                                    </div>
                                                    <div class="col-xs-12 col-sm-4">
                                                        <label class="control-label">Permissão</label>
                                                        <input class="form-control" type="text" value="<?php echo $ln['permissao']; ?>" name="permissao-edit" >
                                                    </div> 
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="centralizar-divs">
                                            <div class="row espaco-topo">
                                                <div  class="form-group  centralizar-divs">
                                                    <div class="col-xs-12 col-sm-6">
                                                        <a href="listar_usuarios.php" class="btn botao-cinza">
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

<?php include 'footer.php' ?>
