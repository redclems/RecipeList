<?php
require($file . "BD/connect.php");

function newList($att_name, $att_emailC){
  $file_db=connect_bd();
  try {

    $insert="INSERT INTO LIST (name, emailCreator) VALUES (:name, :emailCreator);";
    $stmt=$file_db->prepare($insert);
    // on lie les parametres aux variables
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':emailCreator',$emailCreator);

    $name     = $att_name;
    $emailCreator  = $att_emailC;

    $stmt->execute();

  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    return false;
  }

  try {

    $insert="INSERT INTO YOURLIST (idListe, idUser) VALUES (:idListe, :idUser);";
    $stmt=$file_db->prepare($insert);
    // on lie les parametres aux variables
    $stmt->bindParam(':idListe',$idListe);
    $stmt->bindParam(':idUser',$idUser);

    $idListe     = $att_name;
    $emailCreator  = $att_emailC;

    $stmt->execute();

  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    return false;
  }


  return true;
}

function allList($att_emailC){
  $file_db=connect_bd();

  try {
    $stmt = $file_db->prepare("SELECT DISTINCT id, name from LIST WHERE idCreator = :emailC;");
    $stmt->bindParam(':emailC', $att_emailC);
    $stmt->execute();

    $list = $stmt->fetch();

  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  return $list;
}

function delList($idList, $att_emailC){
  $file_db=connect_bd();

  try {
    $stmt = $file_db->prepare("DELETE FROM LIST WHERE idCreator = :emailC and id = :id;");
    $stmt->bindParam(':emailC', $att_emailC);
    $stmt->bindParam(':id', $idList);
    $stmt->execute();

    $list = $stmt->fetch();

  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  return $list;
}

?>
