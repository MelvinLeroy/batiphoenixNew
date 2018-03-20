<?php

header('Location: ../sellConfirmationTemporary.php');
include('../inc/db.php');
if (isset($_POST)) {

    $nom = htmlspecialchars(addslashes($_POST['name']));
    $categorie = htmlspecialchars(addslashes($_POST['categories']));
    $origine = htmlspecialchars(addslashes($_POST['origine']));
    $dimension1 = htmlspecialchars(addslashes($_POST['dimension1']));
    $dimension2 = htmlspecialchars(addslashes($_POST['dimension2']));
    $dimension3 = htmlspecialchars(addslashes($_POST['dimension3']));
    $quantite = htmlspecialchars(addslashes($_POST['quantite']));
    $mesureStock = htmlspecialchars(addslashes($_POST['mesureStock']));
    $mesurePrix = htmlspecialchars(addslashes($_POST['mesurePrix']));
    $prix = htmlspecialchars(addslashes($_POST['prix']));
    $remarque = htmlspecialchars(addslashes($_POST['remarque']));
    $iduser = $_SESSION['id'];
    
    $cat_select = 'SELECT id FROM categorie WHERE name ="'.$categorie.'"';
    $query_select = $db->query($cat_select);
    $result_cat = $query_select->fetchAll();
    $categorie_id = $result_cat[0][0];
    $sqlUsername = 'SELECT * FROM users WHERE mail="' . $_SESSION['pseudo'] . '"';
    $queryUsername = $db->query($sqlUsername);
    $resultUsername = $queryUsername->fetchAll();

    /*     * **********************************************************
     * Definition des constantes / tableaux et variables
     * *********************************************************** */

// Constantes
    define('NAME', $resultUsername[0]['prenom']);
    define('ADDLASTNAME', NAME.$resultUsername[0]['nom']);
    define('TARGET', "../img/");    // Repertoire cible
    //define('TARGET', "../img/".ADDLASTNAME);    // Repertoire cible
    define('MAX_SIZE', 10000000);    // Taille max en octets du fichier
    define('WIDTH_MAX', 6000);    // Largeur max de l'image en pixels
    define('HEIGHT_MAX', 6000);    // Hauteur max de l'image en pixels
    define('WIDTH', 225); //Redéfinir la largeur de l'image à 225px;'
    define('HEIGHT', 225); //Redéfinir la hauteur de l'image à 225px;'
// Tableaux de donnees
    $tabExt = array('jpg', 'png', 'jpeg');    // Extensions autorisees
// Variables
    $extension = '';
    $message = '';
    $nomImage = '';
    $imageName = TARGET . $nomImage;

    /* ************************************************************
     * Creation du repertoire cible si inexistant
     * ************************************************************/
    if (!is_dir(TARGET)) {
        if (!mkdir(TARGET, 0755)) {
            exit('Erreur : le répertoire cible ne peut-être créé ! Vérifiez que vous diposiez des droits suffisants pour le faire ou créez le manuellement !');
        }
    }

    /*     * **********************************************************
     * Script d'upload
     * *********************************************************** */
    if (!empty($_FILES['image1']['name'])) {
        $extension = pathinfo($_FILES['image1']['name'], PATHINFO_EXTENSION);

        if (in_array(strtolower($extension), $tabExt)) {
            $infosImg = getimagesize($_FILES['image1']['tmp_name']);

            if ($infosImg[2] >= 1 && $infosImg[2] <= 14) {
                if (($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (filesize($_FILES['image1']['tmp_name']) <= MAX_SIZE)) {
                    if (isset($_FILES['image1']['error']) && UPLOAD_ERR_OK === $_FILES['image1']['error']) {
                        $nomImage = md5(uniqid()) . '.' . $extension;

                        if (move_uploaded_file($_FILES['image1']['tmp_name'], TARGET . $nomImage)) {
                            $message = 'Upload réussi !';
                        } else {
                            $message = 'Problème lors de l\'upload !';
                        }
                    } else {
                        $message = 'Une erreur interne a empêché l\'uplaod de l\'image';
                    }
                } else {
                    $message = 'Erreur dans les dimensions de l\'image !';
                }
            } else {
                $message = 'Le fichier à uploader n\'est pas une image !';
            }
        } else {
            $message = 'L\'extension du fichier est incorrecte !';
        }
    } else {
        $message = 'Veuillez remplir le formulaire svp !';
    }
    
    $tmp_path = '/homepages/27/d670066619/htdocs/Batiphoenix/tmp/' . $nomImage;
    $test = fileperms($tmp_path);
    echo $test;
    echo $tmp_path;
    echo '<br>';
    echo '<br>';
    print_r(exif_read_data($tmp_path, 0, true));
    echo '<br>';
    echo $nomImage;
    echo '<br>';
    echo '<br>';
    $exif = exif_read_data($nomImage);
    echo $exif;
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
//    $ort = $exif['IFD0']['Orientation'];
//    $image = $_FILES['image1']['tmp_name'];
//    switch($ort)
//    {
//        case 1: // nothing
//        break;
//
//        case 2: // horizontal flip
//            $image->flipImage($public,1);
//        break;
//                               
//        case 3: // 180 rotate left
//            $image->rotateImage($public,180);
//        break;
//                   
//        case 4: // vertical flip
//            $image->flipImage($public,2);
//        break;
//               
//        case 5: // vertical flip + 90 rotate right
//            $image->flipImage($public, 2);
//            $image->rotateImage($public, -90);
//        break;
//               
//        case 6: // 90 rotate right
//            $image->rotateImage($public, -90);
//        break;
//               
//        case 7: // horizontal flip + 90 rotate right
//            $image->flipImage($public,1);   
//            $image->rotateImage($public, -90);
//        break;
//               
//        case 8:    // 90 rotate left
//            $image->rotateImage($public, 90);
//        break;
//    }


    
    
    $sql = 'INSERT INTO produit(picture, nom_du_produit, cat_id, origine, longueur, largeur, hauteur, Stock, mesureStock, Prix, mesurePrix, remarque, id_user, status_item, Date_entry) '
            . 'VALUES ("'.TARGET.$nomImage.'","'.$nom.'","'.$categorie_id.'","'.$origine.'","'.$dimension1.'","'.$dimension2.'","'.$dimension3.'","'.$quantite.'","'.$mesureStock.'","'.$prix.'","'.$mesurePrix.'","'.$remarque.'", "'.$iduser.'", "pending", CURDATE())';
    $query = $db->query($sql);
    
    
    $filesize = filesize($_FILES['image1']['tmp_name']);
    
    
    echo $filesize;
    echo '<br>';
    print_r($infosImg);
    echo '<br>';
    echo $message;
    echo "Envoyé !";
    echo '<br>';
    print_r($db->errorInfo());
    echo '<br>';
    var_dump($nomImage);
}else{
    echo "error";
}