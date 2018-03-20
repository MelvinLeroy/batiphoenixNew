<head>
    <script type="text/javascript" src="js/header.js"></script>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
        function upper(num) {
            $("#span" + num).css("transition-duration", "0.5s");
            $("#span" + num).css("top", "-16px");
            $("#span" + num).css("font-size", "12px");
        }
        function submitFormSignUp() {
            var prenom = document.getElementById("item1Device").value;
            var nom = document.getElementById("item2").value;
            var societe = document.getElementById("item3").value;
            var fonction = document.getElementById("item4").value;
            var mail = document.getElementById("item5").value;
            var telephone = document.getElementById("item6").value;
            var password = document.getElementById("item7").value;
            var confirm = document.getElementById("item8").value;

            $.ajax({
                type: 'POST',
                url: "action/action.signup.php",
                data: {prenom: prenom, nom: nom, societe: societe, fonction: fonction, mail: mail, telephone: telephone, pass: password},
                success: function () { // success est toujours en place, bien sûr !
                    alert('Inscription Réussi');
                    document.location.href = "../";
                },
                error: function () {
                    alert('Inscription Echoué');
                    document.location.href = "../";
                }
            });
        }
        function submitForm() {
            //console.log(mail)
            //console.log(pass)
            $.ajax({
                type: 'POST',
                url: "../action/actionLogIn.php",
                data: {mail: $("#item9").val(), pass: $("#item10").val()},
                success: function () { // success est toujours en place, bien sûr !
                    alert('Connexion Réussi');
                    window.location.reload();
                },
                error: function () {
                    alert('Connexion Echoué');
                    window.location.reload();

                }
            });

        }
    </script>
</head>

<?php
$sqlUsername = 'SELECT prenom FROM users WHERE mail="' . $_SESSION['pseudo'] . '"';
$queryUsername = $db->query($sqlUsername);
$resultUsername = $queryUsername->fetchAll();
$username = $resultUsername[0]['prenom'];
$not_log = '
		<li class="itemmenu">
			<button type="button" id="signin" class="itemmenubutton" data-toggle="modal" data-target="#signinmodal">Connexion</button>
		</li>
		<li class="itemmenu">
			<button type="button" id="signup" class="itemmenubutton" data-toggle="modal" data-target="#signupmodal">Inscription</button>
		</li>';
$log = '
		<li class="itemmenu">
			<a href="action/action.logOut.php"><button type="button" id="signin" class="itemmenubutton">Déconnexion</button></a>
		</li>
                <p id="userWelcome"> Bienvenue, <a href="">' . $username . '</a></p>';
?>

<div id="onComputer">
    <section id="header">
        <div class="row">
            <div class="col-md-1">
                <a href="../"><img src="img/logo.png" id="logo"></a>
            </div>
            <div class="col-md-3">
                <i id="searchicon" class="fa fa-search fa-2x" aria-hidden="true"></i>
                <select class="js-data-example-ajax select2searchbar" id="searchbarform">
                </select>
            </div>
            <div class="col-md-8">
                <ul id="menu">
                    <a class="navbarlinks" href="http://batiphoenix.com/">
                        <li class="itemmenu">Accueil</li>
                    </a>
                    <a class="navbarlinks" href="materiautheque.php">
                        <li class="itemmenu">Matériauthèque</li>
                    </a>
                    <a class="navbarlinks" href="a_propos.php"> 
                        <li class="itemmenu">à propos</li>
                    </a>
                    <a class="navbarlinks" href="contact.php">
                        <li class="itemmenu">Contact</li>
                    </a>
                    <?= $log_or_not = (!isset($_SESSION['pseudo']) && empty($_SESSION['pseudo'])) ? $not_log : $log; ?>	
                </ul>
            </div>
        </div>
    </section>

    <!-- ///// MODALS POPUP ///// -->

    <div class="modal fade" id="signinmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <img class="modallogo" src="img/LogoAndBatiphoenix.png">
                </div>
                <div class="modal-body">
                    <h2 id="signintitle">CONNEXION</h2>
                    <form method="post" class="signform"  id="connectForm">
                        <div class="row signupformlines">
                            <div class="col-md-12">

                                <span id="span9" class="item"><i class="fa fa-user fa-2x" aria-hidden="true"></i>E-mail</span>
                                <input type="mail" name="mail" class="signinformitems" required id="item9" onblur="check(this.value, 9)" onclick="upper(9)" required>
                            </div>
                        </div>
                        <div class="row signupformlines">
                            <div class="col-md-12">
                                <span id="span10">Mot de Passe</span>
                                <input type="password" name="pass" class="signinformitems" required id="item10" onblur="check(this.value, 10)"  onclick="upper(10)" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button name="submit" type="submit" class="btn btn-default" id="loginbutton" data-dismiss="modal" onclick="submitForm()">Connexion</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">

                    <div class="col-md-12">
                        <p id="alreadyaccount">Vous n'avez pas de compte ?
                            <a href="#signmodal" id="signuplink">Inscrivez-vous !</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="signupmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <img class="modallogo" src="img/LogoAndBatiphoenix.png">
                </div>
                <div class="modal-body">
                    <h2 id="signuptitle">INSCRIPTION</h2>
                    <div class="alert alert-danger col-md-10 col-md-offset-1" id="alert-message">
                        <p>Tous les champs doivent être remplis :</p>
                        <p class="error-line" id="error-phone1"><br>    - Le numéro de téléphone ne doit contenir que des chiffres.</p>
                        <p class="error-line" id="error-phone2"><br>    - Le numéro de téléphone doit contenir 10 chiffres.</p>
                        <p class="error-line" id="error-pass"><br>    - Les mots de passe ne sont pas identiques.</p>
                        <p class="error-line" id="error-cgu"><br>    - Veuillez accepter les conditions générales d'utilisation.</p>
                    </div>
                    <form method="post" class="signform" action="action/action.signup.php" id="SignUpForm">
                        <div class="row signupformlines">
                            <div class="col-md-6">
                                <span id="span1">Prénom</span>
                                <input type="text" name="prenom" class="signupformitems" required id="item1" onblur="check(this.value, 1)" onclick="upper(1)"  required>
                            </div>
                            <div class="col-md-6">
                                <span id="span2">Nom de Famille</span>
                                <input type="text" name="nom" class="signupformitems" id="item2" required onblur="check(this.value, 2)" onclick="upper(2)"  required>
                            </div>
                        </div>
                        <div class="row signupformlines">
                            <div class="col-md-6">
                                <span id="span3">Société</span>
                                <input type="text" name="societe" class="signupformitems" id="item3" required onblur="check(this.value, 3)" onclick="upper(3)"  required>
                            </div>
                            <div class="col-md-6">
                                <span id="span4">Fonction</span>
                                <input type="text" name="fonction" class="signupformitems" id="item4" required onblur="check(this.value, 4)" onclick="upper(4)" required>
                            </div>
                        </div>
                        <div class="row signupformlines">
                            <div class="col-md-6">
                                <span id="span5">Adresse E-Mail</span>
                                <input type="email" name="mail" class="signupformitems" id="item5" required onblur="check(this.value, 5)" onclick="upper(5)"  required>
                            </div>
                            <div class="col-md-6">
                                <span id="span6">Numéro de Téléphone</span>
                                <input type="text" name="telephone" class="signupformitems" id="item6" required onblur="check(this.value, 6)" onclick="upper(6)"  required>
                            </div>
                        </div>
                        <div class="row signupformlines">
                            <div class="col-md-6">
                                <span id="span7">Mot de Passe</span>
                                <input type="password" name="pass" class="signupformitems" id="item7" required onblur="check(this.value, 7)" onclick="upper(7)"  required>
                            </div>
                            <div class="col-md-6">
                                <span id="span8">Confirmation</span>
                                <input type="password" name="passconfirm" class="signupformitems" id="item8" required onblur="check(this.value, 8)" onclick="upper(8)"  required>
                            </div>
                        </div>
                        <div class="row signupformlines">
                            <div class="col-md-12">
                                <input id="checkboxcgu" type="checkbox" name="checkbox" required>
                                <label for="checkboxcgu">J'accepte les conditions générales d'utilisation</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-default" id="signupbutton">Envoyer</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->



</div>
<div id="headerDevice">
    <div id="logoDevice">
        <img id="imgLogoDevice" alt="Retour à la page principale" src="img/LogoAndBatiphoenix.png">
    </div>
    <div class="hamburger closed">
        <div class="burger-main">
            <div class="burger-inner">
                <span class="top"></span>
                <span class="mid"></span>
                <span class="bot"></span>
            </div>
        </div>

        <div class="svg-main">
            <svg class="svg-circle">
            <path class="path" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="4" d="M 34 2 C 16.3 2 2 16.3 2 34 s 14.3 32 32 32 s 32 -14.3 32 -32 S 51.7 2 34 2"/>
            </svg>
        </div>
        <div class="path-burger">
            <div class="animate-path">
                <div class="path-rotation"></div>
            </div>
        </div>
    </div>
    <div id="menuDeviceContainer">
        <ul id="menuDevice">
            <a href="index.php"><li>Accueil</li></a>
            <a href="materiautheque.php"><li>Matériauthèque</li></a>
            <a href="a_propos.php"><li>A propos</li></a>
            <a href="contact.php"><li>Contact</li></a>
        </ul>
    </div>
</div>
<div class="pushTop"></div>

<script type="text/javascript">

    //alert(document.forms[1]['telephone'].value.length);

    $(document).ready(function () {     

        $('#signupbutton').click(function(){
            
            var verify = true;
            
            
            if (document.forms[1]['telephone'].value.length !== 10) {
                $('#alert-message').css("display", "block");
                $('#error-phone2').css("display", "inline");
                verify = false;
            }else{
                $('#error-phone2').css("display", "none");
            }
            
            if(document.forms[1]['telephone'].value.match(/[a-z]/i)){
                $('#alert-message').css("display", "block");
                $('#error-phone1').css("display", "inline");
                verify = false;
            }else{
                $('#error-phone1').css("display", "none");
            }
            
            if (document.forms[1]['pass'].value !== document.forms[1]['passconfirm'].value){
                $('#alert-message').css("display", "block");
                $('#error-pass').css("display", "inline");
                verify = false;
            }else{
                $('#error-pass').css("display", "none");
            }
            
            if (document.forms[1]['checkbox'].checked === false){
                $('#alert-message').css("display", "block");
                $('#error-cgu').css("display", "inline");
                verify = false;
            }else{
                $('#error-cgu').css("display", "none");
            }
            
            if (verify === false){
                return false;
            }else{
                document.forms[1].submit();
            }
        });

    });
</script>
