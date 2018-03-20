<?php
include('../inc/db.php');
include('function.php');
libs();
$sqlVerif = 'SELECT * FROM users WHERE pseudo="'.$_SESSION['pseudo'].'"';
$queryVerif = $db->query($sqlVerif);
$resultVerif = $queryVerif->fetchAll();
if(!empty($_SESSION['pseudo']) && $resultVerif[0]['power_rank'] == '10'){
    Navbar_admin();
}else if(!empty($_SESSION['pseudo']) && $resultVerif[0]['power_rank'] == '2'){
    Navbar_provider();
}
else{
    Navbar_user();
}
if($resultVerif[0]['power_rank'] == '2'){
	$sqlProduit = 'SELECT * FROM produit WHERE id_provider="'.$resultVerif[0]['id'].'"';
	$queryProduit = $db->query($sqlProduit);
	$resultProduit = $queryProduit->fetchAll();

    ?>
 
        <div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Mes Produits</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
           	<div class="row">
				 <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom du Produit</th>
                                <th>Description</th>
                                <th>Catégorie</th>
                                <th>Fournisseur</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Actions</th>     
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                for($i=0;$i<count($resultProduit);$i++){
                                    $sqlCat = 'SELECT * FROM categorie WHERE id="'.$resultProduit[$i]['cat_id'].'"';
                                    $queryCat = $db->query($sqlCat);
                                    $resultCat = $queryCat->fetchAll();
                                    $sqlProvide = 'SELECT * FROM fournisseur WHERE id="'.$resultProduit[$i]['id_provider'].'"';
                                    $queryProvide = $db->query($sqlProvide);
                                   	$resultProvide = $queryProvide->fetchAll();
                            ?>
                            <tr class="warning">
                                <td><?=$resultProduit[$i]['idProduit'];?></td>
                                <td><?=$resultProduit[$i]['nom_du_produit'];?></td>
                                <td><?=$resultProduit[$i]['description'];?></td>
                                <td><?=$resultCat[0]['name'];?></td>
                                <td><?=$resultProvide[0]['name'];?></td>
                                <td><img src="<?=$resultProduit[$i]['picture'];?>" style='height: 50px;'></td>
                                <td><?=$resultProduit[$i]['status'];?></td>
                                <td><a href="../action/validProduct.php?id=?<?=$resultProduit[$i]['idProduit'];?>">Valider le Produit</a></td>   
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
         <!-- /. PAGE WRAPPER  -->
       
    <div class="footer">

        </div>
</body>
</html>
<?php

}else{
    header('Location:/admin');


}
?>