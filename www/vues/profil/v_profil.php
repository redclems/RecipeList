
<!DOCTYPE html>
<html lang="fr">
  <head>
      <title>Profil</title>
  		<link rel="stylesheet" type="text/css" href="<?= $file ?>style/connexion.css">
      <link rel="stylesheet" type="text/css" href="<?= $file ?>style/formulaire.css">
      <meta charset="UTF-8">
  </head>
	<body>
    <div class="center">
  			<h1>Profil RecipeList</h1>

        <?php if (isset($error)) { ?>
        <p class="error" id="errorPass"><?= $error ?></p>
        <?php } ?>

        <p>
          <div class="flex-column">
            <img class="center3 imgForProfil profilGrand" id="blah" src="<?php echo $file; if (isset($_SESSION['profilIMG'])) { echo $_SESSION['profilIMG']; }else{ echo '/image/icon/compte.svg'; } ?>" alt="" />
          </div>
        </p>

  			<p>
  				<label class="label" for="userEmail">Email utilisateur</label>
  				<div>
  					<input class="input" id="userEmail" placeholder="Email utilisateur" type="email" value="<?php if(isset($util["email"])){ echo $util["email"]; } ?>" name="email" readonly required/>
  				</div>
  			</p>
        <p>
          <label class="label" for="prenom">Prénom</label>
          <div>
            <input class="input" id="prenom" placeholder="Prénom" type="text" value="<?php if(isset($util["name"])){ echo $util["name"]; }  ?>" name="prenom" readonly required />
          </div>
        </p>
        <p>
          <label class="label" for="nom">Nom</label>
          <div>
            <input class="input" id="nom" placeholder="Nom" type="text" value="<?php if(isset($util["surName"])){ echo $util["surName"]; } ?>" name="nom" readonly required />
          </div>
        </p>
        <p>
          <label class="label" for="dateBirth">Date de naissance utilisateur</label>
          <div>
            <input class="input" id="dateBirth" type="date" value="<?php if(isset($util["dateBirth"])){ echo $util["dateBirth"]; } ?>" name="dateBirth" readonly required  />
          </div>
        </p>
        <div class="flex">
          <p>
            <a class="reinitialise button" href="/profil/edit">Modifier</a>
          </p>
          <p>
            <a class="reinitialise button back" href="/profil?act=disconnect">Se déconnecter</a>
          </p>
      </div>
      <p>
        <a href="/" class="reinitialise">Revenir à l'accueil</a>
      </p>
    </div>
	</body>
</html>
