<?php
require_once "../limonade/lib/limonade.php";
require "model/InitDB.php";


dispatch("/hello","hello");
dispatch("/home","home");
dispatch("/fichier","print_file");
dispatch("/fichier/ajouter","add_file");
dispatch("/fichier/modifier","modify_file");
dispatch("/fichier/supprimer","delete_file");
dispatch("/promos","print_promo");
dispatch("/promos/ajouter","add_promo");
dispatch("/promos/modifier","modify_promo");
dispatch("/promos/supprimer","delete_promo");

run();
?>