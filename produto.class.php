<?php

class Produto {

	private $pdo;

	public function __construct(){
		try {
			$this->pdo = new PDO("mysql:dbname=control_stock;host=localhost", "mariojunior", "admproject123");
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
		} catch (PDOException $e) {
			echo "Erro no banco: ".$e->getMessage();
		}
	}

	public function listarTodos(){
		return $this->pdo->query("SELECT * FROM produtos ORDER BY `id` ASC");
	}

	public function buscasPorID($id){
		$dados = $this->pdo->prepare("SELECT * FROM produtos WHERE id = ?");
		$dados->execute(array($id));
		
		if($dados->rowCount() > 0){
			return $dados->fetch();
		}else{
			return array();
		}
	}
	
	public function campoDeBusca(){
		if (isset($_POST['buscar'])) {
        	$sql = "select * from produtos where nome like '%". $_POST['buscar'] ."%' OR descricao like '%". $_POST['buscar'] ."%' ";
        	$sql = $pdo->query($sql);
        	return $sql;
        }
	}

	public function cadastrar($imagem, $nome, $descricao, $preco, $quantidade, $data){
		$sqlCadastro = $this->pdo->prepare("INSERT INTO produtos SET imagem = ?, nome = ?, descricao = ?, preco = ?, quantidade = ?, data = ?");
		$sqlCadastro->execute(array($imagem, $nome, $descricao, $preco, $quantidade, $data));
		header("Location: index.php");
	}

	public function deleteProduct($produto){
		if (isset($produto)) {
            $id = $produto;
            $sql = "delete from produtos where id =".$id;
            $this->pdo->query($sql);
                
            $sql = "select * from produtos ORDER BY `id` ASC";
            $sql = $this->pdo->query($sql);

        }
	}

	public function editProduct($id){
		$ln = $this->buscasPorID($id);
		$id = $ln['id'];
        $imagem = $ln['imagem'];
        $nome = $ln['nome'];
        $descricao = $ln['descricao'];
        $preco = $ln['preco'];
        $quantidade = $ln['quantidade'];
        $data = $ln['data'];

		return array('id' => $id, 'imagem' => $imagem, 'nome' => $nome, 'descricao' => $descricao, 
				'preco' => $preco, 'quantidade' => $quantidade, 'data' => $data);
		
	}

	public function updateProduct($id, $nome, $descricao, $preco, $quantidade, $data, $imagem){
		$indice = $id;
		$nome_update  = $nome;
		$descricao_update = $descricao;
		$preco_update = $preco;
		$quantidade_update = $quantidade;
		$data_update = $data;
		$image_update = $imagem;
			
		if( $imagem['name'] <> "" ){
			move_uploaded_file( $imagem['tmp_name'], "images/".$imagem['name'] );

			$sql = $this->pdo->prepare("UPDATE produtos SET nome = :nome, descricao = :descricao, preco = :preco, quantidade = :quantidade, data = :data, imagem = :imagem WHERE id = :id");
			$sql->bindValue(":nome", $nome_update);
			$sql->bindValue(":descricao", $descricao_update);
			$sql->bindValue(":preco", $preco_update);
			$sql->bindValue(":quantidade", $quantidade_update);
			$sql->bindValue(":data", $data_update);
			$sql->bindValue(":imagem", $image_update);
			$sql->bindValue(":id", $indice);
			$sql->execute();
			header("Location: index.php");

		}else{

			$ln = $this->buscasPorID($id);
			$imagem_recupada = $ln['imagem'];

			$sql = $this->pdo->prepare("UPDATE produtos SET nome = :nome, descricao = :descricao, preco = :preco, quantidade = :quantidade, data = :data, imagem = :imagem WHERE id = :id");
			$sql->bindValue(":nome", $nome_update);
			$sql->bindValue(":descricao", $descricao_update);
			$sql->bindValue(":preco", $preco_update);
			$sql->bindValue(":quantidade", $quantidade_update);
			$sql->bindValue(":data", $data_update);
			$sql->bindValue(":imagem", $imagem_recupada);
			$sql->bindValue(":id", $indice);
			$sql->execute();
			header("Location: index.php");
		}
	}

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

        $sql = $this->pdo->query("SELECT * FROM produtos ORDER BY `id` ASC limit $init, $regs_pag");


        $quant_pag = ceil($nro / $regs_pag);

        return array( 'numPag' => $nro_pag, 'quantPag' => $quant_pag , 'sql' => $sql);
	}
}