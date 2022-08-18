<?php

?>
<?php
include_once "funciones.php";
$productos=obtenerProductos();
?>
<div class="columns">
    <div class="colum">
        <h2 class="is-size-2">Makeup Tienda</h2>
</div>
</div>
<?php foreach ($productos as $producto){ ?>
    <div class="columns">
        <div class="column is-full">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title is-size-4">
                    <?php echo $producto['Nom_prod']?>
</p>
</header>
<div class ="card-content">
    <div class="content">
        <?php echo $producto['Caract_prod']?>
</div>
<h1 class="is-size-3">$<?php echo number_format($producto['Prec_prod'],2) ?></h1>
<?php if (productoYaEstaEnCarritos($producto['Id'])){ ?>
    <form action="eliminar_del_carrito.php" method="post">
        <input type="hidden" name="id_producto" value="<?php echo $producto['Id'] ?>">
        <span class= "button is primary">
            <i class="fa fa-plus"></i>&nbsp;En el carrito
</span>
<button class="button is primary" onclick="myFunction()">
<i class="fa fa-cart-plus"></i>&nbsp;Agregar al carrito
&nbsp;Quitar
</button>
</form>
<?php } else { ?>
    <form action="agregar_al_carrito.php" method="post">
        <input type="hidden" name ="id_producto"value="<?php echo $producto['Id'] ?>">
        <button class="button is primary">
            <i class="fa fa-cart-plus"></i>&nbsp;Agregar al carrito
</button>
</form>
<?php } ?>
</div>
</div>
</div>
</div>
<?php } ?>
<?php ?>