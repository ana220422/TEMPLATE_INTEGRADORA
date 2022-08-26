<?php 	
$conexion = require_once("mysql.lib.php");
$mysqli = conectar();

extract($_REQUEST); //extrae datos del formulario

// Normalizacion o validacion de datos
if ($accion=="alta" || $accion=="cambiar") {
	

	   $Nombre_prod=mb_strtoupper($Nombre_prod);
 }

// $msgcode=0;


switch ( $accion ) {
case "alta":
        $sql = "SELECT * from producto where Id = '$Id'";
        $rs = query($sql );
        if ($rs->num_rows > 0 ) {
        	//hay duplicado
        	$mysqli = desconectar();
            // header("location:producto.php?accion=alta&msgcode=4");
            exit(0);
        }

	
		$sql = "INSERT into producto values (
			'$Id',
			'$Nom_prod',
			'$Marca_prod',
			'$Cost_prod',
			'$Caract_prod',
			'$Exist_prod',
			'$Id_categoria')";
		break; 
	
	case "cambiar":
		$sql = "UPDATE producto SET 
		Nom_prod = '$Nom_prod',
		Marca_prod = '$Marca_prod',
		Cost_prod = '$Cost_prod',
		Caract_prod = '$Caract_prod',
		Exist_prod = '$Exist_prod',
		Id_categoria = '$Id_categoria'
		where Id = '$Id'";
		// $msgcode = 2;
		break;

	case "baja": 
	$sql = "DELETE from producto where Id = '$Id'";
	$msgcode = 3;
	break;
	
};

 $rs = query( $sql );
// $mysqli = desconectar();
header('location:index.php');
?>