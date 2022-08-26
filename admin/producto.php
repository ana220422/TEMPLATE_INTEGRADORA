<?= require_once('header.php'); 
$conexion = require_once("mysql.lib.php");
$mysqli = conectar();




//Query que se ejecuta para obtener todos los producto
$sql ="SELECT * FROM Producto";
$resultado = query($sql);

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

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <a class="btn btn-primary mt-4" href="formulario_producto.php?accion=alta"><i class="bi bi-plus-circle"></i>Nuevo</a>
        <hr>
      </div>
    </div>
  </div>
  <div>
  <?php if ($resultado->num_rows > 0 ) : ?>
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
    <?php  while ($mostrar=mysqli_fetch_array($resultado)) :
    ?>
    <tr>
      <th scope="row"><?php echo $mostrar['Id'] ?></th>
      <td><?= $mostrar['Nom_prod'] ?></td>
      <td><?= $mostrar['Marca_prod'] ?></td>
      <td><?= $mostrar['Cost_prod'] ?></td>
      <td><?= $mostrar['Prec_prod'] ?></td>
      <td><?= $mostrar['Caract_prod'] ?></td>
      <td><?= $mostrar['Exist_prod'] ?></td>
      <td><?= $mostrar['Id_categoria'] ?></td>
      <td>
          <a href="procesa_producto.php?accion=eliminar&Id=<?= $mostrar['Id'] ?>" class="btn btn-danger"><i class="bi bi-file-x-fill"></i></a>

          <a href="formulario_producto.php?accion=cambio&Id=<?= $mostrar['Id'] ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a> 
      </td>            
    </tr>
    <?php 
    endwhile;
    ?>
  </tbody>
</table>
  <?php else : ?>
      <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
        <i class="fas fa-ban fa-3x"></i>
        ¡No hay Productos!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>
<a href="nuevo.php"> <button type="button" class="btn btn-info">Nuevo</button> </a>
</div>
<?php require_once('footer.php') ?>