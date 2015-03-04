<?php

include_once("connexion.inc");

	$requete = "SELECT * FROM `events` ";
	
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
		$row_array['name'] = $row['name'];
		$json_response[] = $row_array; 
	}
	
	echo json_encode($json_response);
?>
