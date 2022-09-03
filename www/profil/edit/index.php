<?php
$sousTitre = " ";
$file = "../../";
session_start();
//edit
if(isset($_SESSION["profil"])){
  require($file . "BD/function/User.php");

  if(!empty($_POST)){
    if(isset($_POST["email"]) && !empty($_POST["email"])){
      if(verifUserExist($_POST["email"])){
        if($_SESSION["profil"] == $_POST["email"]){
          if(isset($_GET["act"])){
            if($_GET["act"] == "editPass"){
              if(isset($_POST["pass"]) && !empty($_POST["pass"])){
                if(isset($_POST["passnew"]) && !empty($_POST["passnew"])){
                  if(isset($_POST["passVerif"]) && !empty($_POST["passVerif"])){
                    if($_POST["passnew"] == $_POST["passVerif"]){
                      $res = editPassword($_POST["email"], $_POST["pass"], $_POST["passnew"]);
                      if($res){
                        $success = "Mot de passe modifier";
                        //echo '<meta http-equiv="refresh" content="0; URL=\'/profil/edit\'">';
                      }else{
                        $error = "Un probléme est survenus";
                      }
                    }else{
                      $error = "Mot de passe différent";
                    }
                  }else{
                    $error = "Champ de verification du mot de passe non renseigner";
                  }
                }else{
                  $error = "le nouveau mot de passe est non renseigner";
                }
              }else{
                $error = "le mot de passe est non renseigner";
              }
            }
          }else{
            if(isset($_POST["prenom"]) && !empty($_POST["prenom"])){
              if( isset($_POST["nom"]) && !empty($_POST["nom"])){
                if( isset($_POST["dateBirth"]) && !empty($_POST["dateBirth"])){
                  $res = editProfil($_POST["email"], $_POST["prenom"], $_POST["nom"], $_POST["dateBirth"]);
                  if($res){
                    $success = "Compte editer";
                    if( isset($_FILES["imgProfil"]) && !empty($_FILES["imgProfil"])){
                      //echo "image set -";
                      if ($_FILES['imgProfil']['size'] <= 1000000){//8 Mega octet
                        $fileInfo = pathinfo($_FILES['imgProfil']['name']);
                        $extension = $fileInfo['extension'];

                        $filename = $_FILES["imgProfil"]["name"];
                        $tempname = $_FILES["imgProfil"]["tmp_name"];
                        $folder = "/image/profilPP/" . $_POST["email"] . "-PP." . $extension;

                        $allowedExtensions = ['png', 'jpg', 'jpeg'];
                        if (in_array($extension, $allowedExtensions)){

                          editImageProfil($_POST["email"], $folder, $tempname, $file);
                          $_SESSION['profilIMG'] = imageProfil($_SESSION["profil"])["urlImage"];
                          echo $_SESSION['profilIMG'];
                        }else{
                          $error = "erreur de lecture format pas reconus";
                        }
                    }else{
                      $error = "image trop volumineux (il faut un fichier de taille inferieur 1Mo)";
                    }
                  }else{
                    $error = "image pas charger file ,";
                  }

                  //echo '<meta http-equiv="refresh" content="0; URL=\'/">';

                }else{
                  $error = "Un probléme est survenus";
                }
              }else{
                $error = "Champ date de naissance non renseigner";
              }
            }else{
              $error = "Champ Nom non renseigner";
            }
          }else{
            $error = "Champ Prénom non renseigner";
          }
        }
      }else{
          $error = "Vous n'etes pas connecter avec le bon compte";
        }
      }else{
        $error = "Cette adresse email n'existe pas";
      }
    }else{
      $error = "Champ Mail non renseigner";
    }
  }

  $util = profil($_SESSION["profil"]);
  $imgProfil = imageProfil($_SESSION["profil"]);


  require_once("../../vues/profil/v_editProfil.php");
}else{
  header('HTTP/1.0 404 Not Found');
  echo "404 not found";
  exit;
}


//require_once("vues/v_footer.php"); not use for this part
