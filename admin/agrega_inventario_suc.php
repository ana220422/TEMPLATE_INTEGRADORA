<?php require_once('header.php'); 
$conexion = require_once("mysql.lib.php");
$mysqli = conectar();
?>
<main id="main" class="main">

<div class="container mt-2 col-md-8">
    <div class="row">
        <div class="col-md-10">
            <div class="page-header">
                <h2>Agregar producto a inventario</h2>
            </div>
           
            <form action="procesa_insert_sucursal.php" method="post">
                <div class="form-group col-md-5">
                    <label>Id</label>
                    <input type="text" name="Id" class="form-control" required="">
                </div>                        
                <div class="form-group">
                    <label>Cantidad</label>
                    <input type="text" name="Cant_inv" class="form-control" required="">
                </div> 
                <?php
                        $sql = "SELECT Id as idsucursalselect, Nom_suc from sucursal";
                        $rscar = query( $sql );
                    ?>
                     <div class="col col-md-8">
                     <div class="form-group">
                       <label for="Id_prod" ><strong>Id sucursal: </strong></label>
                       <select name="Id_suc" id="Id_suc" class="form-control">
                        <option value="">--Seleccione sucursal</option>
                            <?php while ($rowcar = $rscar->fetch_assoc() ):
                            extract($rowcar);
                             ?>
                            <option ><?=$idsucursalselect?> --- <?=$Nom_suc ?></option>
                        <?php endwhile; ?>
                       </select>
                     </div>
                    </div>  

                <div class="row">

                    <?php
                        $sql = "SELECT Id as idproductoselect, Nom_prod from producto";
                        $rscar = query( $sql );
                    ?>
                     <div class="col col-md-8">
                     <div class="form-group">
                       <label for="Id_prod" ><strong>Producto: </strong></label>
                       <select name="Id_prod" id="Id_prod" class="form-control">
                        <option value="">--Seleccione Producto</option>
                            <?php while ($rowcar = $rscar->fetch_assoc() ):
                            extract($rowcar);
                             ?>
                            <option ><?=$idproductoselect  ?> <?=$Nom_prod ?></option>
                        <?php endwhile; ?>
                       </select>
                     </div>
                    </div>      
                </div>
                <br>
                <input type="submit" class="btn btn-primary" name="submit" value="Guardar">
                <a href=""></a>
            </form>
        </div>
    </div>        
</div><br><br>

<?php require_once('footer.php') ?>