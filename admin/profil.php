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

$sqlUser = 'SELECT * FROM users WHERE id="'.$_GET['id'].'"';
$queryUser = $db->query($sqlUser);
$resultUser = $queryUser->fetchAll();

?>
 
        <div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Profil de <?=$resultUser[0]['pseudo'];?></h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                      <form action="../action/updateUserAction.php" method="post">
                            <input type="hidden" name="id" value="<?=$resultUser[0]['id'];?>">
                            <div class="form-group">
                                <label>Nom</label>
                                <input class="form-control" name="user_nom"  value="<?=$resultUser[0]['nom'];?>" required/>
                            </div>
                            <div class="form-group">
                                <label>Prénom</label>
                                <input class="form-control" name="user_prenom"  value="<?=$resultUser[0]['prenom'];?>" required/>
                            </div>
                            <div class="form-group">
                                <label>Adresse Postale</label>
                                <input class="form-control" name="user_address"  value="<?=$resultUser[0]['adresse'];?>" required/>
                            </div>
                            <div class="form-group">
                                <label>Téléphone</label>
                                +33<input class="form-control" name="user_phone"  value="0<?=$resultUser[0]['telephone'];?>" required/>
                            </div>
                            <div class="form-group">
                                <label>Pseudo</label>
                                <input class="form-control" name="user_pseudo"  value="<?=$resultUser[0]['pseudo'];?>" required/>
                            </div>
                            <div class="form-group">
                                <label>Couleur de l'admin</label>
                                Color: <input class="jscolor form-control" name="user_color" value="#<?=$resultUser[0]['color'];?>">
                            </div>
                            <input type="submit" value="Modifier le Profil">
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
