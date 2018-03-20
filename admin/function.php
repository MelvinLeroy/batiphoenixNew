<?php
include('../inc/db.php');
function current_class_if( $condition ) {
  return $condition ? 'class="active-link"':'';
}
function current_class_if_under( $condition ) {
  return $condition ? 'class="toggle"':'';
}
	function libs(){
        include('inc/db.php');
		$html = '
			<!DOCTYPE html>
				<html xmlns="http://www.w3.org/1999/xhtml">
					<head>
					      <meta charset="utf-8" />
					    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
					    <title>Espace Admin</title>
						<!-- BOOTSTRAP STYLES-->
					    <link href="assets/css/bootstrap.css" rel="stylesheet" />
					     <!-- FONTAWESOME STYLES-->
					    <link href="assets/css/font-awesome.css" rel="stylesheet" />
					        <!-- CUSTOM STYLES-->
					    <link href="assets/css/custom.css" rel="stylesheet" />
					     <!-- GOOGLE FONTS-->
					   <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
                       <script src="assets/js/jquery-1.10.2.js"></script>
                        <!-- BOOTSTRAP SCRIPTS -->
                        <script src="assets/js/bootstrap.min.js"></script>
                        <!-- CUSTOM SCRIPTS -->
                        <script src="assets/js/custom.js"></script>
                        <!-- COLOR -->
                        <script src="../js/jscolor.js"></script>
					</head>
					<body>';
		echo $html;
	}

	function Navbar_admin(){
        include('../inc/db.php');
        $sql = 'SELECT * FROM commandes WHERE status="unread"';
        $query = $db->query($sql);
        $result = $query->fetchAll();
        $count = count($result);
        $sqlColor='SELECT * FROM users WHERE pseudo="'.$_SESSION['pseudo'].'"';
        $queryColor = $db->query($sqlColor);
        $resultColor = $queryColor->fetchAll();
		$file = basename($_SERVER['SCRIPT_NAME']);
		$html = '
		<div class="wrapper">
		<div class="navbar navbar-inverse navbar-fixed-top" style="background-color:'.$resultColor[0]['color'].'">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="../index.php">
                        <h2 style="color:white;">Bati-Phoenix</h2>

                    </a>

                </div>

                <span class="logout-spn" >
                  <a href="../action/action.logOut.php" style="color:#fff;">LOGOUT</a>

                </span>
            </div>
        </div>
		<nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                     <li '.current_class_if( $file === "index.php").'>
                        <a href="index.php" ><i class="fa fa-desktop "></i>Dashboard</a>
                    </li>
                   <li '.current_class_if( $file === "devis.php").'>
                        <a href="devis.php"><i class="fa fa-table "></i>Gestion des Devis <sup><span class="badge">'.$count.'</span></sup> </a>
                    </li>
                    <li '.current_class_if( $file === "fournisseur.php").' id="provider">
                        <a href="fournisseur.php"><i class="fa fa-edit "></i>Fournisseur</a>
                        <ul '.current_class_if_under( $file === "fournisseur.php").' '.current_class_if_under( $file === "addProvider.php").' class="under_menu_provider" id="fourni">
                            <li><a href="addProvider.php">Ajouter</a></li>
                        </ul>
                    </li>
 					<li '.current_class_if( $file === "produit.php").' id="products">
                        <a href="produit.php" ><i class="fa fa-desktop "></i>Produit</a>
                        <ul  '.current_class_if_under( $file === "produit.php").' '.current_class_if_under( $file === "addProduct.php").' '.current_class_if_under( $file === "category.php").' class="under_menu_product" id="produit">
                            <li><a href="addProduct.php">Ajouter</a></li>
                            <li><a href="category.php">Categorie</a></li>
                           
                        </ul>
                    </li>
                    <li '.current_class_if( $file === "chantier.php").' id="products">
                        <a href="chantier.php" ><i class="fa fa-desktop "></i>Tous les chantiers</a>
                        <ul  '.current_class_if_under( $file === "chantier.php").' '.current_class_if_under( $file === "addChantier.php").' class="under_menu_product" id="produit">
                            <li><a href="addChantier.php">Ajouter</a></li>        
                        </ul>
                    </li>
                    <li '.current_class_if( $file === "users.php").'>
                        <a href="users.php" ><i class="fa fa-users "></i>Tous les utilisateurs</a>
                    </li>
                    <li '.current_class_if( $file === "profil.php").'>
                        <a href="profil.php?id='.$resultColor[0]['id'].'" ><i class="fa fa-desktop "></i>Mon Profil</a>
                    </li>
                </ul>
                            </div>

        </nav></div>';
        echo $html;
	}
    function Navbar_user(){
         include('../inc/db.php');
         $sqlUser = 'SELECT * FROM users WHERE pseudo="'.$_SESSION['pseudo'].'"';
         $queryUser = $db->query($sqlUser);
         $resultUser = $queryUser->fetchAll();

        $sql = 'SELECT * FROM commandes WHERE status="unread" AND id_user_fk="'.$resultUser[0]['id'].'"';
        $query = $db->query($sql);
        $result = $query->fetchAll();
        $count = count($result);
        $file = basename($_SERVER['SCRIPT_NAME']);
        $html = '
        <div class="wrapper">
        <div class="navbar navbar-inverse navbar-fixed-top" style="background-color:'.$resultUser[0]['color'].'">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="../index.php">
                        <h2 style="color:white;">Bati-Phoenix</h2>

                    </a>

                </div>

                <span class="logout-spn" >
                  <a href="../action/action.logOut.php" style="color:#fff;">LOGOUT</a>

                </span>
            </div>
        </div>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                     <li '.current_class_if( $file === "profil.php").'>
                        <a href="profil.php?id='.$resultUser[0]['id'].'" ><i class="fa fa-desktop "></i>Mon Profil</a>
                    </li>
                   <li '.current_class_if( $file === "devis_users.php").'>
                        <a href="devis_users.php"><i class="fa fa-table "></i>Mes devis <sup><span class="badge">'.$count.'</span></sup> </a>
                    </li>
                    <li '.current_class_if( $file === "become_provide.php").'>
                        <a href="become_provide.php"><i class="fa fa-table "></i>Devenir Fournisseur</a>
                    </li>
                </ul>
                            </div>

        </nav></div>';
        echo $html;
    }
    function Navbar_provider(){
         include('../inc/db.php');
         $sqlUser = 'SELECT * FROM users WHERE pseudo="'.$_SESSION['pseudo'].'"';
         $queryUser = $db->query($sqlUser);
         $resultUser = $queryUser->fetchAll();
        $sql = 'SELECT * FROM commandes WHERE status="unread" AND id_user_fk="'.$resultUser[0]['id'].'"';
        $query = $db->query($sql);
        $result = $query->fetchAll();
        $count = count($result);
        $file = basename($_SERVER['SCRIPT_NAME']);
        $html = '
        <div class="wrapper">
        <div class="navbar navbar-inverse navbar-fixed-top" style="background-color:'.$resultUser[0]['color'].'">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="../index.php">
                        <h2 style="color:white;">Bati-Phoenix</h2>

                    </a>

                </div>

                <span class="logout-spn" >
                  <a href="../action/action.logOut.php" style="color:#fff;">LOGOUT</a>

                </span>
            </div>
        </div>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                     <li '.current_class_if( $file === "profil.php").'>
                        <a href="profil.php?id='.$resultUser[0]['id'].'" ><i class="fa fa-desktop "></i>Mon Profil</a>
                    </li>
                   <li '.current_class_if( $file === "devis_users.php").'>
                        <a href="devis_users.php"><i class="fa fa-table "></i>Mes devis <sup><span class="badge">'.$count.'</span></sup> </a>
                    </li>
                    <li '.current_class_if( $file === "product_provide.php").' id="products">
                        <a href="product_provide.php" ><i class="fa fa-desktop "></i>Produit</a>
                        <ul  '.current_class_if_under( $file === "product_provide.php").' '.current_class_if_under( $file === "addProduct.php").' '.current_class_if_under( $file === "category.php").' class="under_menu_product" id="produit">
                            <li><a href="addProduct.php">Ajouter</a></li>
                           
                        </ul>
                    </li>
                    <li '.current_class_if( $file === "chantier.php").' id="products">
                        <a href="chantier.php" ><i class="fa fa-desktop "></i>Tous les chantiers</a>
                        <ul  '.current_class_if_under( $file === "chantier.php").' '.current_class_if_under( $file === "addChantier.php").' class="under_menu_product" id="produit">
                            <li><a href="addChantier.php">Ajouter</a></li>        
                        </ul>
                    </li>
                </ul>
                            </div>

        </nav></div>';
        echo $html;
    }
?>
