<?php
if(count($_POST)>0)
{    
      $conexion = require_once("mysql.lib.php");
      $mysqli = conectar();

     $Id = $_POST['Id'];
     $Nom_prod = $_POST['Nom_prod'];
     $Marca_prod = $_POST['Marca_prod'];
     $Cost_prod = $_POST['Cost_prod'];
     $Caract_prod = $_POST['Caract_prod'];
     $Id_categoria = $_POST['Id_categoria'];
     $URLIMG = $_POST['URLIMG'];
 
     $query = "INSERT INTO producto VALUES ('$Id','$Nom_prod','$Marca_prod','$Cost_prod','$Caract_prod', '$Id_categoria','$URLIMG')";
 
     if (mysqli_query($mysqli, $query)) {
        $msg = 1;
     } else {
        $msg = 4;
     }
}
  header ("Location: producto.php?msg=".$msg."");
?>