<?php
//init var
include('../inc/db.php');
$numero_rue = htmlspecialchars(addslashes($_POST['numero_rue']));
$qualification_lieu = htmlspecialchars(addslashes($_POST['qualification-lieu']));
$nom_rue = htmlspecialchars(addslashes($_POST['nom_rue']));
$zip = htmlspecialchars(addslashes($_POST['zip']));
$ville = htmlspecialchars(addslashes($_POST['ville']));
$adress = $numero_rue.' '.$qualification_lieu.' '.$nom_rue.' '.$zip.' '.$ville;
$chantier_name = htmlspecialchars(addslashes($_POST['chantier_name']));
$entreprise = htmlspecialchars(addslashes($_POST['entreprise']));
$permis = htmlspecialchars(addslashes($_POST['permis']));

//Get current id user
$sqlId = 'SELECT * FROM users WHERE pseudo = "'.$_SESSION['pseudo'].'"';
$queryId = $db->query($sqlId);
$resultId = $queryId->fetchAll();

//Insert into chantier 
$sql = 'INSERT INTO chantier(name, adresse, entreprise, permis, status,id_user_fk,date_entry) VALUES ("'.$chantier_name.'","'.$adress.'","'.$entreprise.'","'.$permis.'","pending","'.$resultId[0]['id'].'",CURDATE())';
$query = $db->query($sql);

//Get nbr_chantier for count and update this
$sqlChantier = 'SELECT * FROM users WHERE pseudo = "'.$_SESSION['pseudo'].'"';
$queryChantier = $db->query($sqlChantier);
$resultChantier = $queryChantier->fetchAll();
$nbr_chantier = intval($resultChantier[0]['nbr_chantier']);
$nbr_chantier = $nbr_chantier + 1;
$sqlUpdate = 'UPDATE users SET nbr_chantier="'.$nbr_chantier.'" WHERE pseudo="'.$_SESSION['pseudo'].'"';
$queryUpdate = $db->query($sqlUpdate);
header('Location:../admin/chantier.php');