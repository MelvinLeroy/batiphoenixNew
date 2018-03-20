<?php
include('inc/db.php');
?>

<!DOCTYPE html>
<html>
    <head>
                
        
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-111067348-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-111067348-1');
        </script>
        
        
        <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Contact</title>
        <link rel="stylesheet" type="text/css" href="css/confirmation.css">
        <link rel="stylesheet" type="text/css" href="css/fonts.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="icon" type="image/png" href="img/logo.png"/>
        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/header.css">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">
        <link rel="stylesheet" type="text/css" href="css/modal.css">
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery-ui.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/index.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    </head>
    <body>
        <?php include('header.php'); ?>
        <div id="confirmationContainer">
            <p>Votre inscription à bien été prise en compte ! Un de nos conseillers va très prochainement vous contacter pour vous informer sur le fonctionnement de la plateforme. Nous vous remercions pour votre confiance </p>
            <br> 
            <a href="index.php">Revenir au site</a>
        </div>
    </body>
</html>
