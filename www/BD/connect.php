<?php
date_default_timezone_set('Europe/Paris');
if(!isset($file)){
	$file = "";
}

function connect_bd(){
		try{
			$connexion = new PDO("sqlite:../" . $GLOBALS['file'] . "BD.sqlite3");
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
			//echo "sqlite:../" . $GLOBALS['file'] . "BD.sqlite3 ?= ";
		}
		catch(PDOException $e){
			printf("Échec connexion : %s\n", $e->getMessage());
			exit();
		}
	if($connexion == false){
	   //echo "your not linked with data base";
	}else{
		 //echo "your linked with data base";
	}
	return $connexion;
}
?>
