<nav id="menu-title" class="top-nav">
	<div class="container">
		<div class="nav-wrapper">
			<p class="page-title text-center">Gestion des promos</p>
		</div>
	</div>
</nav>

<!-- Listage des promos -->
<div class="container">
	<ul class="collection">
		<?php
			$i=0;
				foreach ($promos as $promo) {
          if($promo['promo'])
          {
            echo '<li class="collection-item">'.$promo['promo'].'
                  <a href="index.php/?/promos/supprimer&promo='.$promo['promo'].'">
                    <i class="material-icons right">delete</i>
                  </a>
          <a href="#m'.$i.'" class="modal-trigger"><i class="material-icons right">mode_edit</i></a></li>';
            echo '
              <div id="m'.$i.'" class="modal">
                  <div class="modal-content">
                    <h4>Modification de la promo : '.$promo['promo'].'</h4>
                  </div>

                    <div class="modal-footer">
                      <form action="index.php/?/promos/modifier" method="POST">
                        <div class="container">
                          <h5>Saisissez le nouveau nom de la promo</h5>
                          <div class="">
                                  <input name="oldpromo" value="'.$promo["promo"].'" type="hidden">
                                  <input placeholder="" id="first_name" type="text" class="validate" value="'.$promo["promo"].'" name="promo">
                                  <label for="file">Nom de la promo</label>
                              </div>
                      </div>
                      <input type="submit" class=" modal-action modal-close waves-effect waves-green btn-flat" value="Sauvegarder et quitter" />
                    </form>
                </div>
              </div>
          ';
          }

					$i++;

				}
			?>
	</ul>
</div>

<!-- Ajout d'un promo -->
<div class="fixed-action-btn">
  <a class="btn-floating btn-large red" href="#add">
    <i class="large material-icons">add</i>
  </a>
</div>
<div id="add" class="modal">
    <div class="modal-content">
      <h4>Ajout d'une nouvelle promo :</h4>
    </div>
	    <div class="modal-footer">
				<form action="index.php/?/promos/ajouter" method="POST">
					<div class="container">
						<h5>Saisissez le nom de la promo</h5>
						<div class="">
          		<input placeholder="" id="first_name" type="text" class="validate" name="promo">
          		<label for="file">Nom de promo</label>
        		</div>
					</div>
      		<input type="submit" class=" modal-action modal-close waves-effect waves-green btn-flat" value="Sauvegarder et quitter" />
			</form>
    </div>
</div>
