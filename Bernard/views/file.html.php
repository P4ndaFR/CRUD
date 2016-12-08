
<nav id="menu-title" class="top-nav">
	<div class="container">
		<div class="nav-wrapper">
			<p class="page-title text-center">Gestion des Fichiers</p>
		</div>
	</div>
</nav>
<div class="container">
	<ul class="collection">
		<?php
			$i=0;
				foreach ($fichiers as $fichier) {
						echo '<li class="collection-item">'.$fichier['fichier'].'<a href="http://front.rentree.fr/CRUD/Bernard/?/delete_file"><i class="material-icons right">delete</i></a>
					<a href="#m'.$i.'" class="modal-trigger"><i class="material-icons right">reorder</i></a></li>';
						echo '
							<div id="m'.$i.'" class="modal">
							    <div class="modal-content">
							      <h4>Modification du fichier : '.$fichier['fichier'].'</h4>
							    </div>
							
								    <div class="modal-footer">
											<form>
												<div class="container">
													<h5>Saisissez le libellé du fichier</h5>
													<div class="">
							          					<input placeholder="" id="first_name" type="text" class="validate">
							          					<label for="file">Libellé du Fichier</label>
							        				</div>
													<h5>Cochez les promos à lier</h5>';
						//require "./controllers/fichier.php";
						//$promos=print_file_promo();
						//echo $promos;
						/*
						foreach ($promos as $key2=>$promo) {
							foreach ($promo as $key3=>$name) {
								echo '<div class="row">
										<div class="input-field inline col l2">
						            		<input placeholder="Rang" id="rang" type="number" class="validate">
						          		</div>
										<br/>
										<p class="col l6">
							      			<input type="checkbox" id="test5"/>
							      			<label for="test5">'.$name.'</label>
										</p>
									</div>';
							}
						}*/
					echo '						
											</div>
											<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Sauvegarder et quitter</a>
										</form>
								</div>
							</div>
					';
					$i++;
					
				}
		?>
	</ul>