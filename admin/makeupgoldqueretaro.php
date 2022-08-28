<?= require_once('header.php'); 
$conexion = require_once("mysql.lib.php");
$mysqli = conectar();


//Query que se ejecuta para obtener todos los producto
// $query_clientes = mysqli_query($mysqli, "SELECT * FROM inventario");

?>

  <main id="main" class="main">

    <div class="container">
    <div class="pagetitle">
      <h1>Categorias</h1>
    </div><!-- End Page Title -->

<div class="container mt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning alert-dismissible fade show mt-3 col-md-4" role="alert"><?php include 'msg.php'; ?>
              <i class="fas fa-ban fa-3x"></i>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        <div class="col-md-12">
            <div class="float-left">
                <h2>Lista de productos - inventario </h2>
            </div>            
            <div class="float-right">
                <a href="agrega_inventario_suc.php" class="btn btn-success">Agregar Producto</a>
            </div>
           
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">Id sucursal</th>
                  <th scope="col">Nombre Sucursal</th>
                  <th scope="col">Id producto</th>
                  <th scope="col">Nombre producto</th>
                  <th scope="col">
                  Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // include 'mydbCon.php';
                $conexion = require_once("mysql.lib.php");
                $mysqli = conectar();
                $query="select inventario.id,cant_inv,id_suc,sucursal.nom_suc,id_prod, producto.nom_prod as nombre from inventario
                  INNER JOIN producto on (producto.id=inventario.id_prod)
                  INNER JOIN sucursal on (sucursal.id=inventario.id_suc) where sucursal.id=1;"; // Fetch all the data from the table customers
                $result=mysqli_query($mysqli,$query);
                ?>
                <?php if ($result->num_rows > 0): ?>
                <?php while($array=mysqli_fetch_row($result)): ?>
                <tr>
                    <th scope="row"><?php echo $array[0];?></th>
                    <td><?php echo $array[1];?></td>
                    <td><?php echo $array[2];?></td>
                    <td><?php echo $array[3];?></td>
                    <td><?php echo $array[4];?></td>
                    <td><?php echo $array[5];?></td>
                    <td> 
                      <a href="edicion_cat.php?Id=<?php echo $array[0];?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                      <a href="eliminar_cat.php?Id=<?php echo $array[0];?>" class="btn btn-danger"><i class="bi bi-file-x-fill"></i></a>
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
<?php include_once "footer.php"; ?>


