<?php
include_once "funciones.php";
if(!isset($_POST["id_producto"])){
    exit("No hay Id_prod");
}
agregarProductoAlCarrito($_POST["id_producto"]);
header ("Location:tienda.php");