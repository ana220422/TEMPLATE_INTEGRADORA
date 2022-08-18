<?php
function conectar(){
	//conexion a base de datos
$server = "localhost"; //si el mysql y el apache estan en la misma computadora se utiliza el localhost.
$user = "root";
$passwd = "root123"; //cuando root no tiene password se queda vacio.
$dbname = "makeupgold";
return new mysqli($server, $user, $passwd, $dbname );
}

function query( $sql ){
	global $mysqli;
	/*
Ejecucion de una consulta SQL 
*/
	$rs = $mysqli->query($sql) or die("ERROR: ".$mysqli->error);
	return $rs;
	 }

function desconectar(){
	global $mysqli;
	$mysqli->close();
}
?>