<?= require_once('header.php'); 
$conexion = require_once("mysql.lib.php");
$mysqli = conectar();


//Query que se ejecuta para obtener todos los producto
$query_clientes = mysqli_query($mysqli, "SELECT * FROM Producto");

?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Productos</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Productos</li>
          <li class="breadcrumb-item active">Productos</li>
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
    <?php  while ($mostrar=mysqli_fetch_array($query_clientes)) {
      // code...
    ?>
    <tr>
      <th scope="row"><?php echo $mostrar['Id'] ?></th>
      <td><?php echo $mostrar['Nom_prod'] ?></td>
      <td><?php echo $mostrar['Marca_prod'] ?></td>
      <td><?php echo $mostrar['Cost_prod'] ?></td>
      <td><?php echo $mostrar['Prec_prod'] ?></td>
      <td><?php echo $mostrar['Caract_prod'] ?></td>
      <td><?php echo $mostrar['Exist_prod'] ?></td>
      <td><?php echo $mostrar['Id_categoria'] ?></td>
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

