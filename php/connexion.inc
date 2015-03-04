<?php
	include_once("bd.inc");
	
	try {
		$connexion = new PDO("mysql:host=".HOTE.";dbname=".BD, USER, MDP);
	}
	catch (Exception $e) {
		echo "erreur : ".$e->getMessage()."<br />";
		echo "N° : ".$e->getCode();
	}
?>