<?php

function connect_bd(){
		try{
			$connexion = new PDO("sqlite:../BD.sqlite3");
		}
		catch(PDOException $e){
			printf("Échec connexion : %s\n", $e->getMessage());
			exit();
		}
	return $connexion;
}
?>
