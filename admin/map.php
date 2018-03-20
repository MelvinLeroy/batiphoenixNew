<?php
include('../inc/db.php');
include('function.php');
include('../action/geo.php');
include('../map.php');
libs();
$sqlVerif = 'SELECT * FROM users WHERE pseudo="'.$_SESSION['pseudo'].'"';
$queryVerif = $db->query($sqlVerif);
$resultVerif = $queryVerif->fetchAll();
if(!empty($_SESSION['pseudo']) && $resultVerif[0]['power_rank'] == '1'){
    Navbar_admin();
}else{
    Navbar_user();
}
if($resultVerif[0]['power_rank'] !== '1'){
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
                   		<div id="map" style="top: 213px;left: 165px;position: relative;overflow: hidden;width: 500px;"></div>
                    </div>
                </div>
                        <?php
                        }
                        ?>
                 
               

            </div>
            </div>
         <!-- /. PAGE WRAPPER  -->
       
    <div class="footer">

        </div>
</body>
</html>

    