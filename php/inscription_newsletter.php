<?php
if(isset($_POST['submit'])){
	if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['mail'])){
		if(!empty($_POST['category'])){
			foreach($_POST['category'] as $cat) {
				echo $cat;
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
