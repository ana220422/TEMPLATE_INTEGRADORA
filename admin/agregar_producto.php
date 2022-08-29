<?php require_once('header.php'); 
$conexion = require_once("mysql.lib.php");
$mysqli = conectar();
?>
<main id="main" class="main">

<div class="container mt-2">
    <div class="row">
        <div class="col-md-6">
            <div class="page-header">
                <h2>Agregar producto</h2>
            </div>
           
            <form action="procesa_producto.php" method="post">
                <div class="form-group col-md-5">
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
                    <div class="form-group">
                        <label for="text">Caracteristicas</label>
                       <!--  <textarea class="form-control" id="Caract_prod" rows="3"required=""></textarea>
                        <textarea cols="40" name="objeto3" id="Caract_prod" spellcheck="true"></textarea> -->
                        <input type="" name="Caract_prod" class="form-control" required="" value="">
                    </div>
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
    
    <div class="accordion accordion-flush col-md-5" id="accordionFlushExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Poductos
              </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="">
                    <table class="table table-bordered table-hover mt-2">
                        <thead>
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre Producto</th>
                          </tr>
                        </thead>
                      <tbody class="table-group-divider">
                        <?php
                        // include 'mydbCon.php';
                        $conexion = require_once("mysql.lib.php");
                        $mysqli = conectar();
                        $query="SELECT Id, Nom_prod from producto"; // Fetch all the data from the table customers
                        $result=mysqli_query($mysqli,$query);
                        ?>
                        <?php if ($result->num_rows > 0): ?>
                        <?php while($array=mysqli_fetch_row($result)): ?>
                        <tr>
                            <th scope="row"><?php echo $array[0];?></th>
                            <td><?= $array[1];?></td>
                        </tr>
                        <?php endwhile; ?>
                        <?php else: ?>
                        <tr>
                           <td colspan="3" rowspan="1" headers="">No Hay Registros</td>
                        </tr>
                        <?php endif; ?>
                        <?php mysqli_free_result($result); ?>
                      </tbody>
                    </table>
            
                    </div>
                </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                Categoria
              </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                <div class="">
                        <table class="table table-bordered table-hover mt-2">
                        <thead>
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre Sucursal</th>
                          </tr>
                        </thead>
                      <tbody class="table-group-divider">
                        <?php
                        // include 'mydbCon.php';
                        $conexion = require_once("mysql.lib.php");
                        $mysqli = conectar();
                        $query="SELECT Id, Nombre_cat from categoria"; // Fetch all the data from the table customers
                        $result=mysqli_query($mysqli,$query);
                        ?>
                        <?php if ($result->num_rows > 0): ?>
                        <?php while($array=mysqli_fetch_row($result)): ?>
                        <tr>
                            <th scope="row"><?php echo $array[0];?></th>
                            <td><?= $array[1];?></td>
                        </tr>
                        <?php endwhile; ?>
                        <?php else: ?>
                        <tr>
                           <td colspan="3" rowspan="1" headers="">No Hay Registros</td>
                        </tr>
                        <?php endif; ?>
                        <?php mysqli_free_result($result); ?>
                      </tbody>
                    </table>
                </div>
          </div>
        </div>
        </div>

        </div>
</div></div> <br><br>

<?php require_once('footer.php') ?>