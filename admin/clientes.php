<?= require_once('header.php'); 
$conexion = require_once("mysql.lib.php");
$mysqli = conectar();


//Query que se ejecuta para obtener todos los producto
$query_clientes = mysqli_query($mysqli, "SELECT * FROM cliente");

?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Clientes</h1>
    </div><!-- End Page Title -->

crear nuevo usuario

<!-- <div class="container">
  <div class="row">
    <div class="col-md-12">
      <a href="crear.php"  class="btn btn-primary mt-4">Crear alumno</a>
      <hr>
    </div>
  </div>
</div> -->

<div>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Direccion</th>
      <th scope="col">Telefono</th>
      <th scope="col">Direccion Fiscal</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  
  <tbody class="table-group-divider">
    <?php  while ($mostrar=mysqli_fetch_array($query_clientes)) {
      // code...
    ?>
    <tr>
      <th scope="row">1</th>
      <td><?php echo $mostrar['Id'] ?></td>
      <td><?php echo $mostrar['Nombre'] ?></td>
      <td><?php echo $mostrar['Direccion'] ?></td>
      <td><?php echo $mostrar['Telefono'] ?></td>
      <td><?php echo $mostrar['Direccion Fiscal'] ?></td>
      <td>
          <button type="button" class="btn btn-danger"><i class="bi bi-person-dash"></i></button>
          <button type="button" class="btn btn-success"><i class="bi bi-pencil-square"></i></button>
      </td>            
    </tr>
    <?php 
    }
    ?>
  </tbody>
</table>
</div>

