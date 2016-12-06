
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
				foreach ($fichiers as $key=>$fichier) {
					foreach ($fichier as $key1=>$value){
						echo "<li class='collection-item'>".$value."<a href='http://front.rentree.fr/CRUD/Bernard/?/delete_file'><i class='material-icons right'>delete</i></a>
					<a href='#modify' class='modal-trigger'><i class='material-icons right'>reorder</i></a></li>";
					}
				}
			?>
	</ul>
</div>

<div id="modify" class="modal">
    <div class="modal-content">
      <h4>Modification du fichier : <!-- ici tu met le nom du fichier --></h4>
    </div>
	    <div class="modal-footer">
				<form>
					<div class="container">
						<h5>Saisissez le libellé du fichier</h5>
						<div class="">
          		<input placeholder="" id="first_name" type="text" class="validate">
          		<label for="file">Libellé du Fichier</label>
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
