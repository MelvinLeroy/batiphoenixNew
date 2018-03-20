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
    
$sqlUnread = 'SELECT * FROM commandes WHERE status="unread"';
$queryUnread = $db->query($sqlUnread);
$resultUnread = $queryUnread->fetchAll();
$countUnread = count($resultUnread);

$sqlRead = 'SELECT * FROM commandes WHERE status="read"';
$queryRead = $db->query($sqlRead);
$resultRead = $queryRead->fetchAll();
$countRead = count($resultRead);

?>
        <div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Devis en attente</h2>

                    </div>
                </div>
                <!-- /. ROW  -->
                
                <div class="row">
                    <div class="col-lg-12 col-md-12"> <?php
                        if($countUnread === 0){
                            echo '<h3>Pas de devis en attente</h3>';
                        }else{
                        ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Appartient à</th>
                                        <th>Numero du devis</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        for($i=0;$i<$countUnread;$i++){
                                            $sqlUser = 'SELECT * FROM users WHERE id="'.$resultUnread[$i]['id_user_fk'].'"';
                                            $queryUser = $db->query($sqlUser);
                                            $resultUser = $queryUser->fetchAll();
                                    ?>
                                    <tr class="warning">
                                        <td><?=$resultUnread[$i]['id'];?></td>
                                        <td><?=$resultUser[0]['pseudo'];?></td>
                                        <td><a href="showDevis.php?id=<?=$resultUnread[$i]['id'];?>"><?=$resultUnread[$i]['num_commande'];?></a></td>
                                        <td><?=$resultUnread[$i]['status'];?></td>
                                        <td><a href="../action/actionDevis.php?id=<?=$resultUnread[$i]['id'];?>">Valider le devis</a></td>
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
                <hr>
                 <div class="row">
                    <div class="col-md-12">
                        <h2>Devis validés</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                    <?php
                        if($countRead === 0){
                            echo '<h3>Pas d\'historique de devis validés</h3>';
                        }else{
                    ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 72px;">#</th>
                                        <th style="width: 312px;">Appartient à</th>
                                        <th style="width: 526px;">Numero du devis</th>
                                        <th style="width: 201px;">Status</th>
                                        <th style="width: 372px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        for($i=0;$i<$countRead;$i++){
                                            $sqlUser = 'SELECT * FROM users WHERE id="'.$resultRead[$i]['id_user_fk'].'"';
                                            $queryUser = $db->query($sqlUser);
                                            $resultUser = $queryUser->fetchAll();
                                    ?>
                                    <tr class="warning">
                                        <td><?=$resultRead[$i]['id'];?></td>
                                        <td><?=$resultUser[0]['pseudo'];?></td>
                                        <td><?=$resultRead[$i]['num_commande'];?></td>
                                        <td><?=$resultRead[$i]['status'];?></td>
                                        <td><a href="showDevis.php?id=<?=$resultRead[$i]['id'];?>">Voir le devis</a></td>
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
                <!-- /. ROW  -->
                <!-- /. ROW  -->

                <!-- /. ROW  -->

            </div>
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer">

        </div>
</body>
</html>
<?php
    
}else{
    header('Location:/admin');
}
?>