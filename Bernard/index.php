<?php
require_once "../limonade/lib/limonade.php";
require_once "controllers/test.php";


dispatch("/hello","hello");


run();
?>