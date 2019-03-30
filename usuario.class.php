<?php

class Usuario{

	private $id;
	private $nome;

	private $pdo;

	public function __construct($i = ''){
		try {
			$this->pdo = new PDO("mysql:dbname=control_stock;host=localhost", "mariojunior", "admproject123");
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
		} catch (PDOException $e) {
			echo "Erro no banco: ".$e->getMessage();
		}
	}

	public function loginAuth($session){	
		if (isset($session) && !empty($session) ) {
		    $id = addslashes($session);
		    $sql = $this->pdo->query("SELECT * FROM login WHERE id = ".$id);
		    if ($sql->rowCount() > 0) {
		        $ln = $sql->fetch();
		        $nome = $ln['usuario'];
		        return $nome;
		    }
		}else{
		    header("Location: login.php");
		    exit;
		}
	}

	public function getId(){
		return $this->id;
	} 

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

}