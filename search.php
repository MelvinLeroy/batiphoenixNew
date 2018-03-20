<?php
include('inc/db.php');
$search = strip_tags(trim($_GET['q'])); 

// Do Prepared Query 
$query = $db->prepare("SELECT * FROM produit WHERE nom_du_produit LIKE :search LIMIT 40");

// Add a wildcard search to the search variable
$query->execute(array(':search'=>"%".$search."%"));

// Do a quick fetchall on the results
$list = $query->fetchall(PDO::FETCH_ASSOC);

// Make sure we have a result
if(count($list) > 0){
   foreach ($list as $key => $value) {
	$data[] = array('id' => $value['idProduit'], 'text' => $value['nom_du_produit'],'label'=>$value['nom_du_produit'],"image"=>$value['picture']);			 	
   } 
} else {
   $data[] = array('id' => '0', 'text' => 'No Products Found');
}

// return the result in json
echo json_encode($data);

?>
