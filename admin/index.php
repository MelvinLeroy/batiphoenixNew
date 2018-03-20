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

if($resultVerif[0]['power_rank'] == '10'){
    $sqlProduit = 'SELECT * FROM produit WHERE status="pending"';
    $queryProduit = $db->query($sqlProduit);
    $resultProduit = $queryProduit->fetchAll();
    $countProduit = count($resultProduit);

    $sqlUser = 'SELECT * FROM users WHERE status = "pending"';
    $queryUser = $db->query($sqlUser);
    $resultUser = $queryUser->fetchAll();
    $countUser = count($resultUser);
    ?>
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                 <h2>Dashboard </h2>
                    
                </div>
            </div>
             <!-- /. ROW  -->
              <hr />
                
             <!-- /. ROW  -->
             <div class="row">
             <ul class="nav nav-tabs">
                <li class="active"><a href="#product" data-toggle="tab"><?=$countProduit;?> Produit en attentes</a></li>
                <li class=""><a href="#provide" data-toggle="tab"><?=$countUser;?> Demande de partenariat</a></li>
            </ul>
            <div id="product" class="tab-pane fade active in">
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
                                            <td><a href="../action/validProduct.php?id=<?=$resultProduit[$i]['idProduit'];?>">Valider le Produit</a></td>
                                            
                                        </tr>
                                       <?php
                                       }
                                       ?>

                                    </tbody>
                                </table>
                            </div>
            </div>
            <div id="provide" class="tab-pane fade">
                <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Adresse Email</th>
                                            <th>Adresse Postale</th>
                                            <th>Téélphone</th>
                                            <th>Pseudo</th>
                                            <th>Actions</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php
                                            for($i=0;$i<count($resultUser);$i++){
                                             
                                        ?>
                                        <tr class="warning">
                                            <td><?=$resultUser[$i]['nom'];?></td>
                                            <td><?=$resultUser[$i]['prenom'];?></td>
                                            <td><?=$resultUser[$i]['mail'];?></td>
                                            <td><?=$resultUser[$i]['adresse'];?></td>
                                            <td>+33 <?=$resultUser[$i]['telephone'];?></td>
                                            <td><?=$resultUser[$i]['pseudo'];?></td>
                                            <td><a href="../actions/validProvide.php?id=<?=$resultUser[$i]['id'];?>">Valider le Partenariat</a></td>
                                        </tr>
                                       <?php
                                       }
                                       ?>
                                    </tbody>
                                </table>
                            </div>
            </div>
    </div>
         <!-- /. PAGE INNER  -->
        </div>
     <!-- /. PAGE WRAPPER  -->
    </div>
    <div class="footer">


        
    </div>


    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->


    </body>
    </html>

    <?php
}else{
    header('Location:profil.php?id='.$resultVerif[0]['id']);
}
