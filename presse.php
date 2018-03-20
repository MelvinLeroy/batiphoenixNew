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
        <title>À propos</title>
        <link rel="stylesheet" type="text/css" href="css/fonts.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="icon" type="image/png" href="img/logo.png"/>
        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/header.css">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">
        <link rel="stylesheet" type="text/css" href="css/modal.css">
        <link rel="stylesheet" type="text/css" href="css/presse.css">
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery-ui.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/index.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    </head>
    <body>
        <?php include('header.php'); ?>
        
        <div id="pushTop"></div>
        <div id="presseContainer" class="col-md-10 col-md-offset-1">
            <h1 id="presseTitle">Ils parlent de nous !</h1>
            <br>
            <p id="presseDescription" class="col-md-offset-2 col-md-8">Certains ont écrit que Batiphoenix est "un bon filon", d'autres sont venus nous rencontrer lors d'évènements, d'autres nous ont
            interviewés pour en savoir plus sur notre concept et les valeurs de ce projet. Nous avons donc décidé de dédier une page à ces journalistes et à nos
            partenaires qui participent au développement de Batiphoenix.</p>
            <div class="ilsparlentdenous">
                <div class="row">
                    <div class="col-md-3"><a target="_blank" href="http://lirelactu.fr/source/challenges/64005435-b931-4ea0-9696-097be22702c5"><img class="citation-img" src="img/challenges-logo.png"></a></div>
                    <div class="col-md-3"><a target="_blank" href="http://www.enseignementsup-recherche.gouv.fr/cid122529/4e-edition-du-prix-pepite-tremplin-pour-l-entrepreneuriat-etudiant-53-laureats-nationaux-dont-3-grands-prix-et-150-nomines-regionaux.html"><img class="citation-img" src="img/ministere-logo.png"></a></div>
                    <div class="col-md-3"><a target="_blank" href="http://www.lefigaro.fr/decideurs/2017/11/20/33001-20171120ARTFIG00126-le-roch-les-mousquetaires-et-hec-entrepreneurs-priment-les-start-up.php"><img class="citation-img" src="img/figaro-logo.png"></a></div>
                    <div class="col-md-3"><a target="_blank" href="http://www.elle.fr/Societe/Le-travail/Faire-bouger-les-choses/Lucile-Hamon-la-startuppeuse-qui-veut-construire-le-batiment-de-demain-3580991"><img class="citation-img" src="img/elle-logo.png"></a></div>
                </div>
                <div class="row">
                    <div class="col-md-3"><a target="_blank" href="http://www.novethic.fr/empreinte-terre/dechets/isr-rse/ces-start-ups-qui-changent-le-monde-batiphoenix-le-tinder-des-dechets-du-btp-145038.html"><img class="citation-img" src="img/novethic-logo.png"></a></div>
                    <div class="col-md-3"><a target="_blank" href="http://nouvelentrepreneur.fr/actualite-entreprise/lucile-hamon-ce-prix-nous-donne-confiance-17112017"><img class="citation-img" src="img/nouvel-entrepreneur-logo.png"></a></div>
                    <div class="col-md-3"><a target="_blank" href="https://start.lesechos.fr/entreprendre/actu-startup/les-etudiants-entrepreneurs-les-plus-prometteurs-de-france-sont-10179.php"><img class="citation-img" src="img/les-echos-start-logo.png"></a></div>
                    <div class="col-md-3"><a target="_blank" href="http://www.leparisien.fr/economie/business/le-bon-filon-des-materiaux-de-construction-recycles-27-11-2017-7417080.php"><img class="citation-img" src="img/Le-Parisien-logo.png"></a></div>
                </div>
                <div class="row">
                    <div class="col-md-3"><a target="_blank" href="https://www.lsa-conso.fr/decouvrez-le-palmares-2017-du-concours-coup-de-pouce-de-la-fondation-le-roch-les-mousquetaires,272192"><img class="citation-img" src="img/lsa-logo.png"></a></div>
                    <div class="col-md-3"><a target="_blank" href="http://www.media-paris-saclay.fr/seconde-chance-pour-les-dechets-de-chantier-rencontre-avec-lucile-hamon-et-kesia-vasconcelos/"><img class="citation-img" src="img/saclay-logo.png"></a></div>
                    <div class="col-md-3"><a target="_blank" href="http://www.etudiant.gouv.fr/pid33626-cid122629/decouvrez-les-laureats-du-prix-pepite-et-leurs-projets-innovants.html"><img class="citation-img" src="img/etudiant-logo.png"></a></div>
                    <div class="col-md-3"><a target="_blank" href="https://www.businessimmo.com/contents/88503/la-start-up-batiphoenix-signe-sa-premiere-transaction"><img class="citation-img" src="img/businessimmo-logo.jpg"></a></div>
                </div>
                <div class="row">
                    <div class="col-md-3"><a target="_blank" href="https://tokster.com/article/valoriser-70-des-dechets-du-batiment-dici-2020-cest-possible-avec-batiphoenix"><img class="citation-img" src="img/tokster-logo.png"></a></div>
                    <div class="col-md-3"><a target="_blank" href="http://1001startups.fr/40-startups-a-suivre-en-2018/"><img class="citation-img" src="img/top40_1.png"></a></div>
                </div>
            </div>
        </div>
        
        <!-- ///// FOOTER //// -->

            <?php include('footer.php'); ?>
    
    </body>
    