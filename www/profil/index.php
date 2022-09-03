<?php
$sousTitre = " ";
$file = "../";
session_start();

require($file . "BD/function/User.php");

//require_once("util/topIndex.php"); not use for this part

if (!isset($_SESSION['profil'])) {
  if(!empty($_POST)){
    if(isset($_POST["email"]) && !empty($_POST["email"])){
      if( isset($_POST["pass"]) && !empty($_POST["pass"])){
          if(VerifConnect($_POST["email"], $_POST["pass"])){
            $error = "connect";
            //echo $_POST["email"];
            $_SESSION['profil'] = $_POST["email"];
            $_SESSION['profilIMG'] = imageProfil($_POST["email"])["urlImage"];
            //echo "psession ; " . $_SESSION['profil'];
            echo '<meta http-equiv="refresh" content="0; URL=\'/\'">';
          }else{
            $error = "Mot de passe ou Email non valide";
          }
      }else{
        $error = "mot de passe non renseigner";
      }
    }else{
      $error = "Champ Mail non renseigner";
    }
  }else{
    echo "";
  }
  require_once("../vues/profil/v_connexion.php");
}else{
  if(isset($_GET["act"])){
    //echo "<p>act</p>";
    if($_GET["act"] == "disconnect"){
      //echo "<p>disconnect</p>";
      unset($_SESSION["profil"]);
      echo '<meta http-equiv="refresh" content="0; URL=\'/\'">';
    }
  }else{
      $util = profil($_SESSION["profil"]);
      $_SESSION['profilIMG'] = imageProfil($_SESSION["profil"])["urlImage"];
      //echo $_SESSION['profilIMG'];

      require_once("../vues/profil/v_profil.php");
  }
}

//require_once("vues/v_footer.php"); not use for this part
