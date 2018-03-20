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
				 | <a href="../action/action.logOut.php">Déconnexion</a>
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
                <form action="../action/action.signup.php" method="post">
                  <p><input type="text" name="nom" placeholder="Nom de Famille" class="logbar" required autofocus></p>
                  <p><input type="text" name="prenom" placeholder="Prénom" class="logbar" required></p>
                  <p><input type="mail" name="mail" placeholder="Adresse E-Mail" class="logbar" required></p>
                  <p>
                    <input type="text" name="numero_rue" placeholder="Numero de Rue" class="logbar" required>
                    <select class="logbar" name="qualification-lieu" required>
                      <option value="">Sélectionner une option</option>
                      <option value="Rue">Rue</option>
                      <option value="Boulevard"> Boulevard</option>
                      <option value="Place">Place</option>
                      <option value="Avenue">Avenue</option>
                      <option value="Lieux-Dit">Lieux-Dit</option>
                    </select>
                    <input type="text" name="nom_rue" placeholder="Nom de la rue" class="logbar" required>
                    <input type="text" name="zip" placeholder="Code Postal" class="logbar" required>
                    <input type="text" name="ville" placeholder="Ville" class="logbar" required>
                  </p>
                  <p><input type="text" name="telephone" placeholder="Numero de Telephone" class="logbar" required></p>
                  <p><input type="text" name="pseudo" placeholder="Pseudo" class="logbar" required></p>
                  <p><input type="password" name="pass" placeholder="Mot de Passe" class="logbar" required></p>
                  <input type="submit" value="S'inscrire !" class="logbar text-right">
                </form>
  						</div>
  					</div>
  				</div>
  		</section>
  	</div>
