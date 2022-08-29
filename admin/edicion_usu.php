<?php  require_once('header.php') ?>


 <main id="main" class="main">

<div class="container mt-2">

  <div class="page-header">
      <h2>Editar Usuario</h2>
  </div>

    <div class="row">
        <div class="col-md-8">
            <?php

            $conexion = require_once("mysql.lib.php");
            $mysqli = conectar();

            $query = "SELECT * FROM usuario WHERE Id='" . $_GET["Id"] . "'"; // Fetch data from the table customers using id

            $result=mysqli_query($mysqli,$query);

            $categoria = mysqli_fetch_assoc($result);


            ?>
            <form action="editar_usu.php" method="POST">

              <input type="hidden" name="Id" value="<?php echo $_GET["Id"]; ?>" class="form-control" required="">
              <div class="form-group">
                <label for="exampleInputEmail1">Id</label>
                <input type="text" name="Nombre_usuario" class="form-control" value="<?php echo $categoria['Id']; ?>" required="" readonly>
              </div>
              <div class="form-group">
                    <label>Nombre (email)</label>
                    <!-- <input type="text" name="Nombre_usuario" class="form-control" required=""> -->
                    <input type="email" name="Nombre_usuario" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" class="form-control" value="<?php echo $categoria['Nombre_usuario']; ?>" required="">
                </div>
                <div class="form-group">
                    <label>Contraseña</label>
                    <input type="password" name="passwordU" class="form-control"  required="">
                </div>
                <div class="form-group">
                    <label>Tipo</label>
                    <input type="text" name="Tipo" class="form-control" value="<?php echo $categoria['Tipo']; ?>" required="">
                </div>
              <hr>

              <button type="submit" class="btn btn-primary" value="submit">Guardar</button> 
              <a href="usuarios.php" class="btn btn-light">Cancelar</a>

            </form>
        </div>
    </div>        
</div>
<br> <br> <br> <br><br> <br> <br> <br> 

<?php include_once('footer.php') ?>