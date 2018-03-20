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
    $sqlChantier = 'SELECT * FROM chantier WHERE 1';
    $queryChantier = $db->query($sqlChantier);
    $resultChantier = $queryChantier->fetchAll();
?>

        <div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Tous les Chantiers</h2>
						
                    </div>
                </div>
                <!-- /. ROW  -->
                                <div class="row">
                    <div class="col-lg-12 col-md-12"> <?php
                        if(count($resultChantier) === 0){
                            echo '<h3>Pas de chantiers</h3>';
                        }else{
                        ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom du chantier</th>
                                        <th>Adresse</th>
                                        <th>Entreprise</th>
                                        <th>Numéro du permis</th>
                                        <th>Status</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        for($i=0;$i<count($resultChantier);$i++){
                                            $sqlProvide = 'SELECT * FROM fournisseur WHERE id="'.$resultChantier[$i]['id_user_fk'].'"';
                                            $queryProvide = $db->query($sqlProvide);
                                            $resultProvide = $queryProvide->fetchAll();
                                            
                                    ?>
                                    <tr class="warning">
                                        <td><?=$resultChantier[$i]['id'];?></td>
                                        <td><?=$resultChantier[$i]['name'];?></td>
                                        <td><?=$resultChantier[$i]['adresse'];?></td>
                                        <td><?=$resultChantier[$i]['entreprise'];?></td>
                                        <td><?=$resultChantier[$i]['permis'];?></td>
                                        <td><?=$resultChantier[$i]['status'];?></td>
                                        
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
}else{
    header('Location:/admin');
    echo $resultVerif[0]['power_rank'];
}    

?>