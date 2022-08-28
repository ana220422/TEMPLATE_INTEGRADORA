<?php

if(count($_POST)>0){

$conexion = require_once("mysql.lib.php");
$mysqli = conectar();

$query = "UPDATE usuario set Id='" . $_POST['Id'] . "', Nombre_usuario='" . $_POST['Nombre_usuario'] . "' WHERE Id='" . $_POST['Id'] . "'"; // update form data from the database

 if (mysqli_query($mysqli, $query)) {
    $msg = 2;
 } else {
    $msg = 4;
 }

}

header ("Location:usuarios.php?msg=".$msg."");

?>