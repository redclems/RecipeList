<?php
require("./www/BD/connect.php");
date_default_timezone_set('Europe/Paris');
try{
  // le fichier de BD s'appellera contacts.sqlite3
  $file_db=new PDO('sqlite:BD.sqlite3');
  $file_db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);

  $file_db->exec("create table if not exists USER
  (
    email VarChar2(25),
    password VarChar2(20),
    name VarChar2(20),
    surName VarChar2(20),
    dateBirth date,
    urlImage VarChar2(200),
    idPermission number(5),
    primary key (email)
  );");

  $file_db->exec("create table if not exists HISTORICALLIST
  (
    idUser VarChar2(25),
    date date,
    idAction number(5),
    idListEdit number(10),
    primary key (idUser, date)
  );");

  $file_db->exec("create table if not exists HISTORICALRECIPE
  (
    idUser VarChar2(25),
    date date,
    idAction number(5),
    idRecipeEdit number(10),
    primary key (idUser, date)
  );");

  $file_db->exec("create table if not exists ACTION
  (
    id number(5),
    wording VarChar2(20),
    primary key (id)
  );");

  $file_db->exec("create table if not exists PERMISSION
  (
    id number(5),
    wording VarChar2(20),
    primary key (id)
  );");
// LIST

  $file_db->exec("create table if not exists YOURLIST
  (
    idListe number(5),
    idUser VarChar2(25),
    primary key (idListe, idUser)
  );");

  $file_db->exec("create table if not exists LIST
  (
    id number(10),
    name VarChar2(20),
    primary key (id)
  );");

  $file_db->exec("create table if not exists CONTAIN
  (
    idList number(5),
    idObject number(5),
    amount number(5),
    primary key (idList, idObject)
  );");

// Object
  $file_db->exec("create table if not exists OBJECT
  (
    id number(20),
    name VarChar2(20),
    urlImage VarChar2(200),
    idType number(5),
    primary key (id)
  );");

  $file_db->exec("create table if not exists TYPE
  (
    id number(5),
    wording VarChar2(20),
    urlImage VarChar2(200),
    primary key (id)
  );");

// Recipe
  $file_db->exec("create table if not exists RECIPE
  (
    id number(10),
    creator VarChar2(20),
    duration time,
    nbPiece number(2),
    urlImage VarChar2(200),
    visible bit,
    primary key (id)
  );");

  $file_db->exec("create table if not exists INGREDIENTS
  (
    idRecipe number(10),
    idObject number(20),
    amount number(5),
    idUnit number(5),
    primary key (idRecipe, idObject)
  );");

  $file_db->exec("create table if not exists UNIT
  (
    id number(5),
    wording VarChar2(20),
    primary key (id)
  );");


  $file_db->exec("create table if not exists LISTSTEP
  (
    idRecipe number(10),
    idStep number(20),
    order number(2),
    primary key (idRecipe, idStep)
  );");

  $file_db->exec("create table if not exists STEP
  (
    id number(20),
    idStep number(20),
    request VarChar2(200),
    primary key (idRecipe, idStep)
  );");

  $file_db->exec("create table if not exists TYPESTEP
  (
    id number(5),
    wording VarChar2(20),
    primary key (id)
  );");


  echo "Insertion en base reussie !";
  // on ferme la connexion
  $file_db=null;
}
catch(PDOException $ex){
  echo $ex->getMessage();
}
