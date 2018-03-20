<?php
	include('inc/test.pdo.php');
	include('inc/panier.class.php');
	$panier = new Panier();

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Batiphoenix</title>
	<link rel="stylesheet" type="text/css" href="css/fonts.css">
<!-- 	<link rel="stylesheet" type="text/css" href="css/index.css"> -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="icon" type="image/png" href="img/logo.png"/>
	<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</head>
<body>

<!-- ///// NAVBAR //// -->

<?php
	//Génération des checkBoxs de filtre
	$sql = 'SELECT * FROM categorie';
	$query = $db->query($sql);
	$result = $query->fetchAll();
	echo '<div id="filters"><input type="checkbox" onclick="window.location.reload()">Tous<br>';
	for($i=0;$i < count($result);$i++){
?>
	<input type="checkbox" class="categorie_filters" name="categorie" value="<?=$result[$i]['id'];?>" onclick="filters()"><?=$result[$i]['name'];?><br>
<?php
}
?>
</div><div class="filters_resuls">
<?php
$sql = "SELECT * FROM produit WHERE status='valide'";
$query = $db->query($sql);
$result = $query->fetchAll();
for($i=0;$i<count($result);$i++){
					$sqlCat = 'SELECT * FROM categorie WHERE id= "'.$result[$i]['cat_id'].'"';
					$queryCat = $db->query($sqlCat);
					$resultCat = $queryCat->fetchAll();

					$sqlChantier = 'SELECT * FROM chantier WHERE id="'.$result[$i]['idChantier'].'"';
					$queryChantier = $db->query($sqlChantier);
					$resultChantier = $queryChantier->fetchAll();

					echo '<div class="result">
							<img src="'.$result[$i]['picture'].'">
							<p class="name">'.$result[$i]['nom_du_produit'].'</p>
							<p class="stock">'.$result[$i]['Stock'].' Disponible</p>
							<p class="adresse">'.$resultChantier[0]['adresse'].'</p>
						</div>';
				}
?>
<style type="text/css">
	.result{
		border: solid 1px black;
	}
</style>
<script type="text/javascript">
	function filters(){
		(function($){
			$('input.categorie_filters').on('change', function() {
    		$('input.categorie_filters').not(this).prop('checked', false); 
    		$('.filters_resuls').html("")
		});
			var id = document.querySelectorAll('input[name=categorie]:checked');
			if(id[0].value === undefined){
			    window.location.reload()
			}
						$.ajax({
							type : 'POST',
            				url : "../action/filters.php",
            				data: "id="+id[0].value,
            				dataType: 'json',
            				contentType:"application/x-www-form-urlencoded",
         					async: true,
         					
         					processData: true,
                			success: function(data){
	                				var html = '';
				                    for(k=0;k < data.length;k++){
				                    	var prop = Object.keys(data[k]);
				                    	if(prop[0] === "img"){
				                    		html +='<img src="'+data[k].img+'">'
				                    	}
				                    	if(prop[0] === "name"){
				                    		html += '<div class="result" style="border: solid 1px black;"><p class="name">'+data[k].name+'</p>'
				                    	}
				                    	if(prop[0] === "stock"){
				                    		html += '<div class="result" style="border: solid 1px black;"><p class="stock">'+data[k].stock+' Disponible</p>'
				                    	}
				                    	if(prop[0] === "adresse"){
				                    		html += '<p class="entry">'+data[k].adresse+'</p>'
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