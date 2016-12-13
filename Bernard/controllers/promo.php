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
	$promo = $_POST['promo'];

	//si valeur null ne pas faire la requête car inutile
	if ($promo!= null) {
		$query=$pdo->prepare("insert into promo(nom) values('".$promo."')");
		$query->execute();
	}
}

function modify_promo(){

	$pdo=connect();

	$promo = $_POST['promo'];
	$oldpromo = $_POST['oldpromo'];

	$query=$pdo->prepare("update document set promo='".$promo."' where promo='".$oldpromo."'");
	$query->execute();
	$query=$pdo->prepare("update promo set nom='".$promo."' where nom='".$oldpromo."'");
	$query->execute();

}

function delete_promo(){

	$pdo=connect();

	//récupération de la valeur de la liste sélectionner
	//pb récupération doit être faite par rapport à la ligne
	$promo = $_POST['promo'];


	$query=$pdo->prepare("delete from document where promo='".$promo."'");
	$query->execute();
	$query2=$pdo->prepare("delete from promo where nom='".$promo."'");
	$query2->execute();

}

?>
