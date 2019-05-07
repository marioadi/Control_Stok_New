<?php

class Usuario{

	private $id;
	private $nomeUsuarioLogado;

	private $pdo;

	public function __construct($i = ''){
		try {
			$this->pdo = new PDO("mysql:dbname=control_stock;host=localhost", "mariojunior", "admproject123");
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
		} catch (PDOException $e) {
			echo "Erro no banco: ".$e->getMessage();
		}
	}
	/**
		- Método para login do usuário.
		- Onde recebe o usuário e senha e busca no banco o usuário com as informações correspondentes!
		- Se a senha corresponder usuario vai para o painel e guardamos ao ID para buscar as informações do usuário logado!
	*/
	public function logar($usuarioParam, $senhaParam){
		if ((isset($usuarioParam) && !empty($usuarioParam))) {
        	$usuario = addslashes($usuarioParam);
        	$senha = md5(addslashes($senhaParam));

        	$sql = "SELECT * FROM login WHERE usuario = '".$usuario."'";
        	$sql = $this->pdo->query($sql);
        
	        if ($sql->rowCount() > 0) {
	            $ln = $sql->fetch();
	            $usuario_bd = $ln['usuario'];
	            $senha_bd = $ln['senha'];
	            
	            if(isset($usuario) AND isset($senha)){
	                if ($usuario == $usuario_bd && $senha == $senha_bd) {
	                    $id = $ln['id'];
	                    $_SESSION['login'] = $id;
	                    header("Location: index.php");
	                    exit;            
	                }else{
	                    return "Usuário ou Senha incorreta!";
	                }
	            }
	            
	        }else{
	            return "Usuário ou Senha incorreta!";
	        }
    	}else{
    		return "Campo não pode ser vazio!";
    	}
	}
	/**
	- Método para deslogar o usuário
	*/
	public function logout(){
		session_start();
		unset($_SESSION['login']);
		header("Location: login.php");
		exit;
	}

	/**
	- Método para verificar se a sessão do ID do login foi configura, caso esteja salva o id e o nome do usuário logado
	- Inicializa as variáveis ID e Usuário com as informações..
	*/
	public function loginAuth($session){	
		if (isset($session) && !empty($session) ) {
		    $id = addslashes($session);
		    $sql = $this->pdo->query("SELECT id, usuario FROM login WHERE id = ".$id);
		    if ($sql->rowCount() > 0) {
		        $ln = $sql->fetch();
		        $this->id = $ln['id'];
		        $this->nomeUsuarioLogado = $ln['usuario'];
		    }
		}else{
		    header("Location: login.php");
		    exit;
		}
	}

	public function getId(){
		return $this->id;
	} 

	public function getNomeUsuarioLogado(){
		return $this->nomeUsuarioLogado;
	}

}