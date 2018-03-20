<?php
include('../inc/db.php');

$sqlUpdate = 'UPDATE users SET status="valide",power_rank="2" WHERE id="'.$_GET['id'].'"';
$queryUpdate = $db->query($sqlUpdate);

$sqlUser = 'SELECT * FROM users WHERE id="'.$_GET['id'].'"';
$queryUser = $db->query($sqlUser);
$resultUser = $queryUser->fetchAll();
$name = $resultUser[0]['nom'].' '.$resultUser[0]['prenom'];

$adresse = $resultUser[0]['adresse'];
$sqlInsert = 'INSERT INTO fournisseur(name, adresse) VALUES ("'.$name.'","'.$adresse.'")';
$queryInsert = $db->query($sqlInsert);


//header('Location:../admin');
?>