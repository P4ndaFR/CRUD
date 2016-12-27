<?php

//fonction d'affichage
function print_promo(){

	$pdo=connect();

	//requête d'affichage des fichiers
	$query=$pdo->prepare("select promo from document group by promo");
	//execution
	$query->execute();

	//mettre le résultat de l'execution dans un tableau
	$promos=$query->fetchAll(PDO::FETCH_ASSOC);
	//donner le tableau en paramètre
	set('promos',$promos);
	//vue avec layout
	return render('../views/promos.html.php','../views/layout.html.php');

}

function add_promo(){

	$pdo=connect();

	//récupération des valeurs du formulaire
 	$promo=$_POST['promo'];
	
	$query=$pdo->prepare("insert into document(rang,libelle,fichier,promo) values('1','mise en base','default.txt','".$promo."')");
		
	//execution
	$query->execute();	
	

	redirect_to('/promos');
}

function modify_promo(){

	$pdo=connect();

	$promo = $_POST['promo'];
	$oldpromo = $_POST['oldpromo'];

	$query=$pdo->prepare("update document set promo='".$promo."' where promo='".$oldpromo."'");
	$query->execute();
	
	redirect_to('/promos');

}

function delete_promo(){

	$pdo=connect();

	//récupération de la valeur de la liste sélectionner
	//pb récupération doit être faite par rapport à la ligne
	$promo = $_GET['promo'];


	$query=$pdo->prepare("delete from document where promo='".$promo."'");
	$query->execute();

	redirect_to('/promos');
}

?>
