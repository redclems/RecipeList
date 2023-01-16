
<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Créer un compte</title>
		<link rel="stylesheet" type="text/css" href="<?= $file ?>style/connexion.css">
    <link rel="stylesheet" type="text/css" href="<?= $file ?>style/formulaire.css">
    <meta charset="UTF-8">

    <script type='text/javascript' src='//code.jquery.com/jquery-1.9.1.js'></script>
    <script type='text/javascript'>//<![CDATA[
    $(window).load(function(){
        function readURL(input) {
            if (input.files && input.files[0]) {
              if(input.files[0].size > 1000000){
                document.getElementById("errorPP").innerHTML = "fichier trop volumineux (il faut un fichier de taille inferieur 1Mo)";
              }else{
                document.getElementById("errorPP").innerHTML = "";
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
              }
            }
        }

        $("#imgProfil").change(function(){
            readURL(this);
        });
    });//]]>

    </script>

    <script type='text/javascript'>//use for passVerif

      function verifPassword(){
        pasword = document.getElementById('pass');
        verifPasword = document.getElementById('passVerif');
        erreur = document.getElementById('errorPass');
        msg = "";

        if(pasword.value != verifPasword.value){
          msg = "Mot de passe différent.";
        }
        erreur.innerText = msg;
      }
    </script>

</head>
	<body>
		<form action="/profil/add/" method="post" class="center" enctype="multipart/form-data">
      <h1>Créer un compte RecipeList</h1>

      <?php if (isset($error)) { ?>
      <p class="error" id="errorPass"><?= $error ?></p>
      <?php } ?>

      <?php if (isset($success)) { ?>
      <p class="success"><?= $success ?></p>
      <?php } ?>

      <p>
        <div class="flex-column">
          <img class="center3 imgForProfil profilGrand label-file" id="blah" src="#" alt="" />
          <label for="imgProfil" class="center3 label-file button label">Image de profil</label>
          <input id="imgProfil" accept="image/jpeg image/x-png" class="center3 input imput-file" type="file" name="imgProfil" />
          <p class="error" id="errorPP"></p>
        </div>
      </p>

			<p>
				<label class="label" for="userEmail">Email utilisateur</label>
				<div>
					<input class="input" id="userEmail" placeholder="Email utilisateur" type="email" value="<?php if(isset($_POST["email"])){ echo $_POST["email"]; } ?>" name="email" required/>
				</div>
			</p>
      <p>
        <label class="label" for="prenom">Prénom</label>
        <div>
          <input class="input" id="prenom" placeholder="Prénom" type="text" value="<?php if(isset($_POST["prenom"])){ echo $_POST["prenom"]; } ?>" name="prenom" required />
        </div>
      </p>
      <p>
        <label class="label" for="nom">Nom</label>
        <div>
          <input class="input" id="nom" placeholder="Nom" type="text" value="<?php if(isset($_POST["nom"])){ echo $_POST["nom"]; } ?>" name="nom" required />
        </div>
      </p>
      <p>
        <label class="label" for="dateBirth">Date de naissance</label>
        <div>
          <input class="input" id="dateBirth" type="date" value="<?php if(isset($_POST["dateBirth"])){ echo $_POST["dateBirth"]; } ?>" name="dateBirth" required  />
        </div>
      </p>
			<p>
				<label class="label" for="pass">Mot de passe</label>
				<div class="flex">
					<input id="pass" minlength="5" placeholder="Mot de passe" class="input" type="password" value="" name="pass" required />
				</div>
			</p>
      <p>
        <label class="label" for="passVerif">Vériffication du mot de passe</label>
        <div class="flex">
          <input id="passVerif" onchange="verifPassword()" placeholder="Vériffication du mot de passe" class="input" type="password" value="" name="passVerif" required />
        </div>
        <p class="error" id="errorPass"></p>
      </p>
      <div class="flex">
  			<p>
  				<button type="submit" class="reinitialise button">Créer</button>
  			</p>
        <p>
          <a href="/" class="reinitialise button back">Revenir à l'accueil</a>
        </p>
      </div>
		</form>
	</body>
</html>
