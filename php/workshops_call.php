<?php
include_once("connexion.inc");
$requete = "SELECT * FROM `workshops`";
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
$row_array['description'] = $row['description'];
$row_array['coordinator'] = $row['coordinator'];
$row_array['location'] = $row['location'];
$row_array['day'] = $row['day'];

$json_response[] = $row_array;
}
echo json_encode($json_response);

?>
