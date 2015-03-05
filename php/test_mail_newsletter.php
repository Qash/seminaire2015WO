<?php
session_start();

include_once("connexion.inc");


$requete = "SELECT * FROM `newsletter`";
try {
	$response = $connexion->prepare($requete);
	$response->execute();
}
catch (Exception $e) {
	echo $e->getMessage();
}
$data = $response->fetchAll();
$row_array = array();
$mail_array = array();

foreach($data as $row) {
	$row_array['mail'] = $row['mail'];
	$mail_array[] = $row_array;
}

echo json_encode($mail_array);

?>
