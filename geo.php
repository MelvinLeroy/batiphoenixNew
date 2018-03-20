<?php
include('inc/db.php');
$count = $_GET['count'];
$lat = [];
$lng = [];
$adresse = [];
for($j = 0;$j <= $count;$j++){
    $lat[] = $_GET['lat'.$j];
    $lng[] = $_GET['lng'.$j];
}
for($x= 0; $x <= $count;$x++){
    $adresse[] = $_GET['adresse'.$x];
}
for($k = 0;$k <= $count;$k++){
    $sql = 'SELECT * FROM markers WHERE address = "'.$adresse[$k].'"';
    $sqlUpdate = 'UPDATE markers SET lat="'.$lat[$k].'",lng="'.$lng[$k].'" WHERE address = "'.$adresse[$k].'"';
    $requestUpdate = $db->query($sqlUpdate);
}
?>
<script type="text/javascript">
	window.location.href='indexMap.php';
</script>