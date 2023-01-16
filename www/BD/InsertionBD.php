<?php

  require("./BD/connect.php");

try{
  $file_db=connect_bd();
// Insertion des utilisateurs

$permission=array(
    array('id' => 1,
    'wording' => "user"
    ),
    array('id' => 2,
    'wording' => "modo"
    ),
    array('id' => 3,
    'wording' => "creator"
    ),
    array('id' => 4,
    'wording' => "admin"
    ));

$insert="INSERT INTO PERMISSION (id, wording) VALUES (:id, :wording);";
$stmt=$file_db->prepare($insert);
// on lie les parametres aux variables
$stmt->bindParam(':id',$id);
$stmt->bindParam(':wording',$wording);

foreach ($permission as $u){
  $id    =$u['id'];
  $wording =$u['wording'];
  $stmt->execute();
}

//----------------------------------------------------------------------------

$action=array(
    array('id' => 1,
    'wording' => "delet list"
    ),
    array('id' => 2,
    'wording' => "edit list"
    ),
    array('id' => 3,
    'wording' => "add list"
    ),
    array('id' => 4,
    'wording' => "edit user"
    ),
    array('id' => 5,
    'wording' => "delet user"
    ),
    array('id' => 6,
    'wording' => "add user"
    ),
    array('id' => 7,
    'wording' => "edit user"
    ),
    array('id' => 8,
    'wording' => "edit Pass"
    ),
    array('id' => 9,
    'wording' => "delet recipe"
    ),
    array('id' => 10,
    'wording' => "edit recipe"
    ),
    array('id' => 11,
    'wording' => "add recipe"
    )
  );

$insert="INSERT INTO ACTION (id, wording) VALUES (:id, :wording);";
$stmt=$file_db->prepare($insert);
// on lie les parametres aux variables
$stmt->bindParam(':id',$id);
$stmt->bindParam(':wording',$wording);

foreach ($action as $u){
  $id    =$u['id'];
  $wording =$u['wording'];
  $stmt->execute();
}

//----------------------------------------------------------------------------

  $utilisateur=array(
		  array('email' => "clement.guerin27@free.fr",
			'password' => password_hash("azerty", PASSWORD_DEFAULT),
			'name' =>  "red",
      'surName' =>  "clem",
      'dateBirth' =>  "2002-01-27",
      'idPermission' =>  4),
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


  //----------------------------------------------------------------------------

  $list=array(
		  array('id' => 1,
			'name' => "course 1",
			'creator' =>  "clement.guerin27@free.fr"),
      array('id' => 2,
			'name' => "course 2",
			'creator' =>  "clement.guerin27@free.fr")
		  );

  $insert="INSERT INTO LIST (id, name, idCreator) VALUES (:id, :name, :creator);";
  $stmt=$file_db->prepare($insert);
  // on lie les parametres aux variables
  $stmt->bindParam(':id',$id);
  $stmt->bindParam(':name',$name);
  $stmt->bindParam(':creator',$creator);

  foreach ($list as $u){
    $id        =$u['id'];
    $name      =$u['name'];
    $creator   =$u['creator'];
    $stmt->execute();
  }

  //----------------------------------------------------------------------------

  $youlist=array(
      array('id' => 1,
      'idUser' => "clement.guerin27@free.fr"
      ),
      array('id' => 2,
      'idUser' => "clement.guerin27@free.fr"
      ),
      array('id' => 1,
      'idUser' => "redclems@gmail.com"
      ),
      array('id' => 2,
      'idUser' => "redclems@gmail.com"
      ));

  $insert="INSERT INTO YOURLIST (idListe, idUser) VALUES (:id, :idUser);";
  $stmt=$file_db->prepare($insert);
  // on lie les parametres aux variables
  $stmt->bindParam(':id',$id);
  $stmt->bindParam(':idUser',$idUser);

  foreach ($youlist as $u){
    $id    =$u['id'];
    $idUser =$u['idUser'];
    $stmt->execute();
  }
  //----------------------------------------------------------------------------

  $type=array(
		  array('id' => 1,
			'name' => "Boulangerie",
			'urlImage' =>  "./image/Type/Boulangerie.png"),
      array('id' => 2,
			'name' => "Poisssonnerie",
			'urlImage' =>  "./image/Type/Poisssonnerie.png"),
      array('id' => 3,
			'name' => "Surgelés",
			'urlImage' =>  "./image/Type/Surgeles.png"),
      array('id' => 4,
			'name' => "Epecerie",
			'urlImage' =>  "./image/Type/Epecerie.png"),
      array('id' => 5,
			'name' => "Boucherie",
			'urlImage' =>  "./image/Type/Boucherie.png"),
      array('id' => 6,
			'name' => "Boissons",
			'urlImage' =>  "./image/Type/Boissons.png"),
      array('id' => 7,
			'name' => "Animalerie",
			'urlImage' =>  "./image/Type/Animalerie.png"),
      array('id' => 8,
			'name' => "Epecerie",
			'urlImage' =>  "./image/Type/Epecerie.png"),
      array('id' => 9,
			'name' => "Textile",
			'urlImage' =>  "./image/Type/Textile.png"),
      array('id' => 10,
      'name' => "Legume",
      'urlImage' =>  "./image/Type/Legume.png"),
      array('id' => 11,
      'name' => "Fruit",
      'urlImage' =>  "./image/Type/Fruit.png"),
      array('id' => 12,
      'name' => "Fromagerie",
      'urlImage' =>  "./image/Type/Fromagerie.png")
		  );

  $insert="INSERT INTO TYPE (id, name, urlImage) VALUES (:id, :name, :urlImage);";
  $stmt=$file_db->prepare($insert);
  // on lie les parametres aux variables
  $stmt->bindParam(':id',$id);
  $stmt->bindParam(':name',$name);
  $stmt->bindParam(':urlImage',$urlImage);

  foreach ($type as $u){
    $id         =$u['id'];
    $name       =$u['name'];
    $urlImage   =$u['urlImage'];
    $stmt->execute();
  }

  //----------------------------------------------------------------------------

  $item=array(
		  array('id' => 1,
			'name' => "farine",
			'urlImage' =>  "./image/Item/farine.png",
      'idType' => 4),
      array('id' => 2,
			'name' => "sucre",
			'urlImage' =>  "./image/Item/sucre.png",
      'idType' => 4),
      array('id' => 3,
      'name' => "sel",
      'urlImage' =>  "./image/Item/sel.png",
      'idType' => 4),
      array('id' => 4,
      'name' => "oeuf",
      'urlImage' =>  "./image/Item/oeuf.png",
      'idType' => 4),
      array('id' => 5,
      'name' => "lait",
      'urlImage' =>  "./image/Item/lait.png",
      'idType' => 4),
      array('id' => 6,
      'name' => "eau",
      'urlImage' =>  "./image/Item/eau.png",
      'idType' => 4),
      array('id' => 7,
      'name' => "pain",
      'urlImage' =>  "./image/Item/pain.png",
      'idType' => 1),
      array('id' => 8,
      'name' => "vanille",
      'urlImage' =>  "./image/Item/vanille.png",
      'idType' => 4),
      array('id' => 9,
      'name' => "maïzena",
      'urlImage' =>  "./image/Item/maizena.png",
      'idType' => 4),
      array('id' => 10,
      'name' => "huile d'olive",
      'urlImage' =>  "./image/Item/huileOlive.png",
      'idType' => 4),
      array('id' => 11,
      'name' => "poivre",
      'urlImage' =>  "./image/Item/poivre.png",
      'idType' => 4),
      array('id' => 12,
      'name' => "compte",
      'urlImage' =>  "./image/Item/compte.png",
      'idType' => 4),
      array('id' => 13,
      'name' => "roqueford",
      'urlImage' =>  "./image/Item/roqueford.png",
      'idType' => 4)
		  );

  $insert="INSERT INTO OBJECT (id, name, urlImage, idType) VALUES (:id, :name, :urlImage, :idType);";
  $stmt=$file_db->prepare($insert);
  // on lie les parametres aux variables
  $stmt->bindParam(':id',$id);
  $stmt->bindParam(':name',$name);
  $stmt->bindParam(':urlImage',$urlImage);
  $stmt->bindParam(':idType',$idType);

  foreach ($item as $u){
    $id         =$u['id'];
    $name       =$u['name'];
    $urlImage   =$u['urlImage'];
    $idType     =$u['idType'];
    $stmt->execute();
  }

//list type
  $typeList=array(
      array('id' => 1,
      'wording' => "liste de course"
      ),
      array('id' => 2,
      'wording' => "liste boulangerie"
      ),
      array('id' => 3,
      'wording' => "liste traiteur"
      ),
      array('id' => 4,
      'wording' => "liste boucherie"
      ),
      array('id' => 5,
      'wording' => "liste Poisssonnerie"
      ),
      array('id' => 5,
      'wording' => "liste Primeur"
      )
      );

  $insert="INSERT INTO TYPELIST (id, wording) VALUES (:id, :wording);";
  $stmt=$file_db->prepare($insert);
  // on lie les parametres aux variables
  $stmt->bindParam(':id',$id);
  $stmt->bindParam(':wording',$wording);

  foreach ($typeList as $u){
    $id    =$u['id'];
    $wording =$u['wording'];
    $stmt->execute();
  }

  echo "Insertion en base reussie !";
  // on ferme la connexion
  $file_db=null;
}
catch(PDOException $ex){
  echo $ex->getMessage();
}
