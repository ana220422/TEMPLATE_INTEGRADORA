<?php  require_once('header.php') ?>


 <main id="main" class="main">

<div class="container mt-2">

  <div class="page-header">
      <h2>Editar Usuario</h2>
  </div>

    <div class="row">
        <div class="col-md-10">
            <?php

            $conexion = require_once("mysql.lib.php");
            $mysqli = conectar();

            $query = "SELECT *  FROM cliente WHERE Id='" . $_GET["Id"] . "'"; // Fetch data from the table customers using id

            $result=mysqli_query($mysqli,$query);

            $usuario = mysqli_fetch_assoc($result);


            ?>
            <form action="" method="POST">

              <input type="hidden" name="Id" value="<?php echo $_GET["Id"]; ?>" class="form-control" required="">
              <div class="row">
                  <div class="form-group col-md-5">
                    <label for="exampleInputEmail1">Id</label>
                    <input type="text" name="Nombre_usuario" class="form-control" value="<?php echo $usuario['id']; ?>" required="">
                  </div>
              
                  <div class="form-group col-md-5">
                    <label for="exampleInputEmail1">Tipo</label>
                    <input type="text" name="Tipo" class="form-control" value="<?php echo $usuario['Id_usu']; ?>" required="">
                  </div>
            </div>
            <div class="row">
              <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" name="Nombre_usuario" class="form-control" value="<?php echo $usuario['Nomb1_clie']; ?>" required="">
              </div>
              <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Apellido paterno</label>
                <input type="text" name="Nombre_usuario" class="form-control" value="<?php echo $usuario['APP_clie']; ?>" required="">
              </div>
              <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Apellido paterno</label>
                <input type="text" name="Nombre_usuario" class="form-control" value="<?php echo $categoria['APM_clie']; ?>" required="">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-3">
                <label for="exampleInputEmail1">CP</label>
                <input type="text" name="Nombre_usuario" class="form-control" value="<?php echo $usuario['CP_clie']; ?>" required="">
              </div>
              <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Calle_clie</label>
                <input type="text" name="Nombre_usuario" class="form-control" value="<?php echo $usuario['Calle_clie']; ?>" required="">
              </div>
              <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Numero</label>
                <input type="text" name="Nombre_usuario" class="form-control" value="<?php echo $usuario['Nombre_usuario']; ?>" required="">
              </div>
              <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Municipio</label>
                <input type="text" name="Nombre_usuario" class="form-control" value="<?php echo $usuario['id_mun']; ?>" required="">
              </div>
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