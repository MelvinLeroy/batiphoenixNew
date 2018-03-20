<?php
	include('../inc/test.pdo.php');
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>E-cologie Construction</title>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/index.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Kreon:700" rel="stylesheet">

</head>
<body>

<!-- ///// NAVBAR //// -->

	<div class="fullnavbar">
		<div id="firstnavbar">
			<div id="social" class="col-md-6">
				<p id="staytune">Restez informé :</p>
				<a href="">
					<img class="sociallink" src="../img/facebook.png">
				</a>
				<a href="">
					<img class="sociallink" src="../img/twitter.png">
				</a>
				<a href="">
					<img class="sociallink" src="../img/instagram.png">
				</a>
			</div>
			<?php
				if(empty($_SESSION['pseudo'])){
			?>
			<div id="login" class="col-md-6 text-right">
				<form action="../action/actionLogIn.php" method="post">
					<input class="logbar" type="email" name="mail" placeholder="Adresse e-mail">
					<input class="logbar" type="password" name="pass" placeholder="Mot de passe">
					<input id="connexion" type="submit" name="submit" value="Se connecter">
				</form>
			</div>
			<?php
		}else{
			?>
			<div id="login" class="col-md-6 text-right">
				<a href="">Voir le Profil</a>
				<a href="../action/action.logOut.php">Déconnexion</a>
			</div>
			<?php
		}
			 ?>
		</div>

		<div id="secondnavbar">
			<a href="../index.php"><img class="col-md-1" id="logo" src="../img/logo.jpg"></a>
			<ul id="listnavbar" class="col-md-9">
				<li class="line"></li>
				<a href="">
					<li id="home" class="itemnavbar">
						<img src="../img/home.png">
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

<!-- ///// SLIDESHOW //// -->

	<div class="centersite">
		<div id="slideshowspace">
			<div id="slideshow">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				  <ol class="carousel-indicators">
				    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
				  </ol>

				  <div class="carousel-inner" role="listbox">
				    <div class="item active">
				      <img class="slideimg" src="../img/slideshow/diapo1.jpg" alt="...">
				      <div class="carousel-caption">
				      </div>
				    </div>
				    <div class="item">
				      <img class="slideimg" src="../img/slideshow/diapo2.png" alt="...">
				      <div class="carousel-caption">
				      </div>
				    </div>
				    <div class="item">
				      <img class="slideimg" src="../img/slideshow/diapo3.jpg" alt="...">
				      <div class="carousel-caption">
				      </div>
				    </div>
				  </div>

				  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left fa fa-arrow-circle-o-left" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right fa fa-arrow-circle-o-right" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>
			</div>
		</div>
	</div>
  <!-- ///// INFOS SECTION //// -->

  	<div class="centersite">
  		<section id="infosection">
  				<div class="row">
  					<div class="col-md-12">
              <h1><center>Ajouter un Produit</center></h1>
                <form action="../action/action.addproduit.php" method="post" enctype="multipart/form-data">
                <p><input type="text" name="nom_produit" class="logbar" placeholder="Nom du Produit" required></p>
                <p><input type="text" name="stock" class="logbar" placeholder="Nombre de Pièce(s) Disponible" required></p>
                <p><textarea name="description" class="logbar textareaCustom" cols="22" rows="5" placeholder="Description du Produit" required></textarea></p>
                <p><input type="text" name="prix" class="logbar" placeholder="Prix">&nbsp;
                <select name="devise" class="logbar">
                  <option value="€">€</option>
                  <option value="$">$</option>
                  <option value="£">£</option>
                </select> /
                  <select name="unite" class="logbar">
                    <option value="u">u</option>
                    <option value="kg">kilo</option>
                    <option value="m²">m²</option>
                  </select>
                </p>
                <p><select name="categorie" class="logbar">
                  <option value="Panneaux solaires">Panneaux solaires</option>
                  <option value="Pompes à chaleur">Pompes à chaleur</option>
                  <option value="Chauffage">Chauffage</option>
                  <option value="Ventilation">Ventilation</option>
                  <option value="Sanitaire">Sanitaire</option>
                  <option value="Eclairage">Eclairage</option>
                </select>
              </p>
              <p>File to upload : <input type ="file" name ="image"></p>
              <p><input type="text" name="context" class="logbar" placeholder="Context de l'image">&nbsp;&nbsp;<i class="fa fa-exclamation-triangle fa-3x customAlign" aria-hidden="true"></i>&nbsp;&nbsp;Notez bien le context en minuscule avec des _ a la place des espaces, il servira a appeler l'image du produit.</p>
              <p><input type="submit" value="Ajouter un Produit !" class="logbar"></p>
                </form>
  						</div>
  					</div>
  				</div>
  		</section>
  	</div>
