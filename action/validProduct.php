<?php
include('../inc/db.php');
$sqlUpdate = 'UPDATE produit SET status="valide" WHERE idProduit="'.$_GET['id'].'"';
$queryUpdate = $db->query($sqlUpdate);
header('Location:../admin');
?>