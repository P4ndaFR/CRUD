<?php

function connect(){

	//variable de connexion
	$dsn='mysql:dbname=front;host=127.0.0.1'; //db : doc_rentree
	$user='front'; //CIR32016
	$password='front'; //CIR32016

	//essai de la connexion
	try {
		$pdo = new PDO($dsn,$user,$password);
	} catch (PDOException $e) {
		echo "Connexion échouée : ".$e->getMessage();
	}

	return $pdo;

}
?>
