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
		
	$fichiers=$query->fetchAll();
	set('fichiers',$fichiers);
	return render('../views/file.html.php','../views/layout.html.php');


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

	
	$query=$pdo->prepare("insert into fichier(nom) values('".$fichier."')");
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


	$query=$pdo->prepare("update fichier set nom='".$fichier."'");
	$query->execute();

}

function delete_file(){

	$dsn='mysql:dbname=front;host=127.0.0.1';
	$user='front';
	$password='front';

	try {
		$pdo = new PDO($dsn,$user,$password);
	} catch (PDOException $e) {
		echo "Connexion échouée : ".$e->getMessage();
	}

	$fichier = $_POST['fichier'];


	$query=$pdo->prepare("delete fichier where nom='".$fichier."'");
	$query->execute();

}

?>