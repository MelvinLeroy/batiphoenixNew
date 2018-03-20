<?php
include('../inc/db.php');
$sqlUser = 'SELECT * FROM users WHERE mail = "'.$_SESSION['pseudo'].'"';
$queryUser = $db->query($sqlUser);
$resultUser = $queryUser->fetchAll();
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
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
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
        $sqlAddProduct = 'INSERT INTO produit(nom_du_produit, description, cat_id, picture, id_provider,status,idChantier,Stock,Dimension,Prix,Date_entry) 
            VALUES ("'.htmlspecialchars(addslashes($_POST['product_name'])).'","'.htmlspecialchars(addslashes($_POST['product_desc'])).'","'.htmlspecialchars(addslashes($_POST['product_cat'])).'","'.$target_file.'","'.htmlspecialchars(addslashes($_POST['product_provide'])).'","pending","'.htmlspecialchars(addslashes($_POST['product_chantier'])).'","'.htmlspecialchars(addslashes($_POST['product_stock'])).'","'.htmlspecialchars(addslashes($_POST['product_dimensions'])).'","'.htmlspecialchars(addslashes($_POST['product_price'])).'",CURDATE())';
        $queryAddProduct = $db->query($sqlAddProduct);
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