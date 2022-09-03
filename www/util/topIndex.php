<?php
	//start BD
	require($file . "/BD/connect.php");
	date_default_timezone_set('Europe/Paris');


	//create header
  include $file . '/vues/v_header.php';


	//taille des liste
	$messagesParPage = 25;
?>
