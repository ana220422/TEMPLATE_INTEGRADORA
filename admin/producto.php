<?= require_once('header.php'); 
$conexion = require_once("mysql.lib.php");
$mysqli = conectar();




//Query que se ejecuta para obtener todos los producto
$sql ="SELECT * FROM Producto";
// $resultado = query($sql);

?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Productos</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Productos</li>
          <li class="breadcrumb-item active">Productos</li>
        </ol>
      </nav>
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
                <h2>Lista de categorias</h2>
            </div>            
            <div class="float-right">
                <a href="agregar_producto.php" class="btn btn-success">Agregar nuevo producto</a>
            </div>
    <table class="table table-bordered table-hover mt-2">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Nombre</th>
        <th scope="col">Marca</th>
        <th scope="col">Costo</th>
        <th scope="col">precio</th>
        <th scope="col">Caracteristicas</th>
        <th scope="col">Existencia</th>
        <th scope="col">Categoria</th>
        <th scope="col">Opciones</th>
      </tr>
    </thead>
  <tbody class="table-group-divider">
    <?php
                // include 'mydbCon.php';
                $conexion = require_once("mysql.lib.php");
                $mysqli = conectar();
                $query="select * from producto"; // Fetch all the data from the table customers
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
                    <td><?php echo $array[6];?></td>
                    <td><?php echo $array[7];?></td>
                    <td> 
                      <a href="edicion_cat.php?Id=<?php echo $array[0];?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                      <a href="eliminar_cat.php?Id=<?php echo $array[0];?>" class="btn btn-danger"><i class="bi bi-file-x-fill"></i></a>
                    </td>
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


