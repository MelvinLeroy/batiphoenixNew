<?php
	include('../inc/db.php');
  	$sql = 'SELECT * FROM commandes WHERE id="'.htmlspecialchars(addslashes($_GET['id'])).'"';
  	$requestSql = $db->query($sql);
  	$resultSql = $requestSql->fetchAll();
  	$product = explode(',',$resultSql[0]['produts_id']);
  	$sqlUser = 'SELECT * FROM users WHERE id = "'.htmlspecialchars(addslashes($_GET['id_user'])).'"';
  	$requestUser = $db->query($sqlUser);
  	$resultUser = $requestUser->fetchAll();

  	echo '<p>Numero de Commande : '.$resultSql[0]['num_commande'].'</p>';
  	echo '<p>Propriétaire de la commande : '.$resultUser[0]['pseudo'].'</p>';
  	$nbr_product = count(array_keys($product));
  	echo 'Contenu de la Commande :';
  	?>
  	<table border='1'>
            <thead>
              	<tr>
					<td>Image</td>
                    <td>Nom du Produit</td>
                    <td>Prix</td>
                    <td>Quantité</td>
                    <td>Prix avec TVA</td>
					<td>Sous-Total H.T.</td>
					<td>Sous-Total</td>
                </tr>
            </thead>
            <tbody>
            <?php
            $prixht = 0;
            $prixttc = 0;
  	for($x = 0; $x < $nbr_product;$x++){
  		$string = explode('(',$product[$x]);
  		$id_produit = $string[0];
  		$quantité_produit = rtrim($string[1],')');
  		$sqlProduit = 'SELECT * FROM produit WHERE idProduit = "'.$id_produit.'"';
  		$requestProduit = $db->query($sqlProduit);
  		$resultProduit = $requestProduit->fetchAll();
  		?>
  		
            <tr>
            	<td><img src="../<?= $resultProduit[0]['picture'];?>" height="53"></td>
            	<td><?=$resultProduit[0]['nom_du_produit'];?></td>
            	<td><?=$resultProduit[0]['prix_format'];?></td>
            	<td><?=$quantité_produit;?></td>
            	<?php $prix_tva = $resultProduit[0]['prix'] * 1.196;?>
                <td><?= $prix_tva.' €';?></td>
                <?php $stht = $resultProduit[0]['prix'] * $quantité_produit;?>
				<td><?= $stht.' €';?></td>
				<?php $st = $prix_tva * $quantité_produit;?>
				<td><?= $st.' €';?></td>
            </tr>
            
  		<?php
  		$prixht += $resultProduit[0]['prix'] * $quantité_produit;
  		$prixttc +=($resultProduit[0]['prix'] * $quantité_produit) * 1.196;
  	}
  	?>
  	</tbody>
        </table>
    <p><h3>Total H.T. : <center><?= $prixht.' €';?></center></h3></p>
	<p><h3>Total : <center><?= $prixttc.' €';?></center></h3></p>
  	<a href="../profil.php">Retourner aux commandes</a>