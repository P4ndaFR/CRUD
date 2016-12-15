<nav id="menu-title" class="top-nav">
	<div class="container">
		<div class="nav-wrapper">
			<p class="page-title text-center">Accueil</p>
		</div>
	</div>
</nav>
<div class="container">
  <div class="row" >
    <div class="col l6 m6 s12">
      <div class="card center promo">
        <i class="material-icons large">accessibility</i>
        <div class="card-content">
          <span class="card-title">Accéder au promos</span>
          <p class="light center">
           Vous pourrez ajouter, modifier ou supprimer des promotions
          </p>
        </div>
        <div class="card-action">
          <?php echo '<a href="'.url_for('promos').'" class="red btn">Go</a>'; ?>
        </div>
      </div>
    </div>
      <div class="col l6 m6 s12">
        <div class="card center promo">
          <i class="material-icons large">folder</i>
          <div class="card-content">
            <span class="card-title">Accéder aux fichier</span>
            <p class="light center">
             Vous pourrez ajouter, modifier ou supprimer des fichiers
            </p>
          </div>
          <div class="card-action">
            <?php echo '<a href="'.url_for('fichier').'" class="red btn">Go</a>'; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
