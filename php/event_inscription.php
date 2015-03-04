<?php
session_start();
$_SESSION['id_user'] = 11302484;
	include_once("connexion.inc");

if(isset($_SESSION['id_user'])) {
		$requete = "SELECT * FROM user where id_user = '".$_SESSION['id_user']."'";
	
	try {
	$response = $connexion->prepare($requete);
	$response->execute();
	}
	catch (Exception $e) {
		echo $e->getMessage();
	}
	
	$data = $response->fetchAll();


	$row_array = array();
	$json_response = array();

	foreach($data as $row) {
		$user = $row['id_user'];
		$sc = $row['mem_sc'];
		if ($sc == 1) {
			$sc = 'oui';
		}
		else if($sc ==0) {
			$sc = 'non';
		}
		else {
			echo ('erreur sur '.$sc);
		}
	}

	if($sc == 'oui') {
		if(isset($_POST['submit']) && isset($_POST['event'])) {

			$req = "INSERT INTO  `11402421-seminaire2015WO`.`RelSubscribe` (`user` ,`event`)VALUES ('".$user."',  '".$event."')";

		} else {
			echo('Vous avez essayé de vous conencter sans passer par la voix normale');
		}
	} else {
		echo ("Vous n'êtes pas inscrits au service culturel");
	}
}

?>