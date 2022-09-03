<!DOCTYPE html>
<html lang="fr">
<head>
    <?php session_start(); ?>
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
    	<div class="bar1 backroundStyle"></div>
    	<div class="bar2 backroundStyle"></div>
    	<div class="bar3 backroundStyle"></div>
    </div>

    <ul id="sousMenusHeader" class="sousMenus">
      <li class="sousTitleMenus" >
        <a href="/">
          <img src="<?= $file ?>/image/icon/home.svg" title="Retoure a l'accueil">
          <h3>Accueil ?</h3>
        </a>
      </li>

      <li class="sousTitleMenus" >
        <div class="backroundStyle borderMenus"></div>
        <a href="/liste">
          <img src="<?= $file ?>/image/icon/liste.svg" title="Retoure a l'accueil">
          <h3>Liste</h3>
        </a>
      </li>

      <li>
        <ul class="sousListMenus">
          <li class="hoverStyle"><a href="#">○ Liste 1</a></li>
          <li class="hoverStyle"><a href="#">○ Liste 2</a></li>
        </ul>
      </li>

      <div class="backroundStyle borderMenus"></div>
      <li class="sousTitleMenus profilHeaderLeft" >
        <a href="/profil">
          <img class="" src="<?php echo $file . '/image/icon/compte.svg'; ?>" title="Informations du compte">
          <h3>Profil</h3>
        </a>
      </li>

      <li class="profilHeaderLeft">
        <ul class="sousListMenus">
          <?php
          if (!isset($_SESSION['profil'])) { ?>
            <li class="hoverStyle"><a href="/profil">Connexion</a></li>
            <li class="hoverStyle"><a href="/profil/add">Créer un compte</a></li>
          <?php } else { ?>
            <li class="hoverStyle"><a href="/profil/edit">Modifier le profil</a></li>
            <li class="hoverStyle"><a href="/profil?act=disconnect">Se déconnecter</a></li>
        <?php } ?>
        </ul>
      </li>
    </ul>
  </div>
  <div class="searchBorderColored backroundStyle">
    <div class="searchBar">
      <form class="recherche" id="formRecherche" method="GET" action="">
        <input type="text" placeholder="Rechercher une recette" id="search" name="search" value="<?php echo (isset($_GET['search']) ? $_GET['search'] : '') ?>">
        <input id="magnifyingGlass" type="image" src="<?= $file ?>/image/icon/magnifyingGlass.svg" alt="Submit">
      </form>
    </div>
  </div>

  <?php
  if (!isset($_SESSION['profil'])) { ?>
    <a href="/profil" class="connexion backroundStyle">
        Connexion
    </a>
  <?php } else { ?>
    <div class="profil">
      <nav class="profilEdit">
        <ul>
          <li class="deroulant">
            <a href="#">
              <div class="deroulantflex">
                <img class="profilHEADER infosCompte" src="<?php echo $file; if (isset($_SESSION['profilIMG'])) { echo $_SESSION['profilIMG']; }else{ echo '/image/icon/compte.svg'; } ?>" title="Informations du compte">
                <div class="titleDeroulant">
                  <p>Profil</p>
                  <div class="backroundStyle"></div>
                </div>
              </div>
            </a>
            <div class="sous backroundStyle">
              <ul>
                <?php if (isset($_SESSION['profil'])) { ?><li class="hoverStyle"><a href="#"> <?= $_SESSION['profil']; ?></a></li><?php } ?>
                <li class="hoverStyle"><a href="/profil/edit">Modifier le profil</a></li>
                <li class="hoverStyle"><a href="/profil?act=disconnect">Se déconnecter</a></li>
              <ul>
            </div>
          </li>
        </ul>
      </nav>
    </div>
  <?php } ?>

</header>
