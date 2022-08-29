<?php require_once('header.php'); 
$conexion = require_once("mysql.lib.php");
$mysqli = conectar();
?>
<main id="main" class="main">

<div class="container mt-2 ">
    <div class="row">
        <div class="col-md-7">
            <div class="page-header">
                <h2>Agregar producto a inventario</h2>
            </div>
           
            <form action="procesa_insert_sucursal.php" method="post">
                <div class="form-group col-md-5">
                    <label>Id</label>
                    <input type="text" name="Id" class="form-control" required="">
                </div>                        
                <div class="form-group col-md-3">
                    <label>Cantidad</label>
                    <input type="number" name="Cant_inv" class="form-control" required="">
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
                            <option ><?=$idsucursalselect?></option>
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
                       <label for="Id_prod" ><strong>Id producto: </strong></label>
                       <select name="Id_prod" id="Id_prod" class="form-control">
                        <option value="">--Seleccione Producto</option>
                            <?php while ($rowcar = $rscar->fetch_assoc() ):
                            extract($rowcar);
                             ?>
                            <option ><?=$idproductoselect  ?></option>
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
                Sucursales
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
                        $query="SELECT Id, Nom_suc from sucursal"; // Fetch all the data from the table customers
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
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThreee" aria-expanded="false" aria-controls="flush-collapseThreee">
                Inventario
              </button>
            </h2>
            <div id="flush-collapseThreee" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                <div class="">
                        <table class="table table-bordered table-hover mt-2">
                        <thead>
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Id sucursal</th>
                            <th scope="col">Nombre producto</th>
                          </tr>
                        </thead>
                      <tbody class="table-group-divider">
                        <?php
                        // include 'mydbCon.php';
                        $conexion = require_once("mysql.lib.php");
                        $mysqli = conectar();
                        $query="SELECT inventario.Id,Id_suc,producto.Nom_prod from inventario inner join producto on(inventario.id_prod=producto.id)"; // Fetch all the data from the table customers
                        $result=mysqli_query($mysqli,$query);
                        ?>
                        <?php if ($result->num_rows > 0): ?>
                        <?php while($array=mysqli_fetch_row($result)): ?>
                        <tr>
                            <th scope="row"><?php echo $array[0];?></th>
                            <td><?= $array[1];?></td>
                            <td><?= $array[2];?></td>
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
</div><br><br>

<?php require_once('footer.php') ?>