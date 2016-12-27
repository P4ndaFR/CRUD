<?php
require_once "../limonade/lib/limonade.php";
require "model/InitDB.php";

dispatch("/","print_home");
dispatch("/fichier","print_file");
dispatch_post("/fichier/ajouter","add_file");
dispatch_post("/fichier/modifier","modify_file");
dispatch_get("/fichier/supprimer","delete_file");
dispatch("/promos","print_promo");
dispatch_post("/promos/ajouter","add_promo");
dispatch_post("/promos/modifier","modify_promo");
dispatch_get("/promos/supprimer","delete_promo");

run();
?>
