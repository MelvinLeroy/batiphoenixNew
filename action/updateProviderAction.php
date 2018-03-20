<?php
include('../inc/db.php');
	$sqlUpdate = 'UPDATE fournisseur SET 
	name="'.htmlspecialchars(addslashes($_POST['provide_name'])).'",
	adresse="'.htmlspecialchars(addslashes($_POST['provide_adress'])).'",
	map="'.htmlspecialchars(addslashes($_POST['provide_geo'])).'" 
	WHERE id="'.$_POST['id'].'"';
$queryUpdate = $db->query($sqlUpdate);
if($_POST['provide_geo'] === 'Oui'){
    	$sqlMarker = 'INSERT INTO markers(name, address, lat, lng) 
    	VALUES ("'.htmlspecialchars(addslashes($_POST['provide_name'])).'","'.htmlspecialchars(addslashes($_POST['provide_adress'])).'","0.00","0.00")';
    	$queryMarker = $db->query($sqlMarker);
    }
if($_POST['provide_geo'] === 'Non'){
    	$sqlMarker = 'UPDATE markers SET 
    	name="'.$_POST['provide_name'].'"
    	WHERE name="'.$_POST['name_markers'].'"';
    	$queryMarker = $db->query($sqlMarker);
    	$sqlDelete = 'DELETE FROM markers WHERE name="'.$_POST['provide_name'].'"';
    	$queryDelete = $db->query($sqlDelete);
    }
header('Location:../admin/fournisseur.php');
?>