<?php
include('../inc/db.php');
$id = htmlspecialchars(addslashes($_POST['id']));
$sql = 'SELECT * FROM produit WHERE cat_id="'.$id.'" AND status="valide"';
//die($sql);
$query = $db->query($sql);
$result = $query->fetchAll();
$data = array();
for($k=0;$k < count($result);$k++){
	$sqlCat = 'SELECT * FROM categorie WHERE id= "'.$result[$k]['cat_id'].'"';
	$queryCat = $db->query($sqlCat);
	$resultCat = $queryCat->fetchAll();

	$sqlChantier = 'SELECT * FROM chantier WHERE id="'.$result[$k]['idChantier'].'"';
	$queryChantier = $db->query($sqlChantier);
	$resultChantier = $queryChantier->fetchAll();

	$data[]['name'] = $result[$k]['nom_du_produit'];
	$data[]['img'] = $result[$k]['picture'];
	$data[]['stock'] = $result[$k]['Stock'];
	$data[]['adresse'] = $resultChantier[0]['adresse'];
	
	
}
$out = array_values($data);
echo json_encode($out);
// $fp = fopen('results.json', 'w');
// fwrite($fp, json_encode($out));
// fclose($fp);

?>