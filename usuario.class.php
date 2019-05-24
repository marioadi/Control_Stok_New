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
    
    /**
        - Método que busca todos os usuário;
    */
    public function listarTodos(){
        return $this->pdo->query("SELECT * FROM usuarios ORDER BY 'id' ASC");
    }
    
    /**
        - Método para buscar usuario pelo ID!
    */
    public function buscarPorId($id){
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        return $sql->fetch();
    }
    
    /**
        Método que retorna os dados do usuario
    */
    public function editUser($id){
		$ln = $this->buscarPorID($id);
		$id = $ln['id'];
        $nome = $ln['nome'];
        $usuario = $ln['usuario'];
        $senha = $ln['senha'];
        $email = $ln['email'];
        $permissao = $ln['permissao'];

		return array('id' => $id, 'nome' => $nome, 'usuario' => $usuario, 
				'senha' => $senha, 'email' => $email, 'permissao' => $permissao);	
	}
    
    /**
        - Método de cadastrar usuários!
    */
    public function cadastrar($nome, $usuario, $senha, $email, $permissao){
        $sql = $this->pdo->prepare("INSERT INTO usuarios SET nome = ?, usuario = ?, senha = ?, email = ?, permissao = ?");
        $sql->execute(array($nome, $usuario, $senha, $email, $permissao));
    }
    
    /**
        - Método de atualizar cadastro de usuário!
    */
    public function updateUser($id, $nome, $usuario, $senha, $email, $permissao){    
        $sql = $this->pdo->prepare("UPDATE usuarios SET nome = ?, usuario = ?, senha = ?, email = ?, permissao = ? WHERE id = ?");
        $sql->execute(array($nome, $usuario, $senha, $email, $permissao, $id));
    }
    
    
    /**
        - Método para criar e conf a paginação
    */
    public function pagination($sql, $nro_pag){
		
		$nro = $sql->rowCount($sql);

        if($nro == 0){
            echo "Não existe registro no banco de dados!";
         }

        $regs_pag = 10;
        if(is_numeric($nro_pag)){
            $init = ($nro_pag-1) * $regs_pag;
        }else{
            $init = 0;
        }

        $sql = $this->pdo->query("SELECT * FROM usuarios ORDER BY `id` ASC limit $init, $regs_pag");
        
        $quant_pag = ceil($nro / $regs_pag);

        return array( 'numPag' => $nro_pag, 'quantPag' => $quant_pag , 'sql' => $sql);
	}

    /**
        - Método para excluir usuario
    */
    public function deleteUser($id){
        if(isset($id) && !empty($id)){
            $sql = $this->pdo->prepare("DELETE FROM usuarios WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();   
        }
    }
    
    /**
        - Método para buscar pelo campo de busca!
    */
    public function campoDeBusca($dado){
        if(isset($dado)){
            return $this->pdo->query("SELECT * FROM usuarios WHERE nome LIKE '%".$dado."%' OR usuario LIKE '%".$dado."%' ");
        }
    }
    
	public function getId(){
		return $this->id;
	} 

	public function getNomeUsuarioLogado(){
		return $this->nomeUsuarioLogado;
	}

}