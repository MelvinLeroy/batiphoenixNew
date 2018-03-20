<?php
include('inc/db.php');
include('inc/panier.class.php');
$panier = new Panier();
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/sellConfirmationTemporary.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Merci !</title>
        <link rel="stylesheet" type="text/css" href="css/fonts.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="icon" type="image/png" href="img/logo.png"/>
        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/header.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">
        <link rel="stylesheet" type="text/css" href="css/modal.css">
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery-ui.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/index.js"></script>
        <title>Vendre un article</title>
    </head>
    
    <body>
        
        <!--  --- NAVBAR --- -->
            
        <?php include('header.php'); ?>
        
        <!-- --- CONTENT --- -->
						
        <div id="messageContainer">
            <p>Merci pour votre confiance ! <br>
            Nous avons bien reçu votre annonce, celle-ci est en cours d'examen par notre équipe.<br> 
            Merci de bien vouloir inscrire vos coordonnées ci-dessous afin que notre équipe puisse rapidement vous contacter.<br> 
            A très bientôt :) </p>
            <br> 
            <form action="action/action.sellConfirmationTemporary.php" method="post">
                <div class="row">
                    <label>Nom</label>
                    <input type="text" name="nom" id="mailInput" required>
                </div>
                <div class="row">
                    <label>Prénom</label>
                    <input type="text" name="prenom" id="mailInput" required>
                </div>
                <div class="row">
                    <label>E-mail</label>
                    <input type="email" name="mail" id="mailInput" required>
                <div class="row">
                    <label>Téléphone</label>
                    <input type="text" name="telephone" id="mailInput" required>
                </div>
                <input type="submit">
            </form>
        </div>
        
    </body>
	
	