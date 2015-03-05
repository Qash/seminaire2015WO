<?php
if(isset($_POST['submit'])){
	if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['mail'])){
		if(!empty($_POST['category'])){
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$mail = $_POST['mail'];
			
			$requete = "SELECT mail FROM `newsletter`";
			try {
				$response = $connexion->prepare($requete);
				$response->execute();
			}
			catch (Exception $e) {
				echo $e->getMessage();
			}
			
			$data = $response->fetchAll();
			$row_array = array();
			
			foreach($data as $row) {
				$row_array['mail'] = $row['mail'];
				if ($row_array['mail'] == $mail) {
					$mail_exists = true;
				}
			}
			
			if(!$mail_exists){
				foreach($_POST['category'] as $cat) {
					echo $cat;
				}
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
