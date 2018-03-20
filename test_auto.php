<?php
include('inc/db.php');
$sql = "SELECT * FROM produit WHERE nom_du_produit LIKE '%".$_GET['search']."%'";
$query = $db->query($sql);
$result = $query->fetchAll();

$data = array();
for($k=0;$k < count($result);$k++){
	$data[]['name'] = $result[$k]['nom_du_produit'];
	
}
$out = array_values($data);
echo json_encode($out);
?>