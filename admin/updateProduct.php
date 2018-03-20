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
if($resultVerif[0]['power_rank'] == '10' || $resultVerif[0]['power_rank'] == '2'){
   $sqlProduit = 'SELECT * FROM produit WHERE idProduit="'.$_GET['id'].'"';
    $queryProduit = $db->query($sqlProduit);
    $resultProduit = $queryProduit->fetchAll();
?>
 <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
 
        <div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Modifier <?=$resultProduit[0]['nom_du_produit'];?></h2>
                        
                    </div>
                </div>
                <!-- /. ROW  -->
                                <div class="row">
                    <div class="col-lg-12 col-md-12">
                      <form action="../action/updateProductAction.php" method="post" enctype='multipart/form-data'>
                          <input type="hidden" name="id" value="<?=$resultProduit[0]['idProduit'];?>">
                          <div class="form-group">
                                <label>Titre du Produit</label>
                                <input class="form-control" name="product_name"  value="<?=$resultProduit[0]['nom_du_produit'];?>" required/>
                            </div>
                            <div class="form-group">
                                <label>Description du Produit</label>
                                <input type="text" class="form-control" name="product_desc" value="<?=$resultProduit[0]['description'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Catégorie</label>
                                <select class="form-control" name="product_cat" required>
                                    <?php
                                        $sqlCat = 'SELECT * FROM categorie WHERE 1';
                                        $queryCat = $db->query($sqlCat);
                                        $resultCat = $queryCat->fetchAll();
                                        for($i=0;$i<count($resultCat);$i++){
                                            ?>
                                            <option value="<?=$resultCat[$i]['id'];?>"><?=$resultCat[$i]['name'];?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Stock</label>
                                <input type="text" class="form-control" name="product_stock"value="<?=$resultProduit[0]['Stock']?>">
                            </div>
                             <div class="form-group">
                                <label>Prix Unitaire</label>
                                <input type="text" class="form-control" name="product_price"value="<?=$resultProduit[0]['Prix']?>">
                            </div>
                            <div class="form-group">
                                <label>Dimensions</label>
                                <input type="text" class="form-control" name="product_dimension"value="<?=$resultProduit[0]['Dimension']?>">
                            </div>
                            <div class="form-group">
                                <label>Chantiers</label>
                                <select class="form-control" name="product_chantier"required>
                                    <?php
                                        $sqlChantier = 'SELECT * FROM chantier WHERE id_user_fk="'.$resultVerif[0]['id'].'"';
                                        $queryChantier = $db->query($sqlChantier);
                                        $resultChantier = $queryChantier->fetchAll();
                                        for($i=0;$i<count($resultChantier);$i++){
                                            ?>
                                            <option value="<?=$resultChantier[$i]['id'];?>"><?=$resultChantier[$i]['name'];?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Fournisseur</label>
                                <?php
                                    $sqlProvide = 'SELECT * FROM fournisseur WHERE id="'.$resultProduit[0]['id_provider'].'"';
                                    $queryProvide = $db->query($sqlProvide);
                                    $resultProvide = $queryProvide->fetchAll();
                                ?>
                               <input type="text" name="product_provide" class="form-control" value="<?=$resultProvide[0]['name'];?>" readonly>
                            </div>
                             <div class="form-group">
                                <label>Image</label>
                                <p>Merci de resélectionné la photo lié au produit que vous êtes en train de modifié</p>
                                <input type='file' name='fileToUpload' id='fileToUpload' class="form-control" onchange="readURL(this);">
                                <img id="blah" src="#" alt="Votre image en prévisualisation ici" />
                            </div>
                            <input type="submit" value="Modifier le produit">
                      </form>

                    </div>
                </div>
               

            </div>
            </div>
         <!-- /. PAGE WRAPPER  -->
       
    <div class="footer">

        </div>
</body>
</html>
}else{
 header('Location:/admin');
	
<?php
}
?>