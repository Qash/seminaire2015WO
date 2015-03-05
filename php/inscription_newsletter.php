<?php
if(isset($_POST['submit'])){
	if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['mail'])){
		if(!empty($_POST['category'])){
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$mail = $_POST['mail'];
			
			include_once("connexion.inc");
						
			$requete = "SELECT `mail` FROM `newsletter`";
			try {
				$response = $connexion->prepare($requete);
				$response->execute();
			}
			catch (Exception $e) {
				echo $e->getMessage();
			}
			
			$data = $response->fetchAll();
						
			foreach($data as $row) {
				$row_array['mail'] = $row['mail'];
				if ($row_array['mail'] == $mail) {
					$mail_exists = true;
				}
			}
			
			if($mail_exists !== true){
				foreach($_POST['category'] as $cat) {
					$connexion->exec('INSERT INTO RelPreferencies(mail, category) VALUES(\''.$mail.'\', \''.$cat.'\', \')');

				}
			} else {
				echo ("t'as déjà un mail !");
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
