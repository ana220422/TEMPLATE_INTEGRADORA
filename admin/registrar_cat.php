
 php<?
$conexion = require_once("mysql.lib.php");
$mysqli = conectar();
$nombre = $_POST["nombre"];
$sql = mysqli_query("INSERT INTO categoria
(Nombre_cat) VALUES
(?)");
header("Location: listar.php");
