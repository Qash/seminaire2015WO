<?php
include_once("connexion.inc");
$requete = "SELECT * FROM `events` ORDER BY date_debut";
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
$row_array['event'] = $row['event'];
$row_array['category'] = $row['category'];
$json_response[] = $row_array;
}
echo json_encode($json_response);
?>
