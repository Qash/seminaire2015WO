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

			$requete = "SELECT * FROM events where name = '".$_POST['event']."'";
			$event = $_POST['event'];


				try {
				$response = $connexion->prepare($requete);
				$response->execute();
				}
				catch (Exception $e) {
					echo $e->getMessage();
				}
				
				$data = $response->fetchAll();

				foreach($data as $row) {
					$bd_event = $row['name'];
					if($bd_event == $row['name']) {
						$req = "INSERT INTO `RelSubscribe` (`user` ,`event`)VALUES ('".$user."',  '".$event."')";
						$state = $connexion->prepare($req);
						$state->execute();
						header("Location: http://lamp-pedago/html/a2mm/mathieu.brossard/seminaire2015WO/");
					} else {
						echo ("L'évènement pour lequel vous essayez de vous inscrire n'existe pas.");
					}
				}
		} else {
			echo('Vous avez essayé de vous conencter sans passer par la voix normale');
		}
	} else {
		echo ("Vous n'êtes pas inscrits au service culturel");
	}
}

?>
