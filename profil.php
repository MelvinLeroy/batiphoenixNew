<?php
	include('/inc/db.php');
  session_start();
  var_dump($db);
  	$sqlUser = 'SELECT id FROM users WHERE pseudo = "'.$_SESSION['pseudo'].'"';
  	$requestUser = $db->query($sqlUser);
  	$resultUser = $requestUser->fetchAll();

  	$sqlCommands = 'SELECT * FROM commandes WHERE id_user_fk = "'.$resultUser[0]['id'].'"';
  	$requestCommands = $db->query($sqlCommands);
  	$resultCommands = $requestCommands->fetchAll();
  	for($j = 0;$j <count($resultCommands);$j++){
  	?>
  	<p><a href="action/showCommands.php?id=<?=$resultCommands[$j]['id'];?>&id_user=<?=$resultUser[0]['id'];?>">Commande n° <?=$resultCommands[$j]['id']?></a></p>
  	<?php
  	}
  	?>