<?php
include('inc/db.php');

$sql = 'SELECT * FROM attente ORDER BY id';
$query = $db->query($sql);
$result = $query->fetchAll();

$productsql = 'SELECT nom_du_produit FROM produit WHERE status_item = "pending" AND Date_entry = "'.$result[0]['entry_date'].'"';
$productquery = $db->query($productsql);
$productresult = $productquery->fetchAll();
?>

<table border="1" width="1000" cellspacing="2" cellpadding="2">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Produit</th>
        </tr>
    </thead>
    <tbody>
        <?php
        for ($i = 0; $i < count($result); $i++) {
        ?>
            <tr>
                <td><?= $result[$i]['nom'] ?></td>
                <td><?= $result[$i]['prenom'] ?></td>
                <td><?= $result[$i]['email'] ?></td>
                <td>0<?= $result[$i]['telephone'] ?></td>
                <td><?= $productresult[$i]['nom_du_produit'] ?></td>
            </tr>
        <?php
        }
//        echo '<pre>';
//        echo '<br><br><br>$RESULT<br><br><br>';
//        print_r($result);
//        echo '<br><br><br>$PRODUCTRESULT<br><br><br>';
//        print_r($productresult);
//        echo count($result);
//        echo '</pre>';
        
        ?>
    </tbody>

</table>
