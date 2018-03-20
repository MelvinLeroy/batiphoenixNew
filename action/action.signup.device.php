<?php
include('../inc/db.php');
if(isset($_POST)){

  $nom = htmlspecialchars(addslashes($_POST['nom']));
  $prenom = htmlspecialchars(addslashes($_POST['prenom']));
  $mail = htmlspecialchars(addslashes($_POST['mail']));
  $societe = htmlspecialchars(addslashes($_POST['societe']));
  $fonction = htmlspecialchars(addslashes($_POST['fonction']));
  $telephone = htmlspecialchars(addslashes($_POST['telephone']));
  $pass = htmlspecialchars(addslashes($_POST['pass']));
  $crypt = hash('md5',$pass);
  $sqlVerif = 'SELECT * FROM users WHERE mail ="'.$mail.'"';
  $queryVerif = $db->query($sqlVerif);
  $resultVerif = $queryVerif->fetchAll();
  if(count($resultVerif) >= 1){
    header('Location: http://www.batiphoenix.com/');
  }else{
    $pseudo = strstr($mail, '@', true);
    $sql = 'INSERT INTO users(nom, prenom, mail, telephone, date_inscription, pseudo , password, power_rank, color, status, Societe, Fonction) VALUES ("'.$nom.'","'.$prenom.'","'.$mail.'","'.$telephone.'",CURDATE(),"'.$pseudo.'","'.$crypt.'","0","#214761","no-valide","'.$societe.'","'.$fonction.'")';
    $querysignup = $db->query($sql);
    header('Location: http://www.batiphoenix.com/');
}
}
?>

<!DOCTYPE html> 
<html>
    <head>
        <meta HTTP-EQUIV="refresh" CONTENT="0; URL=https://www.batiphoenix.com/confirmation.php">
    </head>
</html>
 
