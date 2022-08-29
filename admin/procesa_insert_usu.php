<?php
if(count($_POST)>0)
{    
      $conexion = require_once("mysql.lib.php");
      $mysqli = conectar();

     $Id = $_POST['Id'];
     $Nombre_usuario = $_POST['Nombre_usuario'];
     $passwordU = $_POST['passwordU'];
     $Tipo = $_POST['Tipo'];
 
     $query = "INSERT INTO usuario VALUES ('$Id','$Nombre_usuario','$passwordU','$Tipo')";
 
     if (mysqli_query($mysqli, $query)) {
        $msg = 1;
     } else {
        $msg = 4;
     }
}
  header ("Location: usuarios.php?msg=".$msg."");
?>