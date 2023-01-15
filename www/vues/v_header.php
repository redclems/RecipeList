<!DOCTYPE html>
<html lang="fr">
<head>
    <?php session_start(); ?>
    <title><?= $sousTitre ?></title>
    <link rel="stylesheet" type="text/css" href="<?= $file ?>/style/header.css">
    <link rel="stylesheet" type="text/css" href="<?= $file ?>/style/centerPage.css">
    <link rel="stylesheet" type="text/css" href="<?= $file ?>/style/note.css">

    <meta charset="UTF-8">
</head>



<!-- top of the header with menus button, search bar and the image of profil-->
<header>
  <div class="menus">
    <script src="<?= $file ?>/script/burger.js" async></script>
    <link rel="stylesheet" type="text/css" href="<?= $file ?>/style/headerLeft.css">

    <div id="buttonMenu">
    	<div class="bar1 "></div>
    	<div class="bar2 "></div>
    	<div class="bar3 "></div>
    </div>


      <ul id="sousMenusHeader" class="sousMenus">
        <li class="sousTitleMenus" >
          <a href="/liste">
            <img src="<?= $file ?>/image/icon/liste.png" title="Retoure a l'accueil">
            <h3>Liste</h3>
          </a>
        </li>

        <li>
          <ul class="sousListMenus">
            <li class=""><a href="#">Liste 1</a></li>
            <li class=""><a href="#">Liste 2</a></li>
            <li class=""><a href="#">Liste 3</a></li>
          </ul>
        </li>

        <!-- _____________________________________ -->

        <li class="sousTitleMenus" >
          <a href="/recipe">
            <img src="<?= $file ?>/image/icon/Recipe.png" title="Retoure a l'accueil">
            <h3>Recette</h3>
          </a>
        </li>

        <li>
          <ul class="sousListMenus">
            <li class=""><a href="#">Mets recette</a></li>
            <li class=""><a href="#">Ajouter une recette</a></li>
          </ul>
        </li>

        <!-- _____________________________________ -->

        <li class="sousTitleMenus" >
          <a href="/frigo">
            <img src="<?= $file ?>/image/icon/Frigo.png" title="Retoure a l'accueil">
            <h3>Mon Frigo</h3>
          </a>
        </li>

        <li>
          <ul class="sousListMenus">
          </ul>
        </li>

        <!-- _____________________________________ -->


        <li class="sousTitleMenus headerLeftHide" >
          <a href="/profil">
            <img class="" src="<?php echo $file . '/image/icon/compte.svg'; ?>" title="Informations du compte">
            <h3>Profil</h3>
          </a>
        </li>

        <li class="headerLeftHide">
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

  <a href="/" class="aNerf"><h2 class="name">RecipeList</h2></a>


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
                </div>
              </div>
            </a>
            <div class="sous backroundStyle">
              <ul>
                <?php if (isset($_SESSION['profil'])) { ?><li class=""><a href="/profil"> <?= $_SESSION['profil']; ?></a></li><?php } ?>
                <li class=""><a href="/profil/edit">Modifier le profil</a></li>
                <li class=""><a href="/profil?act=disconnect">Se déconnecter</a></li>
              <ul>
            </div>
          </li>
        </ul>
      </nav>
    </div>
  <?php } ?>

</header>
<?php if (isset($_SESSION['profil'])) { ?>
<nav class="sousHeader">
   <a href="#"><img class="" src="<?= $file ?>/image/icon/Recipe.png" title="IconRecette"><p>Mets recettes</p></a>
   <a href="#"><img class="" src="<?= $file ?>/image/icon/RecipeADD.png" title="AddIconRecette"><p>Ajouter une recette</p></a>
   <a href="#"><img class="" src="<?= $file ?>/image/icon/Frigo.png" title="IconRecette"><p>Mon frigo</p></a>
   <a href="/liste"><img class="" src="<?= $file ?>/image/icon/liste.png" title="liste"><p>Mets listes</p></a>
</nav>
<?php } ?>
