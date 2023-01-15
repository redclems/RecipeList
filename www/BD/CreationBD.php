<?php
require("./BD/connect.php");

try{
  $file_db=connect_bd();



  $file_db->exec("create table if not exists PERMISSION
  (
    id number(5),
    wording VarChar2(20),
    primary key (id)
  );");

  $file_db->exec("create table if not exists ACTION
  (
    id number(5),
    wording VarChar2(20),
    primary key (id)
  );");

  $file_db->exec("create table if not exists USER
  (
    email VarChar2(25),
    password VarChar2(150),
    name VarChar2(20),
    surName VarChar2(20),
    dateBirth date,
    urlImage VarChar2(200),
    idPermission number(5),
    primary key (email),
    foreign key (idPermission) REFERENCES PERMISSION(id)
  );
  ");

// LIST

  $file_db->exec("create table if not exists LIST
  (
    id number(10),
    name VarChar2(20),
    idCreator VarChar2(25),
    primary key (id),
    foreign key (idCreator) REFERENCES USER(email)
  );");

  $file_db->exec("create table if not exists YOURLIST
  (
    idListe number(10),
    idUser VarChar2(25),
    primary key (idListe, idUser),
    foreign key (idUser) REFERENCES USER(email),
    foreign key (idListe) REFERENCES LIST(id)
  );");

// Object
  $file_db->exec("create table if not exists TYPE
  (
    id number(5),
    name VarChar2(20),
    urlImage VarChar2(200),
    primary key (id)
  );");

  $file_db->exec("create table if not exists OBJECT
  (
    id number(20),
    name VarChar2(20),
    urlImage VarChar2(200),
    idType number(5),
    primary key (id),
    foreign key (idType) REFERENCES TYPE(id)
  );");

  $file_db->exec("create table if not exists LISTCONTAIN
  (
    idList number(10),
    idObject number(5),
    amount number(5),
    primary key (idList, idObject),
    foreign key (idList) REFERENCES LIST(id),
    foreign key (idObject) REFERENCES OBJECT(id)
  );");

// Recipe
  $file_db->exec("create table if not exists UNIT
  (
    id number(5),
    wording VarChar2(20),
    primary key (id)
  );");

  $file_db->exec("create table if not exists TYPESTEP
  (
    id number(5),
    wording VarChar2(20),
    primary key (id)
  );");

  $file_db->exec("create table if not exists STEP
  (
    id number(20),
    idTypeStep number(5),
    request VarChar2(200),
    primary key (id, idTypeStep),
    foreign key (idTypeStep) REFERENCES TYPESTEP(id)
  );");

  $file_db->exec("create table if not exists RECIPE
  (
    id number(10),
    idCreator VarChar2(20),
    duration time,
    nbPiece number(2),
    urlImage VarChar2(200),
    visible bit,
    primary key (id),
    foreign key (idCreator) REFERENCES USER(email)
  );");


  $file_db->exec("create table if not exists LISTSTEP
  (
    idRecipe number(10),
    idStep number(20),
    orderStep number(2),
    primary key (idRecipe, idStep),
    foreign key (idRecipe) REFERENCES RECIPE(id),
    foreign key (idStep) REFERENCES STEP(id)
  );");

  $file_db->exec("create table if not exists INGREDIENTS
  (
    idRecipe number(10),
    idObject number(20),
    amount number(5),
    idUnit number(5),
    primary key (idRecipe, idObject),
    foreign key (idRecipe) REFERENCES RECIPE(id),
    foreign key (idObject) REFERENCES OBJECT(id),
    foreign key (idUnit) REFERENCES UNIT(id)
  );");

  $file_db->exec("create table if not exists HISTORIC
  (
    idUser VarChar2(25),
    date date,
    idAction number(5),
    idListEdit number(10),
    idRecipeEdit number(10),
    primary key (idUser, date),
    foreign key (idUser) REFERENCES USER(email),
    foreign key (idAction) REFERENCES ACTION(id),
    foreign key (idListEdit) REFERENCES LIST(id),
    foreign key (idRecipeEdit) REFERENCES RECIPE(email)
  );");

  $file_db->exec("create table if not exists STOCK
  (
    id number(20),
    idCreator VarChar2(20),
    primary key (id),
    foreign key (idCreator) REFERENCES USER(email)
  );");

  $file_db->exec("create table if not exists STOCKCONTAIN
  (
    idObject number(20),
    idStock number(20),
    date date,
    primary key (idObject, idStock),
    foreign key (idStock) REFERENCES STOCK(id),
    foreign key (idObject) REFERENCES OBJECT(id)
  );");




  echo "Data base was creat!";
  // on ferme la connexion
  $file_db=null;

}
catch(PDOException $ex){
  echo $ex->getMessage();
}

//require("./BD/InsertionBD.php");
