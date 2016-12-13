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

//fonction d'affichage
function print_file(){

	$pdo=connect();

	//requête d'affichage des fichiers
	$query=$pdo->prepare("select fichier,promo,rang from document group by fichier,promo,rang");
	//execution
	$query->execute();
	
	//mettre le résultat de l'execution dans un tableau
	$fichiers=$query->fetchAll(PDO::FETCH_ASSOC);
	//donner le tableau en paramètre
	set('fichiers',$fichiers);
	//vue avec layout
	return render('../views/file.html.php','../views/layout.html.php');

}

function add_file(){

	$pdo=connect();

	//récupération des valeurs du formulaire
	$fichier = $_POST['fichier'];

	//si valeur null ne pas faire la requête car inutile
	if ($fichier!= null) {
		$query=$pdo->prepare("insert into fichier(nom) values('".$fichier."')");
		$query->execute();
	}



}

function modify_file(){

	$pdo=connect();

 	
//récupération du nom fichier, du nom des promos, du libelle, des rangs

}

function delete_file(){

	$pdo=connect();

	//récupération de la valeur de la liste sélectionner
	//pb récupération doit être faite par rapport à la ligne
	//-> mettre un form dans le foreach de l'affichage qui envoie le nom de fichier de la ligne ou on a cliquer
	$fichier = $_POST['fichier'];


	$query=$pdo->prepare("delete from document where fichier='".$fichier."'");
	$query->execute();
	$query2=$pdo->prepare("delete from fichier where nom='".$fichier."'");
	$query2->execute();

}


?>