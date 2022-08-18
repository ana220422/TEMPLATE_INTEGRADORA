<?php
require 'BD.php';
//consukta del ID
$conexion = require_once("mysql.lib.php");
$mysqli = conectar();



function obtenerProductos(){
    $bd=conectar();
    $query_carrito = mysqli_query($bd, "SELECT * from producto");
    return $query_carrito;
}




function productoYaEstaEnCarritos($idProducto){
    //Obtener los productos del carrito para el usuario en sesion
    $ids=obtenerIdsDeProductosECarrito();
    //Valida que la sesion exista
    if($ids){
        //Recorre la lista de productos en el carrito
        foreach($ids as $id){
            //Verifica si existe 
            if($id === $idProducto){
                return true;
            }
        }

        return false;
    }
    /**if ($id){
        return true;
    }
    return false;**/
    
} 




function obtenerIdsDeProductosECarrito()
{
$bd=conectar();
iniciarSiNoEstaIniciada();
$idSesion=session_id();
    if($idSesion){
        $sentencia = mysqli_query($bd, "select id_producto from carrito_usuario
        where id_sesion=$idSesion");
        return $sentencia;
    }else{
        //POS CIERRALE LA SESION :D
    }
}

function agregarProductoAlCarrito($idProducto){
    //ligar el id del producto con el usuario atravez de las sesion
    $bd=conectar();
    iniciarSiNoEstaIniciada();
    $idSesion=session_id();
    $sentencia=$bd->prepare("INSERT INTO carrito_usaurio(
        producto.Id,producto.Nom_prod, producto.Marca_prod,producto.Prec_prod,
        producto.Caract_prod,producto.Exist_prod,producto.URLIMG) values (',?')");
        return $sentencia->execute([$idSesion,$idProducto]);

}

function iniciarSiNoEstaIniciada(){
    if(session_status() !== PHP_SESSION_ACTIVE ){
        session_start();
    }
}

function quitarProductoDelCarrito($idProducto){
    $bd=conectar();
    iniciarSiNoEstaIniciada();
    $idSesion=session_id();
    $sentencia=$bd->prepare("DELETE FROM carrito_usuario where
    id_sesion=? and id_producto 0 = ");
    return $sentencia->execute([$idSesion,$idProducto]);
}

function obtnerProductosEnCarrito(){
    $bd=conectar();
    iniciarSiNoEstaIniciada();
    $sentencia=$bd->prepare("Select producto.Id,producto.Nom_prod, 
    producto.Marca_prod,producto.Prec_prod,producto.Caract_prod,
    producto.Exist_prod,producto.URLIMG
    from producto
    inner join carrito_usuario on prodducto.Id=carrito_usuario.id_producto
    where carrito_usuario.id_sesion=?");
    $idSesion=session_id();
    $sentencia->execute([$idSesion]);
    return $sentencia->fetch();
}
?>