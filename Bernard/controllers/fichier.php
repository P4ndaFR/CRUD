<?php

function connect(){

	//variable de connexion
	$dsn='mysql:dbname=doc_rentree;host=127.0.0.1'; //db : doc_rentree
	$user='CIR32016'; //CIR32016
	$password='CIR32016'; //CIR32016

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
	$promotion=$pdo->prepare("select promo from document group by promo");
	//execution
	$query->execute();
	$promotion->execute();
	//mettre le résultat de l'execution dans un tableau
	$fichiers=$query->fetchAll(PDO::FETCH_ASSOC);
	$promotions=$promotion->fetchAll(PDO::FETCH_ASSOC);
	//donner le tableau en paramètre
	set('fichiers',$fichiers);
	set('promotions',$promotions);
	//vue avec layout
	return render('../views/file.html.php','../views/layout.html.php');
}

function add_file(){

	$pdo=connect();

	//récupération des valeurs du formulaire
	$fichier = $_POST['fichier'];

	//si valeur null ne pas faire la requête car inutile
	if ($fichier!= null) {
		$query=$pdo->prepare("insert into document(rang,libelle,fichier,promo) values('".$fichier."')");
		$query->execute();
	}

	$max=$_POST['max'];
 	$lib=$_POST['libelle'];
 	$fichier=$_POST['fichier'];

	//execution
	$query->execute();
 	for ($i=0;$i<=$max;$i++) {

 	if (isset($_POST['promo'.$i])) {
 		$case=$_POST['promo'.$i];
 	} else {
 		$case ='off';
 	}
 	$rang=$_POST['rang'.$i];
 	if ($case=='on'){
 		$promo=$_POST['nom'.$i];

 		$query=$pdo->prepare("insert into document(rang,libelle,fichier,promo) values('".$rang."','".$lib."','".$fichier."','".$promo."')");

		//execution
		$query->execute();
 	}

 	}

	redirect_to('/fichier');

}

function modify_file(){

	$pdo=connect();

 	$max=$_POST['max'];
 	$lib=$_POST['libelle'];
 	$fichier=$_POST['fichier'];

 	$query=$pdo->prepare("delete from document where fichier='".$fichier."'");

	//execution
	$query->execute();
 	for ($i=0;$i<=$max;$i++) {

 	if (isset($_POST['promo'.$i])) {
 		$case=$_POST['promo'.$i];
 	} else {
 		$case ='off';
 	}
 	$rang=$_POST['rang'.$i];
 	if ($case=='on'){
 		$promo=$_POST['nom'.$i];

 		$query=$pdo->prepare("insert into document(rang,libelle,promo,fichier) values(".$rang.",'".$lib."','".$promo."','".$fichier."') ");

		//execution
		$query->execute();
 	}

 	}

	redirect_to('/fichier');

}


function delete_file(){

	$pdo=connect();

	//récupération de la valeur de la liste sélectionner
	//pb récupération doit être faite par rapport à la ligne
	//-> mettre un form dans le foreach de l'affichage qui envoie le nom de fichier de la ligne ou on a cliquer
	$fichier = $_GET['fichier'];
	$query=$pdo->prepare("delete from document where fichier='".$fichier."'");
	$query->execute();
	$query2=$pdo->prepare("delete from fichier where nom='".$fichier."'");
	$query2->execute();

	redirect_to('/fichier');

}


?>
