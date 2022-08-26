<?= require_once('header.php'); 
$conexion = require_once("mysql.lib.php");
$mysqli = conectar();


//Query que se ejecuta para obtener todos los producto
$query_clientes = mysqli_query($mysqli, "SELECT Id,Nombre_usuario,Tipo FROM Producto");

?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Usuarios</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Usuarios</li>
          <li class="breadcrumb-item active">Usuarios</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <a href="mymodal"  class="btn btn-primary mt-4"><i class="bi bi-plus-circle"></i>Nuevo</a>
        <hr>
      </div>
    </div>
  </div>

  <div>
    <table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Nombre</th>
        <th scope="col">Tipo</th>
        <th scope="col">Opciones</th>
      </tr>
    </thead>
  <tbody class="table-group-divider">
    <?php  while ($mostrar=mysqli_fetch_array($query_clientes)) {
    ?>
    <tr>
      <th scope="row"><?php echo $mostrar['Id'] ?></th>
      <td><?php echo $mostrar['Nombre_usuario'] ?></td>
      <td><?php echo $mostrar['Tipo'] ?></td>
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

