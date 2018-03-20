<?php
header('Location: ../index.php');
include('../inc/db.php');
if (isset($_POST)) {

    $nom = htmlspecialchars(addslashes($_POST['nom']));
    $prenom = htmlspecialchars(addslashes($_POST['prenom']));
    $mail = htmlspecialchars(addslashes($_POST['mail']));
    $telephone = htmlspecialchars(addslashes($_POST['telephone']));
    
    $sql = 'INSERT INTO attente (prenom, nom, email, telephone, entry_date) VALUES ("'.$nom.'", "'.$prenom.'", "'.$mail.'", "'.$telephone.'", CURDATE())';
    $query = $db->query($sql);
    
    echo "Envoyé !";
}else{
    echo "Erreur";
}
