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

<div id="modify" class="modal">
    <div class="modal-content">
      <h4>Modification du promo : <!-- ici tu met le nom du promo --></h4>
    </div>
	    <div class="modal-footer">
				<form>
					<div class="container">
						<h5>Saisissez le libellé du promo</h5>
						<div class="">
          		<input placeholder="" id="first_name" type="text" class="validate">
          		<label for="file">Libellé du promo</label>
        		</div>
						<h5>Cochez les promos à lier</h5>
						<div class="row">
							<div class="input-field inline col l2">
            		<input placeholder="Rang" id="rang" type="number" class="validate">
          		</div>
							<br/>
							<p class="col l6">
	      				<input type="checkbox" id="test5"/>
	      				<label for="test5">Promo 1</label>
							</p>
						</div>
						<div class="row">
							<div class="input-field inline col l2">
            		<input placeholder="Rang" id="rang" type="number" class="validate">
          		</div>
							<br/>
							<p class="col l6">
	      				<input type="checkbox" id="test6" checked="checked"/>
	      				<label for="test6">Promo 2</label>
							</p>
						</div>

					</div>
      		<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Sauvegarder et quitter</a>
			</form>
    </div>
</div>
<div class="fixed-action-btn">
  <a class="btn-floating btn-large red" href="#add">
    <i class="large material-icons">add</i>
  </a>
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
