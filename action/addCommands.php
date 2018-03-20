<?php
	include('../inc/db.php');
  	include('../inc/panier.class.php');
  	$panier = new Panier();
  	$sqlUser = 'SELECT id FROM users WHERE pseudo = "'.$_SESSION['pseudo'].'"';
  	$requestUser = $db->query($sqlUser);
  	$resultUser = $requestUser->fetchAll();
  	$id_user_fk = $resultUser[0]['id'];
	$char = 'abcdefghijklmnopqrstuvwxyz0123456789';
	$pwd = str_shuffle($char);
	$num_commande = substr($pwd,-20,-1);
  	$tab = explode(',',htmlspecialchars(addslashes($_POST['product_id'])));
  	for($x = 0; $x < count($tab);$x++){
  		$string = explode('(',$tab[$x]);
  	}
  	$sql = 'INSERT INTO commandes(id_user_fk, num_commande, produts_id,status) VALUES ("'.$id_user_fk.'","'.$num_commande.'","'.$_POST['product_id'].'","unread")';
  	$request = $db->query($sql);
  	?>
      <script type="text/javascript">
        alert('La commande a bien été créer');
        window.location.href = '../index.php';
      </script>
      <?php
      unset($_SESSION['panier']);
?>