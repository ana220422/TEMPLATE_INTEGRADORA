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

<div class="container mt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning alert-dismissible fade show mt-3 col-md-4" role="alert"><?php include 'msg.php'; ?>
              <i class="fas fa-ban fa-3x"></i>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        <div class="col-md-7">
            <div class="float-left">
                <h2>Lista de Usuarios</h2>
            </div>            
            <div class="float-right">
                <a href="agregar_usuario.php" class="btn btn-success">Agregar nuevo Usuario</a>
            </div>
           
            <table class="table table-bordered table-hover mt-2">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Tipo</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // include 'mydbCon.php';
                $conexion = require_once("mysql.lib.php");
                $mysqli = conectar();
                $query="select id,nombre_usuario,tipo from usuario"; // Fetch all the data from the table customers
                $result=mysqli_query($mysqli,$query);
                ?>
                <?php if ($result->num_rows > 0): ?>
                <?php while($array=mysqli_fetch_row($result)): ?>
                <tr>
                    <th scope="row"><?php echo $array[0];?></th>
                    <td><?php echo $array[1];?></td>
                    <td><?php echo $array[2];?></td>
                    <td> 
                      <a href="edicion_usu.php?Id=<?php echo $array[0];?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                      <a href="eliminar_usu.php?Id=<?php echo $array[0];?>" class="btn btn-danger"><i class="bi bi-file-x-fill"></i></a>
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
</div> <br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> <br> 

<?php include_once "footer.php"; ?>


