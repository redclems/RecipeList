<?php
require($file . "BD/connect.php");

function newItemInList($att_idList, $att_emailC, ){
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

  return true;
}
?>
