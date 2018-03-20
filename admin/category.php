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


    $sqlCat = 'SELECT * FROM categorie WHERE 1';
    $queryCat = $db->query($sqlCat);
    $resultCat = $queryCat->fetchAll();
?>
 
        <div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Catégorie</h2>

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-lg-6 col-md-6"> 
                        <?php
                        if(count($resultCat) == 0){
                            echo '<h3>Aucune catégorie</h3>';
                        }else{
                        ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom de la catégorie</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        for($i=0;$i<count($resultCat);$i++){
                                    ?>
                                    <tr class="warning">
                                        <td><?=$resultCat[$i]['id'];?></td>
                                        <td><?=$resultCat[$i]['name'];?></td>
                                        <td><?=$resultCat[$i]['description'];?></td>
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
                               <div class="row">
                    <div class="col-lg-6 col-md-6"> 
                            <form action="../action/actionCat.php" method="post">
                               <div class="form-group">
                            <label>Nom de la catégorie</label>
                            <input class="form-control" name="cat_name" />
                            
                        </div>
                        <div class="form-group">
                            <label>Description de la catégorie</label>
                            <textarea style="resize: none;" class="form-control" name="cat_desc"></textarea> 
                        </div>
                        <input type="submit" value="Ajouter la catégorie">
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

    header('Location:/admin');

}
?>