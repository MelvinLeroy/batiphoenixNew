<?php
include('../inc/db.php');
$name = htmlspecialchars(addslashes($_POST['name']));
$sql = 'SELECT * FROM produit WHERE nom_du_produit="'.$name.'" AND status_item="valide"';
$query = $db->query($sql);
$result = $query->fetchAll();

$sqlChantier = 'SELECT * FROM chantier WHERE id="' . $result[0]['idChantier'] . '"';
$queryChantier = $db->query($sqlChantier);
$resultChantier = $queryChantier->fetchAll();
//die($result);
$data = array();
for($k=0;$k < count($result);$k++){
	$data[]['img'] = $result[$k]['picture'];
	$data[]['name'] = $result[$k]['nom_du_produit'];
	$data[]['stock'] = $result[$k]['Stock'];
	$data[]['mesurestock'] = $result[$k]['mesureStock'];
	$data[]['prix'] = $result[$k]['Prix'];
	$data[]['mesureprix'] = $result[$k]['mesurePrix'];
	$data[]['chantier'] = $resultChantier[$k]['adresse'];
	$data[]['longueur'] = $result[$k]['longueur'];
	$data[]['largeur'] = $result[$k]['largeur'];
	$data[]['hauteur'] = $result[$k]['hauteur'];
	$data[]['origine'] = $result[$k]['origine'];
	$data[]['desc'] = $result[$k]['remarque'];
		
}
$out = array_values($data);
echo json_encode($out);
//print_r($db->errorInfo());
// $fp = fopen('results.json', 'w');
// fwrite($fp, json_encode($out));
// fclose($fp);

?>