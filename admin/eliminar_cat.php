<?php


// include 'mydbCon.php';
$conexion = require_once("mysql.lib.php");
$mysqli = conectar();

$query = "DELETE FROM categoria WHERE Id='" . $_GET["Id"] . "'"; // Eliminar datos de la categoria usando el Id

 if (mysqli_query($mysqli, $query)) {
    $msg = 3;
 } else {
    $msg = 4;
 }

header ("Location: categorias.php?msg=".$msg."");


?>