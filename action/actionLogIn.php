<?php
include('../inc/db.php');
$sqlVerif = 'SELECT * FROM users WHERE mail="'.$_POST['mail'].'"';
$queryVerif = $db->query($sqlVerif);
$resultVerif = $queryVerif->fetchAll();
$username = $resultVerif[0]['mail'];
$password = $resultVerif[0]['password'];

if(isset($_POST['mail']) && isset($_POST['pass'])){
  if($_POST['mail'] == $username && MD5($_POST['pass']) == $password){
    $_SESSION['pseudo'] = $_POST['mail'];
    $_SESSION['prenom'] = $resultVerif[0]['prenom'];
    $_SESSION['nom'] = $resultVerif[0]['nom'];
    $_SESSION['id'] = $resultVerif[0]['id'];
    echo "Success";        
  }
  else{
    echo "Failed";
  }
}

?>
