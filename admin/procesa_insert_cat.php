<?php
if(count($_POST)>0)
{    
      $conexion = require_once("mysql.lib.php");
      $mysqli = conectar();
     // include 'mydbCon.php';
     $Id = $_POST['Id'];
     $Nombre_cat = $_POST['Nombre_cat'];
 
 $mysqli -> autocommit(FALSE);

// insertar
$mysqli -> query("INSERT INTO categoria (Id,Nombre_cat)
     VALUES ('$Id','$Nombre_cat')");

if (!$mysqli -> commit()) {
   $msg = 1;
  } else {
     $msg = 4;
  }
}

header ("Location: categorias.php?msg=".$msg."");


?>
   