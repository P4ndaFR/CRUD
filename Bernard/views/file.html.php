
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
						echo '<li class="collection-item">'.$keep.'<a href="http://front.rentree.fr/CRUD/Bernard/?/delete_file"><i class="material-icons right">delete</i></a>
					<a href="#m'.$i.'" class="modal-trigger"><i class="material-icons right">reorder</i></a></li>';
						echo '
							<div id="m'.$i.'" class="modal">
							    <div class="modal-content">
							      <h4>Modification du fichier : '.$keep.'</h4>
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

							for ($j=0;$j<count($promos);$j++) {

									echo '<div class="row">
											<div class="input-field inline col l2">
							            		<input placeholder="'.$rangs[$j].'" id="rang" type="number" class="validate">
							          		</div>
											<br/>
											<p class="col l6">
								      			<input type="checkbox" id="'.$i.''.$j.'"/>
								      			<label for="'.$i.''.$j.'">'.$promos[$j].'</label>
											</p>
										</div>';
							}
						echo '
											</div>
											<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Sauvegarder et quitter</a>
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
						<div class="row">
							<div class="input-field inline col l2">
            		<input placeholder="Rang" id="rang" type="number" class="validate">
          		</div>
							<br/>
							<p class="col l6">
	      				<input type="checkbox" id="test52"/>
	      				<label for="test52">Promo 1</label>
							</p>
						</div>
						<div class="row">
							<div class="input-field inline col l2">
            		<input placeholder="Rang" id="rang" type="number" class="validate">
          		</div>
							<br/>
							<p class="col l6">
	      				<input type="checkbox" id="test63" checked="checked"/>
	      				<label for="test63">Promo 2</label>
							</p>
						</div>

					</div>
      		<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Sauvegarder et quitter</a>
			</form>
    </div>
</div>
