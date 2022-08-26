<?php  
$conexion = require_once("mysql.lib.php");
$mysqli = conectar();

		// NuevoProducto($_POST['Id'], $_POST['Nombre_cat']);

	
	function NuevoProducto($Id,$Nombre_cat)
	{
		$conexion = require_once("mysql.lib.php");
		$mysqli = conectar();
		$sentencia= "INSERT INTO productos (Id, Nombre_cat) VALUES ('".$Id."', '".$Nombre_cat."') ";
		$mysqli->query($sentencia);
		 // or die ("Error al ingresar los datos".mysqli_error($conexion));
	}
?>

<script type="text/javascript">
	alert("Producto Ingresado Exitosamante!!");
	window.location.href='index.php';
</script>