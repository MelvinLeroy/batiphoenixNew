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
        <link rel="stylesheet" type="text/css" href="css/matheriautheque.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">
        <link rel="stylesheet" type="text/css" href="css/modal.css">
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/masonry.js"></script>
        <script type="text/javascript" src="js/jquery-ui.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <body>

        <!-- ///// NAVBAR //// -->

        <?php include('header.php'); ?>

        <!-- ///// SIDEBAR ///// -->
        <div id="pagetitle">
            <p>MATÉRIAUTHÈQUE</p>
        </div>
        <div class="row">
            <div class="col-md-2" id="sidebar">
                <div class="row">
                    <div class="col-md-12" id="checkboxes">
                        <div id="filterstitle">
                            <p>CATÉGORIES</p>
                        </div>
                        <?php
                        //Génération des checkBoxs de filtre
                        $sql = 'SELECT * FROM categorie';
                        $query = $db->query($sql);
                        $result = $query->fetchAll();
                        echo '<div id="filters"><input type="checkbox" onclick="window.location.reload()"  class="categorie_filters"><label class="categorie_name"> Tous</label><br>';
                        for ($i = 0; $i < count($result); $i++) {
                            ?>
                            <input type="checkbox" class="categorie_filters" name="categorie" value="<?= $result[$i]['id']; ?>" onclick="filters()">
                            <label class="categorie_name"><?= $result[$i]['name']; ?></label><br>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" id="map">

                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="filters_resuls">
                <div class="grid">
                <?php
                $sqlstatus = 'SELECT * FROM produit WHERE status_item="valide" ';
                $querystatus = $db->query($sqlstatus);
                $resultstatus = $querystatus->fetchAll();
                for ($i = 0; $i < count($resultstatus); $i++) {
                    $sqlCat = 'SELECT * FROM categorie WHERE id= "' . $resultstatus[$i]['cat_id'] . '"';
                    $queryCat = $db->query($sqlCat);
                    $resultCat = $queryCat->fetchAll();

                    $sqlChantier = 'SELECT * FROM chantier WHERE id="' . $resultstatus[$i]['idChantier'] . '"';
                    $queryChantier = $db->query($sqlChantier);
                    $resultChantier = $queryChantier->fetchAll();

                    echo '<div class="result col-md-3">
                            <img src="' . $resultstatus[$i]['picture'] . '" class="image_result" >
                            <p class="name_result">' . $resultstatus[$i]['nom_du_produit'] . '</p>
                            <p class="adresse_result">' . $resultChantier[0]['adresse'] . '</p>
                            <button class="result_info_button" data-toggle="modal" data-target="#result_information" data-whatever="' . $resultstatus[$i]['nom_du_produit'] . '" onclick="product(this.value)" value="' . $resultstatus[$i]['nom_du_produit'] . '">En savoir plus</button>
                           </div>';
                }
                ?>

                <!-- SCRIPT -->
                <script type="text/javascript">
                    function product(info) {
                        (function ($) {
                            $('.modal-result').html('');
                            var input = document.getElementById('recipient-name');
                            input.value = info;
                            $.ajax({
                                type: 'POST',
                                url: "../action/fiche.php",
                                data: "name="+info,
                                dataType: 'json',
                                contentType: "application/x-www-form-urlencoded",
                                processData: true,
                                success: function (data) {
                                    var html = '';
                                    for (k = 0; k < data.length; k++) {
                                        var prop = Object.keys(data[k]);

                                        if (prop[0] === "img") {
                                            html += '<div class="result_popup col-md-6"><img src="' + data[k].img + '" class="image_result_popup">'
                                        }
                                        if (prop[0] === "name") {
                                            html += '<p class="name_result_popup">' + data[k].name + '</p>'
                                        }
                                        if (prop[0] === "stock") {
                                            html += '<div class="stock_result_popup"><p class="text_stock">En stock : </p><p class="number_stock">' + data[k].stock + ' '
                                        }
                                        if (prop[0] === "mesurestock") {
                                            html += data[k].mesurestock + '</p></div>'
                                        }
                                        if (prop[0] === "prix") {
                                            html += '<p class="prix_result_popup">' + data[k].prix
                                        }
                                        if (prop[0] === "mesureprix") {
                                            html += ' €/' + data[k].mesureprix + '</p></div>'
                                        }
                                        if (prop[0] === "chantier") {
                                            html += '<div class="result_popup col-md-6"><p class="chantier_result_popup"><img src="../img/pin.png">' + data[k].chantier + '</p>'
                                        }
                                        if (prop[0] === "longueur") {
                                            html += '<div class="dimension-container"><div class="col-md-4 dimension_div"><p class="dimension_result_popup"><span>L=</span>' + data[k].longueur + 'mm</p></div>'
                                        }
                                        if (prop[0] === "largeur") {
                                            html += '<div class="col-md-4 dimension_div"><p class="dimension_result_popup"><span>l=</span>' + data[k].largeur + 'mm</p></div>'
                                        }
                                        if (prop[0] === "hauteur") {
                                            html += '<div class="col-md-4 dimension_div"><p class="dimension_result_popup"><span>h=</span>' + data[k].hauteur + 'mm</p></div></div>'
                                        }
                                        if (prop[0] === "origine") {
                                            html += '<div class="origine-container"><p class="origine_result_popup"><span>Origine : </span>' + data[k].origine + '</p></div><br>'
                                        }
                                        if (prop[0] === "desc") {
                                            html += '<p class="desc_result_popup"><span>Description du produit : </span><br><br>' + data[k].desc + '</p>'
                                        }
                                        
                                        console.log(data);
                                        
                                    }
                                    $('.modal-result').append(html);
                                },
                                error: function(requestObject, error, errorThrown) {
                                        alert(input);
                                        alert(errorThrown);
                                        
                                   }

                            });
                        })(jQuery);
                    }
                    function filters() {
                        (function ($) {
                            $('input.categorie_filters').on('change', function () {
                                $('input.categorie_filters').not(this).prop('checked', false);
                                $('.filters_resuls').html("")
                            });
                            var id = document.querySelectorAll('input[name=categorie]:checked');
                            if (id[0].value === undefined) {
                                window.location.reload()
                            }
                            $.ajax({
                                type: 'POST',
                                url: "../action/filters.php",
                                data: "id=" + id[0].value,
                                dataType: 'json',
                                contentType: "application/x-www-form-urlencoded",
                                //async: true,

                                processData: true,
                                success: function (data) {
                                    var html = '';
                                    for (k = 0; k < data.length; k++) {
                                        var prop = Object.keys(data[k]);
                                        if (prop[0] === "name") {
                                            html += '<div class="result col-md-3"><p class="name_result">' + data[k].name + '</p><button class="result_info_button_ajax" data-toggle="modal" data-target="#result_information" data-whatever="' + data[k].name + '">En savoir plus</button>'
                                        }
                                        if (prop[0] === "img") {
                                            html += '<img src="' + data[k].img + '" class="image_result">'
                                        }
                                        if (prop[0] === "adresse") {
                                            html += '<p class="adresse_result">' + data[k].adresse + '</p></div>'
                                        }

                                    }
                                    $('.filters_resuls').append(html)
                                            ;
                                },

                            });


                        })(jQuery);
                    }
                </script>

            </div>
        </div>

        <!-- ///// MODAL RESULT -->

        <div class="modal fade" id="result_information" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog result_modal" role="document">
                <div class="modal-content modal_content_result">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Informations</h4>
                    </div>
                    <div class="modal-body">

                        <label for="recipient-name" class="control-label"></label>
                        <input type="hidden" class="form-control" id="recipient-name" readonly>
                        <div class="modal-result">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="contact.php" ><button type="button" id="signupfree" >ça m'intéresse</button></a>


                    </div>
                </div>
            </div>
        </div>
    </body>