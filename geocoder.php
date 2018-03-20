<?php
include('inc/db.php');
?>
<html>
<head>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBt8k5hcN3MbwLVUwM0OLwSxXUScZnT1H0"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
</head>
<body>

<div id="answer"></div>
<form action="geo.php" method="get" id="formauto">
<script type="text/javascript">
  var i = 0;
  adress = new Array();
</script>
<?php
$sql = 'SELECT * FROM markers';
$query = $db->query($sql);
$resultQuery = $query->fetchAll();
for($i = 0 ; $i < count($resultQuery); $i++){
  $adresse[] = $resultQuery[$i]['address'];
?>
<input type="hidden" value="<?=$adresse[$i];?>" id="adresse<?=$i;?>" class="adresse" name="adresse<?=$i;?>"><br>
<script type="text/javascript">
 adress.unshift('adresse'+i);
 i = i+1;
</script>
<?php
}
?>

<script type="text/javascript">
 /* Déclaration des variables globales */ 
 var geocoder = new google.maps.Geocoder();
 var addr, latitude, longitude;
 var input = document.getElementsByClassName('adresse');
 var container = document.getElementById('formauto');
 /* Fonction chargée de géolocaliser l'adresse */ 
  /* Récupération du champ "adresse" */
  addr = new Array();
  for(j = 0 ; j < adress.length;j++){
    var curr = adress[j];
    addr.unshift(document.getElementById(curr).value);
  }
  //console.log(addr.length)
  var m = 0;
  for(x = 0;x < addr.length;x++){
  /* Tentative de géocodage */ 
  geocoder.geocode( { 'address': addr[x]}, function(results, status) {
   /* Si géolocalisation réussie */ 
   if (status == google.maps.GeocoderStatus.OK) {
    /* Récupération des coordonnées */ 
    latitude = results[0].geometry.location.lat();
    longitude = results[0].geometry.location.lng();
    /* Insertion des coordonnées dans les input text */ 
    //alert('Adresse : '+addr[x]+"\nLatitude: "+results[0].geometry.location.lat()+"\nLongitude: "+results[0].geometry.location.lng())
    container.innerHTML += "<input type='hidden' name='lat"+m+"' value='"+latitude+"'> <br>";
    container.innerHTML += "<input type='hidden' name='lng"+m+"' value='"+longitude+"'><br>";
    container.innerHTML += "<input type='hidden' name='count' value='"+m+"'><br>";
    m = m+1;
   }else{
    console.log('La geolocalisation a echoué car : '+status)
   }
   container.submit();
   
   
    });
  }
  
  
 

</script>
</form>
</body>
</html>