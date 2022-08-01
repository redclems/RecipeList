<!DOCTYPE html>
<html lang="fr">
<head>
    <title><?= $sousTitre ?></title>
    <link rel="stylesheet" type="text/css" href="<?= $file ?>/style/header.css">

    <meta charset="UTF-8">
</head>

<!-- top of the header with menus button, search bar and the image of profil-->
<header>
  <div class="menus">
    <script src="<?= $file ?>/script/burger.js" async></script>
    <link rel="stylesheet" type="text/css" href="<?= $file ?>/style/headerLeft.css">

    <div id="buttonMenu">
    	<div class="bar1"></div>
    	<div class="bar2"></div>
    	<div class="bar3"></div>
    </div>

    <ul id="sousMenusHeader" class="sousMenus">
      <li class="sousTitleMenus" >Liste :</li>
      <li>
        <ul class="sousListMenus">
          <li><a href="#">Liste 1</a></li>
          <li><a href="#">Liste 2</a></li>
        </ul>
      </li>
      <li class="sousTitleMenus profilHeaderLeft" >Profil :</li>
      <li class="profilHeaderLeft">
        <ul class="sousListMenus">
          <li><a href="#">Modifier le profil</a></li>
          <li><a href="#">Se déconnecter</a></li>
        </ul>
      </li>
    </ul>
  </div>

  <div class="searchBar">
    <form class="recherche" id="formRecherche" method="GET" action="">
      <input type="text" placeholder="Rechercher une recette" id="search" name="search" value="<?php echo (isset($_GET['search']) ? $_GET['search'] : '') ?>">
      <input id="magnifyingGlass" type="image" src="<?= $file ?>/image/icon/magnifyingGlass.svg" alt="Submit">
    </form>
  </div>

  <?php
  if ( isset($_SESSION['profil'])) { ?>
    <div>
      <nav class="profilEdit connexion">
        <ul>
          <li class="deroulant">
            <a href="#">
              <div class="deroulantflex">
                <p>Connexion</p>
              </div>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  <?php } else { ?>
    <div class="profil">
      <nav class="profilEdit">
        <ul>
          <li class="deroulant">
            <a href="#">
              <div class="deroulantflex">
                <img class="profilHEADER infosCompte" src="<?= $file ?>/image/<?php if (isset($_SESSION['profilIMG'])) { echo $_SESSION['profilIMG']; }else{ echo 'icon/compte.svg'; } ?>" title="Informations du compte">
                <p><?php if (isset($_SESSION['profil'])) { echo $_SESSION['profil']; }else{ echo 'Profil'; } ?></p>
              </div>
            </a>
            <ul class="sous">
              <li><a href="#">Modifier le profil</a></li>
              <li><a href="#">Se déconnecter</a></li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  <?php } ?>

</header>
