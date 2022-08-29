<?php


// include 'mydbCon.php';
$conexion = require_once("mysql.lib.php");
$mysqli = conectar();


$mysqli -> autocommit(FALSE);

// Insert some values
$mysqli -> query("DELETE FROM inventario WHERE Id='" . $_GET["Id"] . "'");

if (!$mysqli -> commit()) {
  echo "Confirmar transacción fallida";
  exit();
}

header ("Location: categorias.php?msg=".$msg."");


?>



// $query = "DELETE FROM categoria WHERE Id='" . $_GET["Id"] . "'"; // Eliminar datos de la categoria usando el Id

//  if (mysqli_query($mysqli, $query)) {
//     $msg = 3;
//  } else {
//     $msg = 4;
//  }

