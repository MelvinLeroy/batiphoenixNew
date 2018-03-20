<?php
	include('inc/db.php');
	include('inc/panier.class.php');
  $tabId = array();
	$panier = new Panier();
  if(isset($_GET['del'])){
    $panier->del($_GET['del']);
  }
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>E-cologie Construction</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Kreon:700" rel="stylesheet">

</head>
<body>

<!-- ///// NAVBAR //// -->
	<div class="fullnavbar">
		<div id="firstnavbar">
      <?php

      if(!empty($_SESSION['pseudo'])){
      $sqlPower = 'SELECT * FROM users WHERE pseudo="'.$_SESSION['pseudo'].'"';
    	$queryPower = $db->query($sqlPower);
			$resultPower=$queryPower->fetchAll();
      if($resultPower[0]['power_rank'] == "1"){?>
        <div id="social" class="col-md-6">
          <p id="staytune">Restez informé :</p>
          <a href="">
            <img class="sociallink" src="img/facebook.png">
          </a>
          <a href="">
            <img class="sociallink" src="img/twitter.png">
          </a>
          <a href="">
            <img class="sociallink" src="img/instagram.png">
          </a>
          <a href="forms/form.addproduit.php">
            <i class="fa fa-plus sociallink fa-4x customClass" aria-hidden="true"></i>
          </a>
        </div>
        <?php
      }else{
        ?>
          <div id="social" class="col-md-6">
            <p id="staytune">Restez informé :</p>
            <a href="">
              <img class="sociallink" src="img/facebook.png">
            </a>
            <a href="">
              <img class="sociallink" src="img/twitter.png">
            </a>
            <a href="">
              <img class="sociallink" src="img/instagram.png">
            </a>
          </div>
          <?php
      }
    }else{
      ?>
        <div id="social" class="col-md-6">
          <p id="staytune">Restez informé :</p>
          <a href="">
            <img class="sociallink" src="img/facebook.png">
          </a>
          <a href="">
            <img class="sociallink" src="img/twitter.png">
          </a>
          <a href="">
            <img class="sociallink" src="img/instagram.png">
          </a>
        </div>
        <?php
    }
       ?>

			<?php
				if(empty($_SESSION['pseudo'])){
			?>
			<div id="login" class="col-md-6 text-right">
				<form action="action/actionLogIn.php" method="post">
					<input class="logbar" type="email" name="mail" placeholder="Adresse e-mail">
					<input class="logbar" type="password" name="pass" placeholder="Mot de passe">
					<input id="connexion" type="submit" name="submit" value="Se connecter">
					<a href="forms/form.signup.php"><button type="button" id="signup">S'enregistrer</button></a>
				</form>
			</div>
			<?php
		}else{
			?>
			<div id="login" class="col-md-6 text-right">
				<a href="" class="logbar">Voir le Profil</a>
				<a href="action/action.logOut.php" class="logbar">Déconnexion</a>
			</div>
			<?php
		}
			 ?>
		</div>

		<div id="secondnavbar">
			<a href="index.php"><img class="col-md-1" id="logo" src="img/logo.jpg"></a>
			<ul id="listnavbar" class="col-md-9">
				<li class="line"></li>
				<a href="">
					<li id="home" class="itemnavbar">
						<img src="img/home.png">
					</li>
				</a>
				<li class="line"></li>
					<li class="itemnavbarone">équipements
						<ul class="undermenuone">
							<a href=""><li class="undermenuitemone">Panneaux solaires</li></a>
							<a href=""><li class="undermenuitemone">Pompes à chaleur</li></a>
							<a href=""><li class="undermenuitemone">Chauffage</li></a>
							<a href=""><li class="undermenuitemone">Ventilation</li></a>
							<a href=""><li class="undermenuitemone">Sanitaire</li></a>
							<a href=""><li class="undermenuitemone">Eclairage</li></a>
						</ul>
					</li>
				<li class="line"></li>
				<a href="">
					<li class="itemnavbartwo">matériaux
					<!-- 	<ul class="undermenutwo">
							<a href=""><li class="undermenuitemtwo">Isolation</li></a>
							<a href=""><li class="undermenuitemtwo">Etanchéité</li></a>
							<a href=""><li class="undermenuitemtwo">Façade</li></a>
							<a href=""><li class="undermenuitemtwo">Menuiseries</li></a>
							<a href=""><li class="undermenuitemtwo">Finitions</li></a>
						</ul> -->
					</li>
				</a>
				<li class="line"></li>
				<a href="">
					<li class="itemnavbar">qui sommes-nous ?</li>
				</a>
				<li class="line"></li>
				<a href="">
					<li class="itemnavbar"> contact</li>
				</a>
				<li class="line"></li>
				<li class="itemnavbar">
					<form action="" method="post" id="test">
						<i id="searchicon"  class="fa fa-search" aria-hidden="true"></i>
						<input id="search" type="text" name="search" placeholder="Rechercher">
					</form>
				</li>
			</ul>
		</div>
	</div>

  <!-- ///// BEST SELLERS //// -->

  		<div class="centersite">
        <h1><center>Votre Panier</center></h1>
  			<section id="bestsellers">
  				<div class="row">
  					<div id="bestsellerstitle" class="col-md-10 col-md-offset-1">
  						<p id="ourbestsellers" class="text-center">Votre Panier</p>
  					</div>
  				</div>
  				<div class="row">
  					<div class="bestarticles col-md-12 text-center">
                <table border='1'>
                  <thead>
                    <tr>
											<td>Image</td>
                      <td>Nom du Produit</td>
                      <td>Prix</td>
                      <td>Quantité</td>
                      <td>Prix avec TVA</td>
											<td>Sous-Total H.T.</td>
											<td>Sous-Total</td>
                      <td>Actions</td>
                    </tr>
                  </thead>
                  <tbody>
    						<!-- ///// Template Produit //// -->
                <?php
                  $ids = array_keys($_SESSION['panier']);
                  if(empty($ids)){
                    $resultPanier = array();
                  }else{
                    $sqlPanier = 'SELECT * FROM produit WHERE idProduit IN('.implode(',',$ids).')';
                    $queryPanier = $db->query($sqlPanier);
                    $resultPanier = $queryPanier->fetchAll();
                  }
                  for($x = 0; $x <count($resultPanier);$x++){
                ?>
                <tr>
									<td><img src="<?= $resultPanier[$x]['picture'];?>" height="53"></td>
                  <td><?= $resultPanier[$x]['nom_du_produit'];?></td>
                  <td><?= $resultPanier[$x]['prix'].' €';?></td>
                  <td><?= $_SESSION['panier'][$resultPanier[$x]['idProduit']];?></td>
                  <?php $tabId[] = $resultPanier[$x]['idProduit'].'('.$_SESSION['panier'][$resultPanier[$x]['idProduit']].')';?>
                  <?php $prix_tva = $resultPanier[$x]['prix'] * 1.196;?>
                  <td><?= $prix_tva.' €';?></td>
									<?php $stht = $resultPanier[$x]['prix'] * $_SESSION['panier'][$resultPanier[$x]['idProduit']];?>
									<td><?= $stht.' €';?></td>
									<?php $st = $prix_tva * $_SESSION['panier'][$resultPanier[$x]['idProduit']];?>
									<td><?= $st.' €';?></td>
                  <td><a href="panier.php?del=<?= $resultPanier[$x]['idProduit'];?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                </tr>
                <?php

                  }
                  ?>
                </tbody>
                </table>
								<p><h3>Total H.T. : <center><?php echo $panier->totalHT();?> </center></h3></p>
								<p><h3>Total : <center><?php echo $panier->total();?> </center></h3></p>
  					</div>
            <?php
             if(count($_SESSION['panier']) !== 0){
            ?>
            <form action='action/addCommands.php' method="POST">
              <button>Payer</button>
              <input type="hidden" value="<?= implode(',',$tabId);?>" name="product_id">
            </form>
            <?php }?>
  				</div>
  			</div>
  			</section>
  		</div>
    </div>

  <!-- ///// PARTNERS //// -->

  	<div class="centersite">
  		<div class="col-md-12" id="partners">
  			<div class="col-md-2 col-md-offset-2">
  				<p id="theytrustus">Ils nous font confiance :</p>
  			</div>
  			<div class="col-md-1">
  				<img class="partnersitem" id="quarantedeux" src="img/partners/42.jpg">
  			</div>
  			<div class="col-md-1">
  				<img class="partnersitem" id="hec" src="img/partners/HEC.jpg">
  			</div>
  			<div class="col-md-1">
  				<img class="partnersitem" id="nebia" src="img/partners/nebia.png">
  			</div>
  			<div class="col-md-1">
  				<img class="partnersitem" id="paris" src="img/partners/paris.jpg">
  			</div>
  			<div class="col-md-1">
  				<img class="partnersitem" id="vinci" src="img/partners/vinci.png">
  			</div>
  		</div>
  	</div>

  </body>
  </html>
