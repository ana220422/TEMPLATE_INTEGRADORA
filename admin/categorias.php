<?= require_once('header.php'); 
$conexion = require_once("mysql.lib.php");
$mysqli = conectar();


//Query que se ejecuta para obtener todos los producto
$query_clientes = mysqli_query($mysqli, "SELECT * FROM categoria");

?>

  <main id="main" class="main">

    <div class="container">
    <div class="pagetitle">
      <h1>Categorias</h1>
    </div><!-- End Page Title -->

<!-- <div class="col col-md-10">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  
  <tbody class="table-group-divider">
    <form  role="form" name="formListCbLanguage"
    method="post" action="index.php">
    <?php  while ($mostrar=mysqli_fetch_array($query_clientes)) {
      // code...
    ?>
    <tr>
      <td><?php echo $mostrar['Id'] ?></td>
      <td><?php echo $mostrar['Nombre_cat'] ?></td>
      <td>
          <button type="button" class="btn btn-danger"><i class="bi bi-person-dash"></i></button>
          <button type="button" class="btn btn-success"><i class="bi bi-pencil-square"></i></button>
      </td>            
    </tr>
    <?php 
    }
    ?>
  </form>
  </tbody>
</table>
</div>
</div> -->



<div class="container mt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <?php include 'msg.php';  ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
        </div>
        <div class="col-md-12">
            <div class="float-left">
                <h2>Lista de categorias</h2>
            </div>            
            <div class="float-right">
                <a href="agregar_categoria.php" class="btn btn-success">Agregar nueva categoria</a>
            </div>
           
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // include 'mydbCon.php';
                $conexion = require_once("mysql.lib.php");
                $mysqli = conectar();
                $query="select * from categoria"; // Fetch all the data from the table customers
                $result=mysqli_query($mysqli,$query);
                ?>
                <?php if ($result->num_rows > 0): ?>
                <?php while($array=mysqli_fetch_row($result)): ?>
                <tr>
                    <th scope="row"><?php echo $array[0];?></th>
                    <td><?php echo $array[1];?></td>
                    <td> 
                      <a href="edicion_cat.php?Id=<?php echo $array[0];?>" class="btn btn-primary">editar</a>
                      <a href="eliminar_cat.php?Id=<?php echo $array[0];?>" class="btn btn-danger">Eliminar</a>
                </tr>
                <?php endwhile; ?>
                <?php else: ?>
                <tr>
                   <td colspan="3" rowspan="1" headers="">No Data Found</td>
                </tr>
                <?php endif; ?>
                <?php mysqli_free_result($result); ?>
              </tbody>
            </table>
        </div>
    </div>        
</div>
<?php include_once "footer.php"; ?>


