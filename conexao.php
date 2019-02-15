<?php
$dsn = "mysql:dbname=control_stock;host=localhost";
$dbuser = "mariojunior";
$dbpass = "admproject123";

try {
	$pdo = new PDO($dsn, $dbuser, $dbpass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo "Erro no banco: ".$e->getMessage();
}

?>