<!DOCTYPE html>
<html lang="fr">
<head>
    <title><?= $sousTitre ?></title>
    <link rel="stylesheet" type="text/css" href="style/header.css">
    <meta charset="UTF-8">
</head>

<!-- top of the header with menus button, search bar and the image of profil-->
<header>
	<div class="menus">
		<a class="linkButton" href="#"><img class="button" src="<?= $file ?>/image/icon/menu.svg"></a>
	</div>
  <div class="searchBar">
    <form class="recherche" id="formRecherche" method="GET" action="">
      <input type="text" placeholder="Rechercher une recette" id="search" name="search" value="<?php echo (isset($_GET['search']) ? $_GET['search'] : '') ?>">
      <input id="magnifyingGlass" type="image" src="<?= $file ?>/image/icon/magnifyingGlass.svg" alt="Submit">
    </form>
  </div>

  <?php
  $val = FALSE;
  if (isset($_SESSION['profil'])) { ?>
    <div>
      <nav class="profilEdit connexion">
        <ul>
          <li class="deroulant">
            <a href="#">
              <div class="deroulantflex">
                <img class="profilHEADER infosCompte" src="<?= $file ?>/image/<?php if (isset($_SESSION['profilIMG'])) { echo $_SESSION['profilIMG']; }else{ echo 'icon/compte.svg'; } ?>" title="Informations du compte">
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
