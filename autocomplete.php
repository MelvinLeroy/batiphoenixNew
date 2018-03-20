<?php
include('inc/test.pdo.php');

if($_GET['type'] == 'produit'){
	$result = mysql_query("SELECT name FROM produit where nom_du_produit LIKE '".strtoupper($_GET['name_startsWith'])."%'");	
	$data = array();
	while ($row = mysql_fetch_array($result)) {
		array_push($data, $row['name']);	
	}	
	echo json_encode($data);
}

?>