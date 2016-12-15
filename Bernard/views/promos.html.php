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
            echo '<li class="collection-item">'.$promo['promo'].'<a href="http://front.rentree.fr/CRUD/Bernard/?/delete_file"><i class="material-icons right">delete</i></a>
          <a href="#m'.$i.'" class="modal-trigger"><i class="material-icons right">reorder</i></a></li>';
            echo '
              <div id="m'.$i.'" class="modal">
                  <div class="modal-content">
                    <h4>Modification de la promo : '.$promo['promo'].'</h4>
                  </div>

                    <div class="modal-footer">
                      <form>
                        <div class="container">
                          <h5>Saisissez le nom de la promo</h5>
                          <div class="">
                                  <input placeholder="" id="first_name" type="text" class="validate">
                                  <label for="file">Nom de la promo</label>
                              </div>
                      </div>
                      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Sauvegarder et quitter</a>
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

<div id="add" class="modal">
    <div class="modal-content">
      <h4>Ajout d'une nouvelle promo :</h4>
    </div>
	    <div class="modal-footer">
				<form>
					<div class="container">
						<h5>Saisissez le nom de la promo</h5>
						<div class="">
          		<input placeholder="" id="first_name" type="text" class="validate">
          		<label for="file">Nom de promo</label>
        		</div>
					</div>
      		<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Sauvegarder et quitter</a>
			</form>
    </div>
</div>
