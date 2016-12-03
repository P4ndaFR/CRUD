<html>
  <head>
    <!--Import Google Icon Font-->
     <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
    <link rel="stylesheet" href="css/default-materialize.css">

    <meta charset="utf-8">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Back-Office</title>
  </head>
  <body>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
    <ul id="slide-out" class="side-nav fixed">
      <img src="../rentree/images/logo_ISEN.png" class="responsive-img"/>
      <div class=container>
        <h5>Documents de rentrée<h5>
              <ul class="collapsible" data-collapsible="accordion">
                  <li>
                    <div class="collapsible-header">
                      <i class="material-icons">keyboard_arrow_down</i><a>Fichiers</a>
                    </div>
                    <div class="collapsible-body">
                      <ul>
                        <li><a href="">Ajouter un fichier</a></li>
                        <li><a href="">Supprimer un fichier</a></li>
                        <li><a href="">Modifier un fichier</a></li>
                      </ul>
                    </div>
                  </li>
                  <li>
                    <div class="collapsible-header">
                      <i class="material-icons">keyboard_arrow_down</i><a>Promotions</a>
                    </div>
                    <div class="collapsible-body">
                      <ul>
                        <li><a href="">Ajouter une promotion</a></li>
                        <li><a href="">Supprimer une promotion</a></li>
                        <li><a href="">Modifier une promotion</a></li>
                      </ul>
                    </div>
                  </li>
              </ul>
      </div>
  </ul>

  <?php echo $content ?>

  <script type="text/javascript" src="js/css-framework.js"></script>
  </body>
</html>
