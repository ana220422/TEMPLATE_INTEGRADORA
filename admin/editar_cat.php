<?php

if(count($_POST)>0){

$conexion = require_once("mysql.lib.php");
$mysqli = conectar();

$query = "UPDATE categoria set Id='" . $_POST['Id'] . "', Nombre_cat='" . $_POST['Nombre_cat'] . "' WHERE Id='" . $_POST['Id'] . "'"; // update form data from the database

 if (mysqli_query($dbCon, $query)) {
    $msg = 2;
 } else {
    $msg = 4;
 }

}

header ("Location:categorias.php?msg=".$msg."");

?>