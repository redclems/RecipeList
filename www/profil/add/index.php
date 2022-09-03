<?php
$sousTitre = " ";
$file = "../../";
session_start();
//add

require($file . "BD/function/User.php");

//require_once("util/topIndex.php"); not use for this part
if(!empty($_POST)){
  if(isset($_POST["email"]) && !empty($_POST["email"])){
    if(isset($_POST["prenom"]) && !empty($_POST["prenom"])){
      if( isset($_POST["nom"]) && !empty($_POST["nom"])){
        if( isset($_POST["dateBirth"]) && !empty($_POST["dateBirth"])){
          if( isset($_POST["pass"]) && !empty($_POST["pass"])){
            if( isset($_POST["passVerif"]) && !empty($_POST["passVerif"])){
              if($_POST["pass"] == $_POST["passVerif"]){
                if(!verifUserExist($_POST["email"])){
                  if( isset($_FILES["imgProfil"]) && !empty($_FILES["imgProfil"])){
                  // date == 2022-08-09
                  $_SESSION['profilIMG'] = NULL;
                  $res = newProfil($_POST["email"], $_POST["pass"], $_POST["prenom"], $_POST["nom"], $_POST["dateBirth"]);
                  if($res){
                    $success = "Compte créer";
                    $_SESSION['profil'] = $_POST["email"];

                      //echo "image set -";
                      if ($_FILES['imgProfil']['size'] <= 1000000){//1 Mega octet
                        $fileInfo = pathinfo($_FILES['imgProfil']['name']);
                        $extension = $fileInfo['extension'];

                        $filename = $_FILES["imgProfil"]["name"];
                        $tempname = $_FILES["imgProfil"]["tmp_name"];
                        $folder = "/image/profilPP/" . $_POST["email"] . "-PP." . $extension;

                        $allowedExtensions = ['png', 'jpg', 'jpeg'];
                        if (in_array($extension, $allowedExtensions)){

                          $res = editImageProfil($_POST["email"], $folder, $tempname, $file);
                          $_SESSION['profilIMG'] = imageProfil($_SESSION["profil"])["urlImage"];
                        }else{
                          $error = "erreur de lecture format pas reconus";
                        }
                      }else{
                        $error = "image trop volumineux (il faut un fichier de taille inferieur 1Mo)";
                      }
                    }else{
                      $error = "image pas charger file ,";
                    }

                    echo '<meta http-equiv="refresh" content="0; URL=\'/\'">';

                  }else{
                    $error = "Un probléme est survenus";
                  }
                }else{
                  $error = "Cette adresse email existe déjas";
                }
              }else{
                $error = "Mot de passe différent";
              }
            }else{
              $error = "Champ de verification du mot de passe non renseigner";
            }
          }else{
            $error = "Champ mot de passe non renseigner";
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
  }else{
    $error = "Champ Mail non renseigner";
  }
}

require_once("../../vues/profil/v_newProfil.php");

//require_once("vues/v_footer.php"); not use for this part
