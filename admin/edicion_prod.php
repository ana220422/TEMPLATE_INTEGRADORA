<?php  require_once('header.php') ?>


 <main id="main" class="main">

<div class="container mt-2">

  <div class="page-header">
      <h2>Editar Producto</h2>
  </div>

    <div class="row">
        <div class="col-md-12">
            <?php

            $conexion = require_once("mysql.lib.php");
            $mysqli = conectar();

            $query = "SELECT * FROM producto WHERE Id='" . $_GET["Id"] . "'"; // Fetch data from the table customers using id

            $result=mysqli_query($mysqli,$query);

            $categoria = mysqli_fetch_assoc($result);


            ?>
            <form action="editar_cat.php" method="post">
                <div class="form-group col-md-4">
                    <label>Id</label>
                    <input type="number" name="Id" class="form-control" required="">
                </div>                        
                <div class="form-group col-md-5">
                    <label>Nombre</label>
                    <input type="text" name="Nom_prod" class="form-control" required="">
                </div>
                <div class="form-group col-md-5">
                    <label>Marca</label>
                    <input type="text" name="Marca_prod" class="form-control" required="">
                </div>

                <?php
                        $sql = "SELECT Id as idcategoriaselect, Nombre_cat from categoria";
                        $rscar = query( $sql );
                    ?>
                     <div class="col col-md-5">
                     <div class="form-group">
                       <label for="Id_categoria" ><strong>Categoria: </strong></label>
                       <select name="Id_categoria" id="Id_categoria" class="form-control">
                        <option value="">--Seleccione categoria</option>
                            <?php while ($rowcar = $rscar->fetch_assoc() ):
                            extract($rowcar);
                             ?>
                            <option ><?=$idcategoriaselect?></option>
                        <?php endwhile; ?>
                       </select>
                     </div>
                    </div>
                    <div class="form-group col-md-5">
                    <label>Costo</label>
                    <input type="" name="Cost_prod" class="form-control" required="" value="$">
                </div>     


                <div class="row">
                    <div class="form-group col col-md-7">
                        <label for="text">Caracteristicas</label>
                        <textarea class="form-control" id="Caract_prod" rows="3"required=""></textarea>
                    </div>
                    <!-- <div class="col col-md-5">
                       <label><strong>Existencia: </strong></label>&nbsp;&nbsp;&nbsp;
                       <div class="form-check form-check-inline">
                        <label for="existenciay">Si</label>
                        <input type="radio" name="existencia" id="existenciay" class="form-check-input" value="Si"/>
                        <div class="form-check form-check-inline">
                       <label for="existencian">No</label>
                       <input type="radio" name="existencia" id="existencian"  class="form-check-input" value="No"/> 
                       </div>
                       </div>
                     </div> -->
                     <div class="form-group">
                        <label>Imagen</label><br>
                        <input type="file" name="URLIMG" value=""/>
                    </div>
                </div>
                <br>
                <input type="submit" class="btn btn-primary" name="submit" value="Guardar">
                <a href="producto.php" class="btn btn-light">Cancelar</a>
                <a href=""></a>
            </form>
        </div>
    </div>        
</div>
<br> <br> <br> <br><br> <br> <br> <br> 

<?php include_once('footer.php') ?>