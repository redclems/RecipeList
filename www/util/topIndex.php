<?php
	//start BD
	require($file . "/BD/connect.php");
	date_default_timezone_set('Europe/Paris');


	//create header
  include $file . '/vues/v_header.php';

	session_start();

	//taille des liste
	$messagesParPage = 25;

	//switch to another page if it is stock un the sesion else you go to the home
	function switchPage(){
	  if(!isset($_SESSION['page'])){
	    echo '<meta http-equiv="refresh" content="0; URL=\'' . get_site_url() . '/\'">';
	  }else{
	    echo '<meta http-equiv="refresh" content="0; URL=\'' . get_site_url() . '/' . $_SESSION['pageSuiv'] . '\'">';
	  }
	  //echo "left ?";
	}

	function notHaveRight(){
	  $erreur = "Vous n'avez pas accès à cette partie du site. Vous êtes maintenant à l'accueil";
	  echo '<meta http-equiv="refresh" content="0; URL=\'' . get_site_url() . '/\'">';
	}
?>
