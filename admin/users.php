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
if($resultVerif[0]['power_rank'] !== '10'){
    header('Location:/admin');
}else{

	$sqlUser = 'SELECT * FROM users WHERE 1';
	$queryUser = $db->query($sqlUser);
	$resultUser = $queryUser->fetchAll();
?>
 
        <div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Tous les utilisateurs</h2>

                    </div>
                </div>
                <!-- /. ROW  -->
                                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Adresse Email</th>
                                        <th>Adresse Postale</th>
                                        <th>Téléphone</th>
                                        <th>Pseudo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        for($i=0;$i<count($resultUser);$i++){
                                         
                                    ?>
                                    <tr class="warning">
                                        <td><?=$resultUser[$i]['id'];?></td>
                                        <td><?=$resultUser[$i]['nom'];?></td>
                                        <td><?=$resultUser[$i]['prenom'];?></td>
                                        <td><?=$resultUser[$i]['mail'];?></td>
                                        <td><?=$resultUser[$i]['adresse'];?></td>
                                        <td>+33 <?=$resultUser[$i]['telephone'];?></td>
                                        <td><?=$resultUser[$i]['pseudo'];?></td>
                                    </tr>
                                   <?php
                                   }
                                   ?>

                                </tbody>
                            </table>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
               

            </div>
            </div>
         <!-- /. PAGE WRAPPER  -->
       
    <div class="footer">

        </div>
</body>
</html>
