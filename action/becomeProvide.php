<?php
include('../inc/db.php');
$numero_rue = htmlspecialchars(addslashes($_POST['numero_rue']));
$qualification_lieu = htmlspecialchars(addslashes($_POST['qualification-lieu']));
$nom_rue = htmlspecialchars(addslashes($_POST['nom_rue']));
$zip = htmlspecialchars(addslashes($_POST['zip']));
$ville = htmlspecialchars(addslashes($_POST['ville']));
$adress = $numero_rue.' '.$qualification_lieu.' '.$nom_rue.' '.$zip.' '.$ville;

$sqlUser = 'SELECT * FROM users where pseudo = "'.$_SESSION['pseudo'].'"';
$queryUser = $db->query($sqlUser);
$resultUser = $queryUser->fetchAll();

$sqlUpdate = 'UPDATE users SET status="pending",adress="'.$adress.'" WHERE pseudo="'.$_SESSION['pseudo'].'"';
$queryUpdate = $db->query($sqlUpdate);
?>
<script type="text/javascript">
    alert('Votre demande a bine été prise en compte');
    window.location.href="../admin";
</script>