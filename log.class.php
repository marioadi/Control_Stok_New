<?php

class log{

    public function __construct(){
        try {
            $this->pdo = new PDO("mysql:dbname=control_stock;host=localhost", "mariojunior", "admproject123");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro no banco: ".$e->getMessage();
        }
    }

    public function getLog($acao_utf8){
        $acao = utf8_decode($acao_utf8);
        $ip = $_SERVER['REMOTE_ADDR'];
        $sql = $this->pdo->prepare("INSERT INTO log (ip, data, acao) VALUE(?, NOW(), ?)");
        $sql->bindValue(1, $ip);
        $sql->bindValue(2, $acao);
        $sql->execute();
    }
}
