<?php
include('../inc/db.php');
include('function.php');
libs();
$sqlVerif = 'SELECT * FROM users WHERE pseudo="'.$_SESSION['pseudo'].'"';
$queryVerif = $db->query($sqlVerif);
$resultVerif = $queryVerif->fetchAll();
if(!empty($_SESSION['pseudo']) && $resultVerif[0]['power_rank'] == '10'){
    Navbar_admin();
}else{
    Navbar_user();
}if($resultVerif[0]['power_rank'] !== '10'){
    header('Location:/admin');
}else{
	$sqlDevis = 'SELECT * FROM commandes WHERE id="'.$_GET['id'].'"';
	$queryDevis = $db->query($sqlDevis);
	$resultDevis = $queryDevis->fetchAll();
    $product = explode(',',$resultDevis[0]['produts_id']);
    $sqlUser = 'SELECT * FROM users WHERE id = "'.$_GET['id_user'].'"';
    $requestUser = $db->query($sqlUser);
    $resultUser = $requestUser->fetchAll();
    $nbr_product = count(array_keys($product));
?>
 
        <div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Devis n° <?=$resultDevis[0]['id'];?></h2>
						
                    </div>
                </div>
                <!-- /. ROW  -->
                                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        
                                        <td>Nom du Produit</td>
                                        <td>Image</td>
                                        <td>Quantité</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    for($x = 0; $x < $nbr_product;$x++){
                                        $string = explode('(',$product[$x]);
                                        $id_produit = $string[0];
                                        $quantité_produit = rtrim($string[1],')');
                                        $sqlProduit = 'SELECT * FROM produit WHERE idProduit = "'.$id_produit.'"';
                                        $requestProduit = $db->query($sqlProduit);
                                        $resultProduit = $requestProduit->fetchAll();
                                        
                                    ?>
                                    <tr class="warning">
                                        <td><?=$resultProduit[0]['nom_du_produit'];?></td>
                                        <td><img src="../img/articles/<?= $resultProduit[0]['picture'];?>" height="53"></td>
                                        <td><?=$quantité_produit;?></td>
                                    </tr>
                                    
                                <?php
                                
                            }
                            ?>
                        </tbody>
                            </table>
        </div>
                    </div>
                </div>
               

            </div>
            </div>
         <!-- /. PAGE WRAPPER  -->
       
    <div class="footer">

        </div>
</body>
</html>
<?php

}
?>