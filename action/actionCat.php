<?php
include('../inc/db.php');
    $sqlAddCat = 'INSERT INTO categorie(name, description) VALUES ("'.htmlspecialchars(addslashes($_POST['cat_name'])).'","'.htmlspecialchars(addslashes($_POST['cat_desc'])).'")';
    
    $queryAddCat = $db->query($sqlAddCat);
    unset($_POST['cat_name']);
    unset($_POST['cat_desc']);
    header('Location:../admin/category.php');
?>