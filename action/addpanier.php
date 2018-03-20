<?php
  include('../inc/db.php');
  include('../inc/panier.class.php');
  $panier = new Panier();
  if(isset($_GET['id'])){
    $id = htmlspecialchars(addslashes($_GET['id']));
    if (is_numeric($id))
    {
      $sqlId = 'SELECT * FROM produit WHERE idProduit="'.$id.'"';
      $queryId = $db->query($sqlId);
      $resultId =$queryId->fetchAll();
      $article = $resultId[0]['idProduit'];
      $panier->add($article);
      ?>
      <script type="text/javascript">
        alert('Le produit a bien été ajouté au panier');
        window.location.href = '../index.php';
      </script>
      <?php
    }
    else
    {
      echo "Qu'est-ce que tu fais, petit malin ? ;)";
    }
  }else{
    echo 'Aucun article sélectionné';
  }
 ?>
