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
		
	echo "<table style='width:100%'><tr><th>Fichier</th></tr>";

	for($i=0;$row=$query->fetch();$i++){
		echo "<tr><td>".$row['fichier']."</td></tr>";
	}

	echo "</table>";

}

?>