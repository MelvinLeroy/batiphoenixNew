<?php
include('../inc/db.php');
$target_dir = "../img/articles/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $sqlChantier = 'SELECT * FROM chantier WHERE id ="'.$_POST['product_chantier'].'"';
        $queryChantier = $db->query($sqlChantier);
        $resultChantier = $queryChantier->fetchAll();

        $sqlProvide = 'SELECT * FROM fournisseur WHERE name="'.$_POST['product_provide'].'"';
        $queryProvide = $db->query($sqlProvide);
        $resultProvide = $queryProvide->fetchAll();

        $sqlUpdate = 'UPDATE produit SET 
			nom_du_produit="'.htmlspecialchars(addslashes($_POST['product_name'])).'",
			description="'.htmlspecialchars(addslashes($_POST['product_desc'])).'",
			cat_id="'.htmlspecialchars(addslashes($_POST['product_cat'])).'",
            Stock  = "'.htmlspecialchars(addslashes($_POST['product_stock'])).'",
            Prix = "'.htmlspecialchars(addslashes($_POST['product_price'])).'",
            Dimension = "'.htmlspecialchars(addslashes($_POST['product_dimension'])).'",
            idChantier = "'.$resultChantier[0]['id'].'",
			picture="'.$target_file.'",
			id_provider="'.$resultProvide[0]['id'].'"
			WHERE idProduit = "'.htmlspecialchars(addslashes($_POST['id'])).'"';
		$queryUpdate = $db->query($sqlUpdate);
    ?>
    <script type="text/javascript">
    	window.location.href = "../admin/produit.php"
    </script>
    <?php
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
    


    header('Location:../admin/produit.php');
?>
	
header('Location:../admin/produit.php');
?>