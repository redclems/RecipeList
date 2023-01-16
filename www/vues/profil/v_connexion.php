
<!DOCTYPE html>
<html lang="fr">
  <head>
      <title>Connexion</title>
  		<link rel="stylesheet" type="text/css" href="<?= $file ?>style/connexion.css">
      <link rel="stylesheet" type="text/css" href="<?= $file ?>style/formulaire.css">
      <meta charset="UTF-8">
  	  <script src="<?= $file ?>script/passwordView.js" async></script>
  </head>
	<body>
    <div class="center">
  		<form action="/profil/" method="post">
  			<h1>Connexion RecipeList</h1>

        <?php if (isset($error)) { ?>
        <p class="error" id="errorPass"><?= $error ?></p>
        <?php } ?>

        <?php if (isset($success)) { ?>
        <p class="success"><?= $success ?></p>
        <?php } ?>

  			<p>
          <label class="label" for="userLogin373892JD838js82">Email utilisateur</label>
  				<div>
  					<input class="input" id="userLogin373892JD838js82" placeholder="Email utilisateur" type="email" value="<?php if(isset($_POST["email"])){ echo $_POST["email"]; } ?>" name="email" required/>
  				</div>
  			</p>
  			<p>
          <label class="label" for="userPass373892JD838js82">Mot de passe</label>
  				<div class="flex">
  					<input id="userPass373892JD838js82" minlength="5" placeholder="Mot de passe" class="input" type="password" value="<?php if(isset($_POST["pass"])){ echo $_POST["pass"]; } ?>" name="pass" required />
  					<img width="20px" id="viewIMG" onclick="viewPassword()" src="<?= $file ?>image/icon/eyes.svg" alt="voir le mot de passe">
  				</div>
  			</p>
        <div class="flex">
    			<p>
    				<button type="submit" class="reinitialise button">Se connecter</button>
    			</p>
          <p>
            <a href="/" class="reinitialise button back">Revenir à l'accueil</a>
          </p>
        </div>
  		</form>

      <!--<p>
        <a href="/profil" class="">Mot de passe oublier</a>
      </p>-->
      <p>
        <a href="/profil/add" class="">Créer un compte</a>
      </p>

    </div>
	</body>
</html>
