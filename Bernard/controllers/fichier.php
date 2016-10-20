<?php


function print_file(){

		
	$dsn='mysql:dbname=front;host=127.0.0.1';
	$user='front';
	$password='front';

	try {
		$pdo = new PDO($dsn,$user,$password);
	} catch (PDOException $e) {
		echo "Connexion échouée : ".$e->getMessage();
	}


	$query=$pdo->prepare("select fichier from document group by fichier");
	$query->execute();
		
	echo "<table><tr><th>Fichier</th></tr>";

	for($i=0;$row=$query->fetch();$i++){
		echo "<tr><td>".$row['fichier']."</td></tr>";
	}

	echo "</table>";

}

function add_file(){

	$dsn='mysql:dbname=front;host=127.0.0.1';
	$user='front';
	$password='front';

	try {
		$pdo = new PDO($dsn,$user,$password);
	} catch (PDOException $e) {
		echo "Connexion échouée : ".$e->getMessage();
	}

	$fichier = $_POST['fichier'];

	
	$query=$pdo->prepare("insert into document(fichier) values('".$fichier."')");
	$query->execute();

}

function modify_file(){

	$dsn='mysql:dbname=front;host=127.0.0.1';
	$user='front';
	$password='front';

	try {
		$pdo = new PDO($dsn,$user,$password);
	} catch (PDOException $e) {
		echo "Connexion échouée : ".$e->getMessage();
	}

	$fichier = $_POST['fichier'];


	$query=$pdo->prepare("update document set fichier='".$fichier."'";
	$query->execute();

}

?>