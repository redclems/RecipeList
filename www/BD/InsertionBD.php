<?php

  require("./BD/connect.php");

try{
  $file_db=connect_bd();
// Insertion des utilisateurs

  $utilisateur=array(
		  array('email' => "clement.guerin27@free.fr",
			'password' => password_hash("azerty", PASSWORD_DEFAULT),
			'name' =>  "red",
      'surName' =>  "clem",
      'dateBirth' =>  "2002-01-27",
      'idPermission' =>  2),
		  array('email' => "redclems@gmail.com",
			'password' => password_hash("azerty", PASSWORD_DEFAULT),
			'name' =>  "admin",
      'surName' =>  "admin",
      'dateBirth' =>  "2022-07-10",
      'idPermission' =>  2)
		  );

  $insert="INSERT INTO USER (email, password, name, surName, dateBirth, idPermission) VALUES (:email, :password, :name, :surName, :dateBirth, :idPermission);";
  $stmt=$file_db->prepare($insert);
  // on lie les parametres aux variables
  $stmt->bindParam(':email',$email);
  $stmt->bindParam(':password',$password);
  $stmt->bindParam(':name',$name);
  $stmt->bindParam(':surName',$surName);
  $stmt->bindParam(':dateBirth',$dateBirth);
  $stmt->bindParam(':idPermission',$idPermission);

  foreach ($utilisateur as $u){
    $email    =$u['email'];
    $password =$u['password'];
    $name     =$u['name'];
    $surName  =$u['surName'];
    $dateBirth=$u['dateBirth'];
    $idPermission=$u['idPermission'];
    $stmt->execute();
  }
  echo "Insertion en base reussie !";
  // on ferme la connexion
  $file_db=null;
}
catch(PDOException $ex){
  echo $ex->getMessage();
}
