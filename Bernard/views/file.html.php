
<nav id="menu-title" class="top-nav">
	<div class="container">
		<div class="nav-wrapper">
			<p class="page-title text-center">Gestion des Fichiers</p>
		</div>
	</div>
</nav>

<!-- Listage des fichiers -->
<div class="container">
	<ul class="collection">
		<?php
			$i=0;
			$n=1;
			$p='';
			$test1='';
			$test2='';
			$keep='';
			$promos=array();
			$rangs=array();
				foreach ($fichiers as $fichier) {
					//créer une variable $test qui prend la valeur de fichier
					if ($i==0){
						$test2=$fichier['fichier'];
					}
					if ($n==1) {
						$test1=$fichier['fichier'];
					} elseif ($n==2) {
						$test2=$fichier['fichier'];
						$n=0;
					}
					//if -> $fichier=$test ne rien faire | dernier doublon -> garder
					if ($test1!=$test2) {
						if ($fichier['fichier']!=$test1){
							$keep=$test1;
						} else {
							$keep=$test2;
						}
					//if = ajoute dans un tableau

						echo '
								<li class="collection-item">'.$keep.'
									<a href="index.php/?/fichier/supprimer&fichier='.$keep.'">
										<i class="material-icons right">delete</i>
									</a>
									<a href="#m'.$i.'" class="modal-trigger">
										<i class="material-icons right">mode_edit</i>
									</a>
								</li>
							';

						echo '
							<div id="m'.$i.'" class="modal">
							    <div class="modal-content">
							      <h4>Modification du fichier : '.$keep.'</h4>
							    </div>

								    <div class="modal-footer">
											<form action="index.php/?/fichier/modifier" method="POST">
												<div class="container">
													<h5>Saisissez le libellé du fichier</h5>
													<div class="">
							          					<input id="first_name" type="text" class="validate" name="libelle">
							          					<label for="file">Libellé du Fichier</label>
							          					<input name="fichier" value="'.$keep.'" type="hidden"/>
							        				</div>
													<h5>Cochez les promos à lier</h5>';

							for ($j=0;$j<count($promos);$j++) {

									echo '<div class="row">
											<input name="max" value="'.$j.'" type="hidden" />
											<div class="input-field inline col l2">
							            		<input type="number" value="'.$rangs[$j].'" id="rang" name="rang'.$j.'" class="validate">
							          		</div>
											<br/>
											<p class="col l6">
								      			<input type="checkbox" id="'.$i.''.$j.'"  name="promo'.$j.'" checked />
								      			<label for="'.$i.''.$j.'">'.$promos[$j].'</label>
												<input name="nom'.$j.'" value="'.$promos[$j].'" type="hidden" />
											</p>
										</div>';
							}
							//non posséder par le fichier
							foreach ($promotions as $promotion) {
								for ($k=0;$k<count($promos);$k++) {
									if ($promos[$k]==$promotion['promo']){
										$p=$promos[$k];
									}
								}
								if ($promotion['promo']!="" && $promotion['promo']!=$p){
									echo '<div class="row">
												<input name="max" value="'.$j.'" type="hidden" />
												<div class="input-field inline col l2">
								            		<input type="number" value="0" id="rang" name="rang'.$j.'" class="validate">
								          		</div>
												<br/>
												<p class="col l6">
									      			<input type="checkbox" id="'.$i.''.$j.'"  name="promo'.$j.'" />
									      			<label for="'.$i.''.$j.'">'.$promotion['promo'].'</label>
													<input name="nom'.$j.'" value="'.$promotion['promo'].'" type="hidden" />
												</p>
											</div>';
									$j++;
								}
							}
						echo '
											</div>
											<input type="submit" class=" modal-action modal-close waves-effect waves-green btn-flat" value="Sauvegarder et quitter" />
										</form>
								</div>
							</div>
					';
					$promos=array();
					$rangs=array();
				}
					$promos[]=$fichier['promo'];
					$rangs[]=$fichier['rang'];
					$i++;
					$n++;

				}
			?>
	</ul>
</div>
<div class="fixed-action-btn">
  <a class="btn-floating btn-large red" href="#add">
    <i class="large material-icons">add</i>
  </a>
</div>
<!-- Ajout d'un fichier -->

<div id="add" class="modal">
    <div class="modal-content">
      <h4>Ajout d'un nouveau fichier :</h4>
    </div>
	    <div class="modal-footer">
				<form>
					<div class="container">
						<h5>Saisissez le libellé du fichier</h5>
						<div class="">
          		<input placeholder="" id="first_name" type="text" class="validate">
          		<label for="file">Libellé du Fichier</label>
        		</div>

    				<div class="file-field input-field">
      				<div class="btn">
        				<span>File</span>
        				<input type="file">
      				</div>
      				<div class="file-path-wrapper">
        				<input class="file-path validate" type="text">
      				</div>
    				</div>

						<h5>Cochez les promos à lier</h5>
						<?php
							//non posséder par le fichier
							foreach ($promotions as $promotion) {
								for ($k=0;$k<count($promos);$k++) {
									if ($promos[$k]==$promotion['promo']){
										$p=$promos[$k];
									}
								}
								if ($promotion['promo']!="" && $promotion['promo']!=$p){

									echo '<div class="row">
												<input name="max" value="'.$j.'" type="hidden" />
												<div class="input-field inline col l2">
								            		<input type="number" value="0" id="rang" name="rang'.$j.'" class="validate">
								          		</div>
												<br/>
												<p class="col l6">
									      			<input type="checkbox" id="'.$i.''.$j.'"  name="promo'.$j.'" />
									      			<label for="'.$i.''.$j.'">'.$promotion['promo'].'</label>
													<input name="nom'.$j.'" value="'.$promotion['promo'].'" type="hidden" />
												</p>
											</div>';
									$j++;
								}
							}
							?>

					</div>
      		<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Sauvegarder et quitter</a>
			</form>
    </div>
</div>
