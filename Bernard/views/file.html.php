
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
				foreach ($fichiers as $key=>$fichier) {
					foreach ($fichier as $key1=>$value){
						echo "<li class='collection-item'>".$value."<a href='http://front.rentree.fr/CRUD/Bernard/?/delete_file'><i class='material-icons right'>delete</i></a>
					<a href='#m".$i."' class='modal-trigger'><i class='material-icons right'>reorder</i></a></li>";
					echo "
						<div id='m".$i."' class='modal'>
						    <div class='modal-content'>
						      <h4>Modal Header</h4>
						      <p>A bunch of text</p>
						    </div>
						    <div class='modal-footer'>
						      <a href='#!' class=' modal-action modal-close waves-effect waves-green btn-flat'>Agree</a>
						    </div>
						</div>
					";
					$i++;
					}
				}
		?>
	</ul>
</div>
