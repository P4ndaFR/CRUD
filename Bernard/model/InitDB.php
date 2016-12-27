<?php

function connect(){

	//variable de connexion
	$dsn='mysql:dbname=doc_rentree;host=127.0.0.1'; 
	$user='CIR32016'; 
	$password='CIR32016'; 

	//essai de la connexion
	try {
		$pdo = new PDO($dsn,$user,$password);
	} catch (PDOException $e) {
		echo "Connexion échouée : ".$e->getMessage();
	}

	return $pdo;

}
?>
