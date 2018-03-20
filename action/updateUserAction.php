<?php
include('../inc/db.php');
	$sqlUpdate = 'UPDATE users SET 
	nom="'.htmlspecialchars(addslashes($_POST['user_nom'])).'",
	prenom="'.htmlspecialchars(addslashes($_POST['user_prenom'])).'",
	adresse="'.htmlspecialchars(addslashes($_POST['user_address'])).'",
	telephone="'.htmlspecialchars(addslashes($_POST['user_phone'])).'",
	pseudo="'.htmlspecialchars(addslashes($_POST['user_pseudo'])).'",
	color="#'.htmlspecialchars(addslashes($_POST['user_color'])).'" 
	WHERE id="'.$_POST['id'].'"';
$queryUpdate = $db->query($sqlUpdate);
?>
<script type="text/javascript">
	document.location.href = "../admin/index.php"
</script>