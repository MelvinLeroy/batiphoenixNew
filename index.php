<?php
include('inc/db.php');
include('inc/panier.class.php');
$panier = new Panier();
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
        <title>Batiphoenix</title>
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
        <script type="text/javascript">
            
            function upperDevice(num){
		$("#spanDevice"+num).css("transition-duration", "0.5s");
		$("#spanDevice"+num).css("top", "-16px");
		$("#spanDevice"+num).css("font-size", "12px");
            }
            
            function returnHomePage() {
                document.location.href="https://www.batiphoenix.com";
            }
            
        </script>

        <!-- ///// HEADER ///// -->

        <?php include('header.php'); ?>

        <!-- ///// I HAVE / I NEED ///// -->
        <div id="onComputerIndex">
            <section id="secondsection">
                <div id="buttonzone">
                    <div class="row">
                        <div class="col-md-12" id="space">
                            <div id="phrasedaccroche">
                                <p id="batissons">
                                    Bâtissons le monde de demain grâce au réemploi des matériaux
                                </p>
                                <p id="batiandcare">
                                    BATIPHOENIX VOUS MET EN RELATION
                                </p>
                            </div>
                            <?php
                            if (isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])) {
                                ?>
                                <div class="col-md-6 ihaveineed" id="ihave">
                                    <div class="circleihaveineed">
                                        <a href="sellForm.php" >
                                            <p id="jevends">JE VENDS</p>
                                            <p class="materiaux">des matériaux</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6 ihaveineed" id="ineed">
                                    <div class="circleihaveineed">
                                        <a href="materiautheque.php">
                                            <p id="jecherche">JE CHERCHE</p>
                                            <p class="materiaux">des matériaux</p>
                                        </a>
                                    </div>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="col-md-6 ihaveineed" id="ihave">
                                    <div class="circleihaveineed">
                                        <a href="sellForm.php" >
                                            <p id="jevends">JE VENDS</p>
                                            <p class="materiaux">des matériaux</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6 ihaveineed" id="ineed">
                                    <div class="circleihaveineed">
                                        <a href="materiautheque.php">
                                            <p id="jecherche">JE CHERCHE</p>
                                            <p class="materiaux">des matériaux</p>
                                        </a>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>	
                    </div>
                </div>
            </section>

            <!-- ///// WHY BATIPHOENIX ? ///// -->

            <section id="thirdsection">
                <p id="whybatiphonix">pourquoi utiliser batiphoenix  ?</p>
                <p id="answer">première marketplace consacrée au réemploi des matériaux de construction, Batiphoenix accompagne les acteurs du bâtiment dans ce virage écologique.</p>
                <iframe width="640" height="360" src="https://www.youtube.com/embed/11e_UBxSBjI" frameborder="0" allowfullscreen></iframe>
            </section>

            <!--- ///// BUSINESS ?  ARTISTIC ? ///// -->

            <section id="fourthsection">
                <img id="fourthsectionimage" src="img/image1.png">
                <button type="button" id="signupfree" data-toggle="modal" data-target="#signupmodal">S'inscrire Gratuitement</button>
            </section>

            <!--- ///// REUSE MATERIALS ///// -->

            <section id="fifthsection">
                <img id="fifthsectionimage"  src="img/image2.png">
                <button type="button" id="signupfree" data-toggle="modal" data-target="#signupmodal">S'inscrire Gratuitement</button>
            </section>

            <!-- ///// FOOTER //// -->

            <?php include('footer.php'); ?>
        </div>
        
        
        
<!-- RESPONSIVE MODE -->
        
        
        <div id="onDeviceIndex">
            <div id="landingPageDevice">
                <img src="img/fond-landingpage.png">
                <p>la marketplace b2b du <span>réemploi</span> de matériaux de construction</p>
                <p>Batiphoenix facilite l'intégration du réemploi dans vos projets</p>
            </div>
            <div class="goToForm">▼</div>
            <div id="formDevice">
                <form method="post" action="action/action.signup.device.php" class="signform" id="SignUpFormDevice" onSubmit="returnHomePage()">
                    <div class="row signupformlines signupformlinesDevice">
                        <div class="col-md-6 itemFormDevice">
                            <span id="spanDevice1" class="spanItemFormDevice">Prénom</span>
                            <input type="text" name="prenom" class="signupformitems signupformitemsDevice" required id="item1" onblur="checkDevice(this.value, 1)" onclick="upperDevice(1)"  required>
                        </div>
                        <div class="col-md-6 itemFormDevice">
                            <span id="spanDevice2" class="spanItemFormDevice">Nom de Famille</span>
                            <input type="text" name="nom" class="signupformitems signupformitemsDevice" id="item2" required onblur="checkDevice(this.value, 2)" onclick="upperDevice(2)"  required>
                        </div>
                    </div>
                    <div class="row signupformlines signupformlinesDevice">
                        <div class="col-md-6 itemFormDevice">
                            <span id="spanDevice3" class="spanItemFormDevice">Société</span>
                            <input type="text" name="societe" class="signupformitems signupformitemsDevice" id="item3" required onblur="checkDevice(this.value, 3)" onclick="upperDevice(3)"  required>
                        </div>
                        <div class="col-md-6 itemFormDevice">
                            <span id="spanDevice4" class="spanItemFormDevice">Fonction</span>
                            <input type="text" name="fonction" class="signupformitems signupformitemsDevice" id="item4" required onblur="checkDevice(this.value, 4)" onclick="upperDevice(4)"  required>
                        </div>
                    </div>
                    <div class="row signupformlines signupformlinesDevice">
                        <div class="col-md-6 itemFormDevice">
                            <span id="spanDevice5" class="spanItemFormDevice">Adresse E-Mail</span>
                            <input type="email" name="mail" class="signupformitems signupformitemsDevice" id="item5" required onblur="checkDevice(this.value, 5)" onclick="upperDevice(5)"  required>
                        </div>
                        <div class="col-md-6 itemFormDevice">
                            <span id="spanDevice6" class="spanItemFormDevice">Numéro de Téléphone</span>
                            <input type="text" name="telephone" class="signupformitems signupformitemsDevice" id="item6" required onblur="checkDevice(this.value, 6)" onclick="upperDevice(6)"  required>
                        </div>
                    </div>
                    <div class="row signupformlines signupformlinesDevice">
                        <div class="col-md-6 itemFormDevice">
                            <span id="spanDevice7" class="spanItemFormDevice">Mot de Passe</span>
                            <input type="password" name="pass" class="signupformitems signupformitemsDevice" id="item7" required onblur="checkDevice(this.value, 7)" onclick="upperDevice(7)"  required>
                        </div>
                        <div class="col-md-6 itemFormDevice">
                            <span id="spanDevice8" class="spanItemFormDevice">Confirmation</span>
                            <input type="password" name="confirmpass" class="signupformitems signupformitemsDevice" id="item8" required onblur="checkDevice(this.value, 8)" onclick="upperDevice(8)"  required>
                        </div>
                    </div>
                    <div class="row signupformlines">
                        <div class="col-md-12">
                            <input id="checkboxcguDevice" type="checkbox" name="checkbox">
                            <label for="checkboxcguDevice">J'accepte les <a href="cgu.php">Conditions Générales d'Utilisation</a></label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <input type="submit"  class="btn btn-default" id="signupbutton" data-dismiss="modal">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>