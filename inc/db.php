<?php
	$host_name  = "db675106822.db.1and1.com";
    	$database   = "db675106822";
    	$user_name  = "dbo675106822";
    	$password   = "#OjN8LDgFs1TW0X6";

		try{
			$db = new PDO('mysql:host='.$host_name.';dbname='.$database.'',$user_name,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
			session_start();
		}catch(Exception $e){

			echo'error '.$e->getMessage();
		}




?>

