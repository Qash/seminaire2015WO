<?php

include_once("connexion.inc");
	
	
	$requete = "SELECT * FROM `events`";
	
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
		 $row_array['date_debut'] = $row['date_debut'];
		 $row_array['duration'] = $row['duration'];
		 $row_array['location'] = $row['location'];
		 $json_response[] = $row_array; 
	}
	
	print_r ($json_response);
?>
