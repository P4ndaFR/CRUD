<?php

//fonction d'affichage
function print_promo(){

	//appel à la fonction de connection
	$pdo=connect();

	//requête d'affichage des fichiers
	$query=$pdo->prepare("select promo from document group by promo");
	//execution
	$query->execute();

	//mettre le résultat de l'execution dans un tableau
	$promos=$query->fetchAll(PDO::FETCH_ASSOC);
	//donner le tableau en paramètre
	set('promos',$promos);
	//revoie vers la vue avec le layout
	return render('../views/promos.html.php','../views/layout.html.php');

}

//fonction d'ajout des promos
function add_promo(){

	//appel la fonction de connection
	$pdo=connect();

	//récupération des valeurs du formulaire
 	$promo=$_POST['promo'];
	
	//insert une promo avec un document bidon pour pouvoir l'insérer sans fichiers
	$query=$pdo->prepare("insert into document(rang,libelle,fichier,promo) values('1','mise en base','default.txt','".$promo."')");
		
	//execution
	$query->execute();	
	
	//redirection vers l'affichage des promos
	redirect_to('/promos');
}

//fonction de modification des promos
function modify_promo(){

	//appel la fonction de connection
	$pdo=connect();

	//Recupération des valeurs du formulaire
	$promo = $_POST['promo'];
	$oldpromo = $_POST['oldpromo'];

	//mise à jour du nom de la promotion
	$query=$pdo->prepare("update document set promo='".$promo."' where promo='".$oldpromo."'");
	//execution
	$query->execute();
	
	//redirection vers l'affichage des promos
	redirect_to('/promos');

}

//fonction de suppression des promos
function delete_promo(){

	//appel la fonction de connection
	$pdo=connect();

	//récuupération des valeurs du formulaire
	$promo = $_GET['promo'];

	//requête de suppression des documents ayant la promo demander
	$query=$pdo->prepare("delete from document where promo='".$promo."'");
	//execution
	$query->execute();

	//redirection vers l'affichage des promos
	redirect_to('/promos');
}

?>
