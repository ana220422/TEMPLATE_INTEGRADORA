<?php require_once('header.php'); 
$conexion = require_once("mysql.lib.php");
$mysqli = conectar();
extract( $_REQUEST );
?>
<main id="main" class="main">

<div class="container mt-2 col-md-8">
    <div class="row">
        <div class="col-md-10">
            <div class="page-header">
                <h2>Agregar producto</h2>
            </div>
           
            <form action="procesa_insert_sucursal.php" method="post">
                <div class="form-group col-md-5">
                    <label>Id</label>
                    <input type="text" name="Id" class="form-control" required="">
                </div>                        
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="Cant_inv" class="form-control" required="">
                </div> 
                <?php
                        $sql = "SELECT Id as idcategoriaselect, Nombre_cat from categoria";
                        $rscar = query( $sql );
                    ?>
                     <div class="col col-md-8">
                     <div class="form-group">
                       <label for="Id_prod" ><strong>Categoria: </strong></label>
                       <select name="Id_suc" id="Id_suc" class="form-control">
                        <option value="">--Seleccione sucursal</option>
                            <?php while ($rowcar = $rscar->fetch_assoc() ):
                            extract($rowcar);
                             ?>
                            <option ><?=$idcategoriaselect?> --- <?=$Nombre_cat ?></option>
                        <?php endwhile; ?>
                       </select>
                     </div>
                    </div>
                    <div class="form-group">
                    <label>Costo</label>
                    <input type="text" name="Cant_inv" class="form-control" required="">
                </div>     


                <div class="row">
                    <div class="form-group">
                        <label>Caracteristicas</label>
                        <input type="text" name="Caract_ptod" class="form-control" required="">
                    </div> 
                    <div class="col col-md-4">
                       <label><strong>Existencia: </strong></label>&nbsp;&nbsp;&nbsp;
                       <div class="form-check form-check-inline">
                        <label for="existenciay">Si</label>
                        <input type="radio" name="existencia" id="existenciay" class="form-check-input" value="Si"
                          <?= $Exist_prod =="Si" ? " checked" : "" ?>
                         /> 
                       </div>
                       <div class="form-check form-check-inline">
                       <label for="existencian">No</label>
                       <input type="radio" name="existencia" id="existencian"  class="form-check-input" value="No"
                        <?= $Exist_prod =="No" ? " checked" : "" ?>
                        /> 
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