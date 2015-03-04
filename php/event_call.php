<?php

include_once("connexion.inc");

	$requete = "SELECT * FROM event";
	
	try {
	$response = $connexion->prepare($requete);
	$response->execute();
	}
	catch (Exception $e) {
		echo $e->getMessage();
	}
	
	$data = $response->fetchAll();


	$json_response = array();

	foreach($data as $row) {
		$row_array['name'] = $row['name'];
		$row_array['date_debut'] = $row['date_debut'];
		$row_array['duration'] = $row['duration'];
		$row_array['location'] = $row['location'];
		$row_array['preview'] = $row['preview'];
		$row_array['hour'] = $row['hour'];
		$row_array['campus'] = $row['campus'];
	}
		//push the values in the array
		array_push($json_response,$row_array);

	echo json_encode($json_response);

	fclose($db);
			
?>