<?php
require($file . "BD/connect.php");

function newItem($att_email, $att_password, $att_name, $att_surName, $att_dateBirth){
  $file_db=connect_bd();

  $att_password = hashUser($att_password);

  try {

    $insert="INSERT INTO USER (email, password, name, surName, dateBirth, idPermission) VALUES (:email, :password, :name, :surName, :dateBirth, :idPermission);";
    $stmt=$file_db->prepare($insert);
    // on lie les parametres aux variables
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':password',$password);
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':surName',$surName);
    $stmt->bindParam(':dateBirth',$dateBirth);
    $stmt->bindParam(':idPermission',$idPermission);

    $email    = $att_email;
    $password = $att_password;
    $name     = $att_name;
    $surName  = $att_surName;
    $dateBirth= $att_dateBirth;
    $idPermission= 1;

    $stmt->execute();

  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    return false;
  }

  return true;
}

function profil($att_email){
  $file_db=connect_bd();

  //echo $att_email . " pass : " . $att_password . " ";

  try {
    $stmt = $file_db->prepare("SELECT DISTINCT email, name, surName, dateBirth, idPermission from USER WHERE email = :email;");
    $stmt->bindParam(':email', $att_email);
    $stmt->execute();

    $util = $stmt->fetch();

    if(isset($util) && $util != false){
      //echo "pass Requete " . $util["password"] . " ";

      return $util;
    }
  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  return false;
}

function editProfil($att_email, $att_name, $att_surName, $att_dateBirth){
  $file_db=connect_bd();

  try {

    $stmt = $file_db->prepare("UPDATE USER SET name = :name , surName = :surName, dateBirth = :dateBirth WHERE email = :email ;");
    // on lie les parametres aux variables
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':surName',$surName);
    $stmt->bindParam(':dateBirth',$dateBirth);

    //echo "$att_email, $att_name, $att_surName, $att_dateBirth";
    $email    = $att_email;
    $name     = $att_name;
    $surName  = $att_surName;
    $dateBirth= $att_dateBirth;

    $stmt->execute();

  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    return false;
  }

  return true;
}
function editImageProfil($att_email, $att_folder, $att_fileData, $att_file){
  $file_db=connect_bd();

  try {

    $stmt = $file_db->prepare("UPDATE USER SET urlImage = :urlImage WHERE email = :email ;");
    // on lie les parametres aux variables
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':urlImage',$urlImage);

    //echo "$att_email, $att_name, $att_surName, $att_dateBirth";
    $email    = $att_email;
    $urlImage = $att_folder;

    $stmt->execute();

  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    return false;
  }
  //echo $att_folder . " - ";

  $folder = $att_file . $att_folder;

  //echo $att_folder;

  if (move_uploaded_file($att_fileData, $folder)) {
      //echo " / Image uploaded successfully!";
  } else {
      //echo "Image uploaded error!";
      return false;
  }

  return true;
}

function imageProfil($att_email){
  $file_db=connect_bd();

  //echo $att_email . " pass : " . $att_password . " ";

  try {
    $stmt = $file_db->prepare("SELECT DISTINCT urlImage from USER WHERE email = :email;");
    $stmt->bindParam(':email', $att_email);
    $stmt->execute();

    $util = $stmt->fetch();

    if(isset($util) && $util != false){
      //echo "pass Requete " . $util["password"] . " ";

      return $util;
    }
  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  return false;
}

function editPassword($att_email, $att_password, $att_newPassword){
  $file_db=connect_bd();

  if(VerifConnect($att_email, $att_password)){

    $att_newPassword = hashUser($att_newPassword);

    try {

      $stmt = $file_db->prepare("UPDATE USER SET password = :password WHERE email = :email ;");
      $stmt->bindParam(':email', $att_email);
      $stmt->bindParam(':password', $att_newPassword);

      $stmt->execute();

    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
      return false;
    }
    return true;
  }

  return false;
}

function VerifConnect($att_email, $att_password){
  $file_db=connect_bd();

  //echo $att_email . " pass : " . $att_password . " ";

  try {
    $stmt = $file_db->prepare("SELECT DISTINCT password from USER WHERE email = :email;");
    $stmt->bindParam(':email', $att_email);
    $stmt->execute();

    $util = $stmt->fetch();

    if(isset($util) && $util != false){
      //echo "pass Requete " . $util["password"] . " ";

      if(password_verify($att_password, $util["password"])) {
        return true;
      }
    }
  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  return false;
}

function verifUserExist($att_email){
  $file_db=connect_bd();

  //echo $att_email;

  try {
    $stmt = $file_db->prepare("SELECT DISTINCT password from USER WHERE email = :email;");
    $stmt->bindParam(':email', $att_email);
    $stmt->execute();

    $util = $stmt->fetch();

    if(isset($util) && $util != false){
      //echo "this count exists";
      return true;
    }
  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  return false;
}

function hashUser($pass){
  return password_hash($pass, PASSWORD_DEFAULT);
}

?>
