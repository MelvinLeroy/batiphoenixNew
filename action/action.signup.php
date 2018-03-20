<?php
include('../inc/db.php');
if (isset($_POST)) {

    $nom = htmlspecialchars(addslashes($_POST['nom']));
    $prenom = htmlspecialchars(addslashes($_POST['prenom']));
    $mail = htmlspecialchars(addslashes($_POST['mail']));
    $societe = htmlspecialchars(addslashes($_POST['societe']));
    $fonction = htmlspecialchars(addslashes($_POST['fonction']));
    $telephone = htmlspecialchars(addslashes($_POST['telephone']));
    $pass = htmlspecialchars(addslashes($_POST['pass']));
    $confirmpass = htmlspecialchars(addslashes($_POST['passconfirm']));
    $crypt = hash('md5', $pass);
    $sqlVerif = 'SELECT * FROM users WHERE mail ="' . $mail . '"';
    $queryVerif = $db->query($sqlVerif);
    $resultVerif = $queryVerif->fetchAll();
    if (count($resultVerif) >= 1) {
        echo "<script>alert('Cet utilisateur existe');window.location.href='../index.php';</script>";
    } else {
//        if (strlen($telephone) === 10 && is_numeric($telephone) && $pass === $confirmpass && isset($_POST['checkbox'])) {
            $sql = 'INSERT INTO users(nom, prenom, mail, telephone, date_inscription, pseudo , password, power_rank, color, status, Societe, Fonction) VALUES ("' . $nom . '","' . $prenom . '","' . $mail . '","' . $telephone . '",CURDATE(),"' . $pseudo . '","' . $crypt . '","0","#214761","no-valide","' . $societe . '","' . $fonction . '")';
            $querysignup = $db->query($sql);
            echo "<script>alert('Vous êtes bien inscrit. Vous pouvez à présent vous connecter.');window.location.href='../index.php';</script>";
            redirect('../index.php');
//        } elseif (strlen($telephone) != 10) {
//            echo "Le numéro de téléphone doit contenir 10 chiffres";
//        } elseif (!is_numeric($telephone)) {
//            echo "Le numéro de téléphone ne doit contenir que des chiffres";
//        } elseif ($pass != $confirmpass) {
//            echo "Les mots de passe doivent être identiques";
//        } elseif (!isset($_POST['checkbox'])) {
//            echo "Veuillez accepter les conditions générales d'utilisation";
//        } else {
//            echo "erreur dans le script";
//        }
    }
}
?>
