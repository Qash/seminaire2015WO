<?php
session_start();
if(isset($_POST['submit'])){
	if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['mail'])){
		if(!empty($_POST['category'])){
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$mail = $_POST['mail'];
			
			include_once("connexion.inc");
						
			foreach($_POST['category'] as $cat) {
					$req = "INSERT INTO `RelPreferencies` (`mail` ,`category`,`firstname`,`lastname`)VALUES ('".$mail."',  '".$cat."',  '".$firstname."',  '".$lastname."')";
					$state = $connexion->prepare($req);
					$state->execute();
					header("Location: http://lamp-pedago/html/a2mm/mathieu.brossard/seminaire2015WO/");
			}
				
		} else {
			echo ("Aucune case selectionné ");
		}
	} else {
		echo ("Tout les champs n'ont pas été remplis");
	}
} else {
	echo ("Vous n'êtes pas passés par le formulaire, comment avez vous fait ?");
}
?>
