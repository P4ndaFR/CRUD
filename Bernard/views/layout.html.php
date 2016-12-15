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

    <ul id="slide-out" class="side-nav fixed">

      <div class=container>
        <?php echo '<img src="images/logo-isen.png" class="responsive-img"/>'; ?>
        <li><h5>Documents de rentrée<h5></li>
            <?php echo
            '<li>
              <ul>
                  <li><a href="'.url_for('/').'" >Accueil</a></li>
                  <li><a href="'.url_for('fichier').'">Fichiers</a></li>
                  <li><a href="'.url_for('promos').'">Promotions</a></li>
              </ul>
              </li>
              ';
            ?>
      </div>
  </ul>

  <?php echo $content ?>
  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
  <script type="text/javascript" src="js/css-framework.js"></script>

  </body>
</html>
