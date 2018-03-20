<?php
include('../inc/db.php');
$numero_rue = htmlspecialchars(addslashes($_POST['numero_rue']));
$qualification_lieu = htmlspecialchars(addslashes($_POST['qualification-lieu']));
$nom_rue = htmlspecialchars(addslashes($_POST['nom_rue']));
$zip = htmlspecialchars(addslashes($_POST['zip']));
$ville = htmlspecialchars(addslashes($_POST['ville']));
$adress = $numero_rue.' '.$qualification_lieu.' '.$nom_rue.' '.$zip.' '.$ville;

    $sqlAddProvide = 'INSERT INTO fournisseur(name, adresse, map) VALUES ("'.htmlspecialchars(addslashes($_POST['provide_name'])).'","'.$adress.'","'.htmlspecialchars(addslashes($_POST['provide_geo'])).'")';
    $queryAddProvide = $db->query($sqlAddProvide);
    if($_POST['provide_geo'] === 'Oui'){
    	$sqlMarker = 'INSERT INTO markers(name, address, lat, lng) 
    	VALUES ("'.htmlspecialchars(addslashes($_POST['provide_name'])).'","'.$adress.'","0.00","0.00")';
    	$queryMarker = $db->query($sqlMarker);
    }
    header('Location:../admin/fournisseur.php');
?>à