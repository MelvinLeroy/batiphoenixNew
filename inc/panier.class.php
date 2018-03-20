<?php
  class Panier{
    public function __construct(){
      //var_dump($_SESSION);
      if(!isset($_SESSION['panier'])){
        $_SESSION['panier'] = array();
      }
    }

    public function totalHT(){
      include('test.pdo.php');
      $totalHT = 0;
      $ids = array_keys($_SESSION['panier']);
      if(empty($ids)){
        $resultPanier = array();
      }else{
        $sqlPanier = 'SELECT idProduit,prix FROM produit WHERE idProduit IN('.implode(',',$ids).')';
        $queryPanier = $db->query($sqlPanier);
        $resultPanier = $queryPanier->fetchAll();
      }
    for($k=0; $k <count($resultPanier);$k++){
      $totalHT += $resultPanier[$k]['prix'] * $_SESSION['panier'][$resultPanier[$k]['idProduit']];
    }
    return $totalHT;
  }
  public function total(){
    include('test.pdo.php');
    $total = 0;
    $ids = array_keys($_SESSION['panier']);
    if(empty($ids)){
      $resultPanier = array();
    }else{
      $sqlPanier = 'SELECT idProduit,prix FROM produit WHERE idProduit IN('.implode(',',$ids).')';
      $queryPanier = $db->query($sqlPanier);
      $resultPanier = $queryPanier->fetchAll();
    }
  for($k=0; $k <count($resultPanier);$k++){
    $total += ($resultPanier[$k]['prix'] * 1.196) * $_SESSION['panier'][$resultPanier[$k]['idProduit']];
  }
  return $total;
}

    public function add($product_id){
      if(isset($_SESSION['panier'][$product_id])){
        $_SESSION['panier'][$product_id]++;
      }else{
        $_SESSION['panier'][$product_id] = 1;
        }
    }

    public function del($product_id){
      unset($_SESSION['panier'][$product_id]);
    }
  }


 ?>
