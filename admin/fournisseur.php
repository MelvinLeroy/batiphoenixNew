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

	$sqlProvide = 'SELECT * FROM fournisseur WHERE 1';
	$queryProvide = $db->query($sqlProvide);
	$resultProvide = $queryProvide->fetchAll();
?>
 
        <div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Tous les fournisseurs</h2>

                    </div>
                </div>
                                                <div class="row">
                    <div class="col-lg-12 col-md-12"> <?php
                        if(count($resultProvide) === 0){
                            echo '<h3>Pas de Fournisseur</h3>';
                        }else{
                        ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom du Fournisseur</th>
                                        <th>Adresse</th>
                                        <th>Géolocalisé</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        for($i=0;$i<count($resultProvide);$i++){
                                            
                                    ?>
                                    <tr class="warning">
                                        <td><?=$resultProvide[$i]['id'];?></td>
                                        <td><a href="updateProvider.php?id=<?=$resultProvide[$i]['id'];?>"><?=$resultProvide[$i]['name'];?></a></td>
                                        <td><?=$resultProvide[$i]['adresse'];?></td>
                                        <td><?=$resultProvide[$i]['map'];?></td>
                                        <?php
                                        if($resultProvide[$i]['map'] == 'Oui'){
                                            ?>
                                            <td><a href="../indexMap.php" target="__blank">Voir sur la Map</a></td>
                                            <?php
                                        }else{
                                            ?>
                                            <td>Map indisponible</td>
                                            <?php
                                        }
                                        ?>
                                        
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
<?php

}
?>