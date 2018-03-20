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
    $sqlProvide = 'SELECT * FROM fournisseur WHERE id="'.$_GET['id'].'"';
    $queryProvide = $db->query($sqlProvide);
    $resultProvide = $queryProvide->fetchAll();
    $sqlMarker = 'SELECT * FROM markers WHERE name="'.$resultProvide[0]['name'].'"';
    $queryMarker = $db->query($sqlMarker);
    $resultMarker = $queryMarker->fetchAll();
?>
 
        <div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Modifier <?=$resultProvide[0]['name'];?></h2>
                        
                    </div>
                </div>
                <!-- /. ROW  -->
                                <div class="row">
                    <div class="col-lg-12 col-md-12">
                      <form action="../action/updateProviderAction.php" method="post">
                          <input type="hidden" name="id" value="<?=$resultProvide[0]['id'];?>">
                          <input type="hidden" name="name_markers" value="<?=$resultMarker[0]['name'];?>">
                          <div class="form-group">
                                <label>Nom du Fournisseur</label>
                                <input class="form-control" name="provide_name"  value="<?=$resultProvide[0]['name'];?>" required/>
                            </div>
                            <div class="form-group">
                                <label>Adresse du Fournisseur</label>
                                <input type="text" class="form-control" name="provide_adress" value="<?=$resultProvide[0]['adresse'];?>" required>
                            </div>
                            <div class="form-group">
                                <label>Afficher sur la map : </label>
                                <input type="radio" name="provide_geo" value="Oui"> Oui
                                <input type="radio" name="provide_geo" value="Non"> Non
                            </div>
                            
                            <input type="submit" value="Modifier le fournisseur">
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