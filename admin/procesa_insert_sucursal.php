<?php

if(count($_POST)>0)
{    
     $conexion = require_once("mysql.lib.php");
      $mysqli = conectar();

     $Id = $_POST['Id'];
     $Cant_inv = $_POST['Cant_inv'];
     $Id_suc = $_POST['Id_suc'];
     $Id_prod = $_POST['Id_prod'];
 
     $query = "INSERT INTO inventario (Id,Cant_inv,Id_suc,Id_prod)
     VALUES ('$Id','$Cant_inv','$Id_suc','$Id_prod')";
 
     if (mysqli_query($mysqli, $query)) {
        $msg = 1;
     } else {
        $msg = 4;
     }

}
switch ($Id_suc) {
   case '1':
      header ("Location: makeupgoldqueretaro.php?msg=".$msg."");
      break;
   case '2':
      header ("Location: makeupgoldmichoacan.php?msg=".$msg."");
      break;
   case '3':
      header ("Location: makeupgoldpuebla.php?msg=".$msg."");
      break;            
   default:
      echo "ocurrio algo";
      break;
}
?>