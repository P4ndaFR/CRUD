<?php

$dsn='mysql:dbname=front;host=127.0.0.1';
$user='front';
$password='front';

try {
	$pdo = new PDO($dsn,$user,$password);
} catch (PDOException $e) {
	echo "Connexion échouée : ".$e->getMessage();
}

?>