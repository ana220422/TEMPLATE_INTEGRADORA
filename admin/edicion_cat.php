<?php  require_once('header.php') ?>


 <main id="main" class="main">

<div class="container mt-2">

  <div class="page-header">
      <h2>Editar la categoria</h2>
  </div>

    <div class="row">
        <div class="col-md-12">
            <?php

            $conexion = require_once("mysql.lib.php");
            $mysqli = conectar();

            $query = "SELECT * FROM categoria WHERE Id='" . $_GET["Id"] . "'"; // Fetch data from the table customers using id

            $result=mysqli_query($mysqli,$query);

            $categoria = mysqli_fetch_assoc($result);


            ?>
            <form action="editar_cat.php" method="POST">

              <input type="hidden" name="Id" value="<?php echo $_GET["Id"]; ?>" class="form-control" required="">

              <div class="form-group">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" name="Nombre_cat" class="form-control" value="<?php echo $categoria['Nombre_cat']; ?>" required="">
              </div>   

              <button type="submit" class="btn btn-primary" value="submit">Submit</button>

            </form>
        </div>
    </div>        
</div>

</body>
</html>

<?php include_once('footer.php') ?>