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
    if($resultVerif[0]['nbr_chantier'] > 0){
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
                        <h2>Ajouter un produit</h2>

                    </div>
                </div>
                <!-- /. ROW  -->
                                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <form action="../action/addProduit.php" method="post" enctype='multipart/form-data'>
                            <div class="form-group">
                                <label>Nom du Produit</label>
                                <input class="form-control" name="product_name" required />
                            </div>
                            <div class="form-group">
                                <label>Description du Produit</label>
                                <input class="form-control" name="product_desc" required/>
                            </div>
                            <div class="form-group">
                                <label>Catégorie</label>
                                <select class="form-control" name="product_cat"required>
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
                                <input class="form-control" name="product_stock" required/>
                            </div>
                            <div class="form-group">
                                <label>Prix unitaire</label>
                                <input class="form-control" name="product_price" required/>
                            </div>
                            <div class="form-group">
                                <label>Dimensions</label>
                                <input class="form-control" name="product_dimensions" required/>
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
                                <input type="text" class="form-control" value="<?=$_SESSION['pseudo'];?>" name="product_provide" readonly>
                            <div class="form-group">
                                <label>Image</label>
                                <input type='file' name='fileToUpload' id='fileToUpload' class="form-control" onchange="readURL(this);">
                                <img id="blah" src="#" alt="Votre image en prévisualisation ici" />
                            </div>
                            <input type="submit" value="Enregistrer le produit">
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
<?php
            }else{
                echo "<div id='page-wrapper'><div id='page-inner'><div class='row'><center><h3 id='margeTop'>Vous n'avez pas de chantier, il vous est donc impossible d'ajouter des produit</h3></center></div></div></div>";
            }
        }else{
            header('Location:/admin');
        }
?>