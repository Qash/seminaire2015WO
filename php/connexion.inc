<?php
	include_once("bd.inc");
	
	try {
		$options = array(
		 PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
		);
		$connexion = new PDO("mysql:host=".HOTE.";dbname=".BD, USER, MDP, $options);
	}
	catch (Exception $e) {
		echo "erreur : ".$e->getMessage()."<br />";
		echo "N° : ".$e->getCode();
	}
?>
