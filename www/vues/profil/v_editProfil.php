
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
        pasword = document.getElementById('passnew');
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
    <div class="center">
  		<form action="/profil/edit/" method="post" enctype="multipart/form-data">
        <h1>Modifier le compte</h1>

        <?php if (isset($error)) { ?>
        <p class="error" ><?= $error ?></p>
        <?php } ?>

        <?php if (isset($success)) { ?>
        <p class="success"><?= $success ?></p>
        <?php } ?>

        <p>
          <div class="flex-column">
            <img class="center3 imgForProfil profilGrand label-file" id="blah" src="<?php if(isset($imgProfil["urlImage"])){ echo $imgProfil["urlImage"] . "?time=" . time(); }else{ echo "#"; }  ?>" alt="" />
            <label for="imgProfil" class="center3 label-file button label">Image de profil</label>
            <input id="imgProfil" accept="image/jpeg image/x-png" class="center3 input imput-file" type="file" name="imgProfil" />
            <p class="error" id="errorPP"></p>
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
            <input class="input" id="prenom" placeholder="Prénom" type="text" value="<?php if(isset($util["name"])){ echo $util["name"]; }  ?>" name="prenom" required />
          </div>
        </p>
        <p>
          <label class="label" for="nom">Nom</label>
          <div>
            <input class="input" id="nom" placeholder="Nom" type="text" value="<?php if(isset($util["surName"])){ echo $util["surName"]; } ?>" name="nom" required />
          </div>
        </p>
        <p>
          <label class="label" for="dateBirth">Date de naissance utilisateur</label>
          <div>
            <input class="input" id="dateBirth" type="date" value="<?php if(isset($util["dateBirth"])){ echo $util["dateBirth"]; } ?>" name="dateBirth" required  />
          </div>
        </p>

        <div class="flex">
    			<p>
    				<button type="submit" class="reinitialise button">Méttre à jour</button>
    			</p>
          <p>
            <a href="/" class="reinitialise button back reinitialise">Revenir à l'accueil</a>
          </p>
        </div>
  		</form>

      <form action="/profil/edit/?act=editPass" method="post">
        <input id="userEmail" placeholder="Email utilisateur" type="hidden" value="<?php if(isset($util["email"])){ echo $util["email"]; } ?>" name="email" readonly required/>

        <h2 class="changer">Changer le mot de passe</h2>
        <p>
          <label class="label" for="pass">Mot de passe</label>
          <div class="flex">
            <input id="pass" minlength="5" placeholder="Mot de passe" class="input" type="password" name="pass" required />
          </div>
        </p>
        <p>
          <label class="label" for="passnew">Nouveu mot de passe</label>
          <div class="flex">
            <input id="passnew" minlength="5" placeholder="Mot de passe" class="input" type="password" name="passnew" required />
          </div>
        </p>
        <p>
          <label class="label" for="passVerif">Nouveu du mot de passe vérification</label>
          <div class="flex">
            <input id="passVerif" onchange="verifPassword()" placeholder="Mot de passe" class="input" type="password" name="passVerif" required />
          </div>
          <p class="error" id="errorPass"></p>
        </p>
        <p>
          <button type="submit" class="reinitialise button">Méttre à jour le mot de passe</button>
        </p>
      </form>
    </div>
	</body>
</html>
