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
        
        
        <link rel="stylesheet" type="text/css" href="css/sellform.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Ajouter un matériaux</title>
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
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    </head>

    <body>

        <?php
        // Générer les catégories de la BDD

        $sql_cat = 'SELECT * FROM categorie';
        $query_cat = $db->query($sql_cat);
        $result_cat = $query_cat->fetchAll();
        ?>

        <!-- ///// NAVBAR //// -->

        <?php include('header.php'); ?>

        <!-- /// FORM /// -->
        <div class="alert alert-danger col-md-10 col-md-offset-1" id="alert-message">
            <p>Tous les champs doivent être remplis :</p>
            <p class="error-line" id="error-photo"><br>    - Veuillez ajouter au moins une photo</p>
            <p class="error-line" id="error-name"><br>    - Veuillez spécifier le nom de votre matériau</p>
            <p class="error-line" id="error-cat"><br>    - Veuillez choisir une catégorie</p>
            <p class="error-line" id="error-origine"><br>    - Veuillez nous dire si le matériau est issus de surplus ou de déconstruction</p>
        </div>
        <form enctype="multipart/form-data" action="action/sell.action.php" method="post" class="form-horizontal  text-center">
            <div class="col-md-12" id="demandeenlevement">
                <p class="col-md-4 col-md-offset-4">Demande d'enlèvement de matériaux sur mon chantier</p>
            </div>
            <div id="sellform">
                <div id="column1" class="col-md-6"> 
                    <div id="triangle1"><p>1</p></div>
                    <p>photos & caractéristiques</p>
                    <div class="">
                        <div class="control-group">
                            <div class="col-md-12 controls">
                                <p class="col-md-12" id="chooseyourpics">Ajoutez vos photos</p>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label id="photo-container1" class="sellform-item add-photo-container">
                                            <input type="file" name="image1" id="image-input1" class="sellform-item image-form" accept=".jpg, .jpeg, .png" required>
                                            <img onload="onLoad()" id="preview1" class="preview-image" src="" alt="" />
                                            <img id="plus1" class="plus-add-photo" src="img/plus.png" alt="Ajouter une image">
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label id="photo-container2" class="sellform-item add-photo-container">
                                            <input type="file" name="image2" id="image-input2" class="sellform-item image-form" accept=".jpg, .jpeg, .png">
                                            <img onload="onLoad()" id="preview2" class="preview-image" src="" alt="" />
                                            <img id="plus2" class="plus-add-photo" src="img/plus.png" alt="Ajouter une image">

                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label id="photo-container3" class="sellform-item add-photo-container">
                                            <input type="file" name="image3" id="image-input3" class="sellform-item image-form" accept=".jpg, .jpeg, .png">
                                            <img onload="onLoad()" id="preview3" class="preview-image" src="" alt="" />
                                            <img id="plus3" class="plus-add-photo" src="img/plus.png" alt="Ajouter une image">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="col-md-12 controls">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label id="photo-container4" class="sellform-item add-photo-container">
                                            <input type="file" name="image4" id="image-input4" class="sellform-item image-form" accept=".jpg, .jpeg, .png">
                                            <img onload="onLoad()" id="preview4" class="preview-image" src="" alt="" />
                                            <img id="plus4" class="plus-add-photo" src="img/plus.png" alt="Ajouter une image">
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label id="photo-container5" class="sellform-item add-photo-container">
                                            <input type="file" name="image2" id="image-input5" class="sellform-item image-form" accept=".jpg, .jpeg, .png">
                                            <img onload="onLoad()" id="preview5" class="preview-image" src="" alt="" />
                                            <img id="plus5" class="plus-add-photo" src="img/plus.png" alt="Ajouter une image">

                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label id="photo-container6" class="sellform-item add-photo-container">
                                            <input type="file" name="image3" id="image-input6" class="sellform-item image-form" accept=".jpg, .jpeg, .png">
                                            <img onload="onLoad()" id="preview6" class="preview-image" src="" alt="" />
                                            <img id="plus6" class="plus-add-photo" src="img/plus.png" alt="Ajouter une image">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="picture1">
                        <div id="bordercolumn1"></div>    
                    </div>
                </div>
                <div id="column2" class="col-md-6">
                    <div id="triangle2"><p>2</p></div>
                    <p>modalités de récupération</p>
                    <div id="bordercolumn2"></div>
                    <div class="control-group">
                        <div class="col-md-12 controls">
                            <input placeholder="nom du matériau" type="text" name="name" id="name-input" class="sellform-item" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="col-md-12 controls">
                            <div id="select-arrow"></div>
                            <select size="1" name="categories" id="categorie-select" class="sellform-item col-md-12" required>
                                <option selected>Choisir une catégorie</option>
                                <?php
                                for ($i = 0; $i < count($result_cat); $i++) {
                                    ?>
                                    <option><?= $result_cat[$i]['name']; ?></option>
                                    <?php
                                }
                                ?>

                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="col-md-12 controls">
                            <ul class="radiodiv">
                                <div class="col-md-4 col-md-offset-2">
                                    <li id="surplusitem">
                                        <input type="radio" id="f-option" class="origine-input1 origine" name="origine" value="Surplus">
                                        <label for="f-option" id="surplus">Surplus</label>
                                        <div class="check"></div>
                                    </li>
                                </div>

                                <div class="col-md-4">
                                    <li id="demolitionitem">
                                        <input type="radio" id="s-option" name="origine" class="origine-input2 origine" value="Issus de déconstruction">
                                        <label for="s-option" id="demolition">Issus de déconstruction</label>

                                        <div class="check"><div class="inside"></div></div>
                                    </li>
                                </div>
                            </ul>
                        </div>
                    </div>
                    <div id="hidden-surplus">
                        <div class="control-group">
                            <div class="col-md-12 controls">
                                <div class="col-md-4 dimension">
                                    <input type="text" placeholder="Longueur (mm)" name="dimension1" id="dimension-input1" class="sellform-item  sellform-items-little dimension-input" required>
                                </div>
                                <div class="col-md-4 dimension">
                                    <input type="text" placeholder="Largeur (mm)" name="dimension2" id="dimension-input2" class="sellform-item sellform-items-little  dimension-input" required>
                                </div>
                                <div class="col-md-4 dimension">   
                                    <input type="text" placeholder="Hauteur (mm)" name="dimension3" id="dimension-input3" class="sellform-item sellform-items-little dimension-input" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="text" placeholder="Quantité totale" name="quantite" id="quantite-input1" class="sellform-item sellform-items-little col-md-4">
                            <select size="1" name="mesureStock" id="mesure-select-input1" class="sellform-item sellform-items-little" required>
                                <option selected value="m²">m²</option>
                                <option value="m³">m³</option>
                                <option value="ml">ml</option>
                                <option value="u">u</option>
                            </select>
                            <input type="text" placeholder="Prix de vente (HT €) par" name="prix" id="price-input1" class="sellform-item sellform-items-little col-md-4 col-md-offset-2">
                            <select size="1" name="mesurePrice" id="price-select-input1" class="sellform-item sellform-items-little" required>
                                <option selected value="m²">m²</option>
                                <option value="m³">m³</option>
                                <option value="ml">ml</option>
                                <option value="u">u</option>
                            </select>
                        </div>
                        <div class="control-group">
                            <div class="col-md-12 controls">
                                <textarea name="remarque" placeholder="Remarques supplémentaires : (ex : diamètre, couleur, matière et autres caractéristiques...)" id="remarques-input" class="sellform-item col-md-12 sellform-items-little"></textarea>
                            </div>
                        </div> 
                        <div class="control-group">
                            <div class="col-md-12">
                                <div class="col-md-2 downloadProductSheet" id="downloadProductSheetImage">
                                    <img src="img/ficheproduit.png">
                                </div>
                                <div class="col-md-4 downloadProductSheet" id="downloadProductSheetText">
                                    <button id="dlfiche" type="submit">Télécharger votre fiche produit</button>
                                </div>
                                <?php //if (isset($_SESSION['pseudo'])) { ?>
                                <div class="col-md-6">
                                    <div id="submit-arrow"></div>
                                    <input type="submit" name="Envoyer" value="Suivant" id="submit-input" class="sellform-item" onclick="validForm();">
                                </div>
                                <?php //} else { ?>
                                <!--                                   <div id="submit-arrow"></div>
                                                                    <input type="submit" data-toggle="modal" data-target="#signinmodal" name="Envoyer" value="Choisir date d'enlèvement" id="submit-input" class="sellform-item">-->
                                <?php //} ?>
                            </div>
                        </div>

                    </div>
                    <!--                <div id="hidden-demolition">
                                        <div class="control-group">
                                            <div class="col-md-12 controls">
                                                <input type="text" name="fabriquant" placeholder="Fabriquant" id="fabriquant-input2" class="sellform-item col-md-12 sellform-items-little" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <div class="col-md-12 controls">
                                                <input type="text" placeholder="Longueur" name="dimension1" id="dimension-input4" class="sellform-item  sellform-items-little dimension-input" required>
                                                <input type="text" placeholder="Largeur" name="dimension2" id="dimension-input5" class="sellform-item sellform-items-little  dimension-input" required>
                                                <input type="text" placeholder="Hauteur/Diametre" name="dimension3" id="dimension-input6" class="sellform-item sellform-items-little dimension-input" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 controls">
                                            <input type="text" placeholder="Quantité" name="quantite" id="quantite-input2" class="sellform-item sellform-items-little col-md-4" required>
                                            <select size="1" name="mesure" id="mesure-select-input2" class="sellform-item sellform-items-little">
                                                <option selected value="M²">M²</option>
                                                <option value="M³">M³</option>
                                                <option value="mL">mL</option>
                                                <option value="U">U</option>
                                            </select>
                                            <input type="text" placeholder="Prix de vente" name="prix" id="price-input2" class="sellform-item sellform-items-little col-md-4 col-md-offset-2" required>
                                            <p class="price-value">€</p>
                                            <div class="control-group">
                                                <div class="col-md-12">
                                                    <div id="submit-arrow"></div>
                                                    <input type="submit" name="Envoyer" value="Choisir date d'enlèvement" id="submit-input" class="sellform-item">
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
                </div>
            </div>    
        </form>
        <?php
        include("footer.php");
        ?>
    </body>


    <script type="text/javascript" src="js/sellForm.js"></script>
    <script type="text/javascript">

                                        function onLoad() {

                                            $(document).ready(function () {
                                                if ($('#preview1').attr('src') !== "") {
                                                    $("#plus1").css("display", "none");
                                                    $('#photo-container1').css("padding-bottom", "0");
                                                    $('#photo-container1').css("height", "177px");
                                                    $('#photo-container2').css("display", "block");
                                                }
                                                if ($('#preview2').attr('src') !== "") {
                                                    $("#plus2").css("display", "none");
                                                    $('#photo-container2').css("padding-bottom", "0");
                                                    $('#photo-container2').css("height", "177px");
                                                    $('#photo-container3').css("display", "block");
                                                }
                                                if ($('#preview3').attr('src') !== "") {
                                                    $("#plus3").css("display", "none");
                                                    $('#photo-container3').css("padding-bottom", "0");
                                                    $('#photo-container3').css("height", "177px");
                                                    $('#photo-container4').css("display", "block");
                                                }
                                                if ($('#preview4').attr('src') !== "") {
                                                    $("#plus4").css("display", "none");
                                                    $('#photo-container4').css("padding-bottom", "0");
                                                    $('#photo-container4').css("height", "177px");
                                                    $('#photo-container5').css("display", "block");
                                                }
                                                if ($('#preview5').attr('src') !== "") {
                                                    $("#plus5").css("display", "none");
                                                    $('#photo-container5').css("padding-bottom", "0");
                                                    $('#photo-container5').css("height", "177px");
                                                    $('#photo-container6').css("display", "block");
                                                }
                                                if ($('#preview6').attr('src') !== "") {
                                                    $("#plus6").css("display", "none");
                                                    $('#photo-container6').css("padding-bottom", "0");
                                                    $('#photo-container6').css("height", "177px");
                                                }
                                            });

                                        }

                                        function validForm() {

                                            $(document).ready(function () {

                                                if ($('#preview1').attr('src') == "") {
                                                    $('#error-photo').css("display", "inline");
                                                } else {
                                                    $('#error-photo').css("display", "none");
                                                }

                                                if ($('#name-input').val() === "") {
                                                    $('#error-name').css("display", "inline");
                                                } else {
                                                    $('#error-name').css("display", "none");
                                                }

                                                if ($('#categorie-select').val() === "Choisir une catégorie") {
                                                    $('#error-cat').css("display", "inline");
                                                } else {
                                                    $('#error-cat').css("display", "none");
                                                }

                                            });

                                        }

    </script> 
</html>