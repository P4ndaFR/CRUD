<?php

//fonction d'affichage
function print_file(){

	//appel à la fonction de connection
	$pdo=connect();
	//requête d'affichage des fichiers
	$query=$pdo->prepare("select fichier,promo,rang from document group by fichier,promo,rang");
	//requête d'affichage des promo pour la modification
	$promotion=$pdo->prepare("select promo from document group by promo");
	//execution des requêtes
	$query->execute();
	$promotion->execute();
	//mettre les résultats de l'execution dans un tableau
	$fichiers=$query->fetchAll(PDO::FETCH_ASSOC);
	$promotions=$promotion->fetchAll(PDO::FETCH_ASSOC);
	//donner les tableaux en paramètre
	set('fichiers',$fichiers);
	set('promotions',$promotions);
	//renvoi à la vue avec le layout
	return render('../views/file.html.php','../views/layout.html.php');
}

//fonction d'ajout
function add_file(){

	//appel à la fonction de connection
	$pdo=connect();

	//récupération des valeurs du formulaire
	$max=$_POST['max'];
 	$lib=$_POST['libelle'];

	//Définition de l'emplacement
	$uploaddir="../../rentree/pdf/";
	$uploadfile = $uploaddir.basename($_FILES['fichier']['name']);

	//Déplacement du fichier de l'emplacement temporaire vers le fichier d'upload;
	move_uploaded_file($_FILES['fichier']['tmp_name'], $uploadfile);


 	//boucle for afin d'obtenir le rang et le nom de toutes les promos concerner par le formulaire
 	for ($i=0;$i<=$max;$i++) {

 		//vérification de la case coché ou non
	 	if (isset($_POST['promo'.$i])) {
	 		//la variable prend la valeur on
	 		$case=$_POST['promo'.$i];
	 	} else {
	 		//la variable prend la valeur off
	 		$case ='off';
	 	}
	 	//récupération du rang par le biais du formulaire selon la variable i
	 	$rang=$_POST['rang'.$i];
	 	//si la promo est coché pour le fichier
	 	if ($case=='on'){
	 		//la promo prend la valeur par le biais du formulaire selon la variable i
	 		$promo=$_POST['nom'.$i];

	 		//selection du rang actuel pour la promo
	 		$testrang=$pdo->prepare("select rang from document where promo='".$promo."'");
	 		//execution
	 		$testrang->execute();
	 		//mise en place dans un tableau
	 		$oldrangs=$testrang->fetchAll(PDO::FETCH_ASSOC);

	 		//pour toute les valeur du tableau
	 		foreach ($oldrangs as $oldrang) {
	 			//si le nouveau rang est le même que l'ancien
		 		if ($rang==$oldrang['rang']) {
		 			//incrémentation de l'ancien rang
		 			$newrang=$oldrang['rang']+1;
		 			//mise à jout des rang ayant le même rang
		 			$maj=$pdo->prepare("update document set rang='".$newrang."' where promo='".$promo."' and rang='".$oldrang['rang']."'");
		 			//execution
		 			$maj->execute();
		 		}
	 		}
	 		//insértion des valeurs dans la base de données avec une requête d'insertion
	 		$query=$pdo->prepare("insert into document(rang,libelle,fichier,promo) values('".$rang."','".$lib."','".$uploadfile."','".$promo."')");

			//execution
			$query->execute();
	 	}


 	}
 	//redirection vers la page d'affichage des fichiers
	redirect_to('/fichier');

}

function modify_file(){

	//appel à la fonction de connection
	$pdo=connect();

	//récupération des valeurs du formulaire
 	$max=$_POST['max'];
 	$lib=$_POST['libelle'];
 	$fichier=$_POST['fichier'];

 	//suppression de tout les documents ayant le fichier indiqué

 	$query=$pdo->prepare("delete from document where fichier='".$fichier."'");
	//execution
	$query->execute();

 	//boucle for afin d'obtenir le rang et le nom de toutes les promos concerner par le formulaire
 	for ($i=0;$i<=$max;$i++) {

 		//vérification de la case coché ou non
	 	if (isset($_POST['promo'.$i])) {
	 		//la variable prend la valeur on
	 		$case=$_POST['promo'.$i];
	 	} else {
	 		//la variable prend la valeur off
	 		$case ='off';
	 	}
	 	//récupération du rang par le biais du formulaire selon la variable i
	 	$rang=$_POST['rang'.$i];


	 	//si la promo est coché pour le fichier
	 	if ($case=='on'){
	 		//la promo prend la valeur par le biais du formulaire selon la variable i
	 		$promo=$_POST['nom'.$i];

	 		//selection du rang actuel pour la promo
	 		$testrang=$pdo->prepare("select rang from document where promo='".$promo."'");
	 		//execution
	 		$testrang->execute();
	 		//mise en tableau le résultat
	 		$oldrangs=$testrang->fetchAll(PDO::FETCH_ASSOC);

	 		//pour toute les valeur du tableau
	 		foreach ($oldrangs as $oldrang) {
	 			//si le nouveau rang est le même que l'ancien
		 		if ($rang==$oldrang['rang']) {
		 			//incrémentation de l'ancien rang
		 			$newrang=$oldrang['rang']+1;
		 			//mise à jout des rang ayant le même rang
		 			$maj=$pdo->prepare("update document set rang='".$newrang."' where promo='".$promo."' and rang='".$oldrang['rang']."'");
		 			//execution
		 			$maj->execute();
		 		}
	 		}

	 		//insertion du document
	 		$query=$pdo->prepare("insert into document(rang,libelle,promo,fichier) values(".$rang.",'".$lib."','".$promo."','".$fichier."') ");

			//execution
			$query->execute();
	 	}

 	}

 	//redirection vers la page d'affichage des fichiers
	redirect_to('/fichier');

}


function delete_file(){

	//appel à la fonction de connection
	$pdo=connect();

	//recupération du nom du fichier
	$fichier = $_GET['fichier'];
	//requête de suppression du document ayant le nom du fichier
	$query=$pdo->prepare("delete from document where fichier='".$fichier."'");
	//execution
	$query->execute();

 	//redirection vers la page d'affichage des fichiers
	redirect_to('/fichier');

}


?>
