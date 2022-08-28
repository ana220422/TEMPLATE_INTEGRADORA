<?php
function conectar(){
	//conexion a base de datos
$server = "localhost"; //si el mysql y el apache estan en la misma computadora se utiliza el localhost.
$user = "root";
$passwd = "251379010203"; //cuando root no tiene password se queda vacio.
$dbname = "makeupgold";
return new mysqli($server, $user, $passwd, $dbname );
}

function query( $sql ){
$mysqli->set_charset("utf8");
$mysqli->autocommit(FALSE);
$mysqli->beginTransaction(MYSQLI_TRANS_STAR_WITH_CONSISTENT_SNAPSHOT);
 if ($consulta=$mysqli->query($query)) {
      if ($mysqli->commit()) {
      	echo "Datos guardados";
      }else{
      	echo "Datos guardados";
      }
 } else {
    $mysqli->rollBack();
    echo "Error datos no guardados";
 }
}

function desconectar(){
	global $mysqli;
	$mysqli->close();
}
