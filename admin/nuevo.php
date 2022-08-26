<?php
require_once('header.php');
$conexion = require_once("mysql.lib.php");
$mysqli = conectar();

  $Id = " ";
  $Nom_prod    = "";
  $Marca_prod     = "";
  $Cost_prod      = "";
  $Caract_prod = "";
  $Exist_prod = "" ;
  $Id_categoria = "";
?>

<main id="main" class="main">
<div class="container">
<form action="crear.php" method="POST">

<input type="hidden" name="accion" value="<?= $accion ?>">

<div class="row mt-5">

  <div class="col col-md-2">
    <div class="form-group">
       <label for="matricula"><strong>Id: </strong></label>
       <input type="text" name="id" id="id" value="<?= $Id ?>" class="form-control"
          
       />
      </div>
  </div>

  <div class="col col-md-3">
    <div class="form-group">
       <label for="Nom_prod"><strong>Nombre: </strong></label>
       <input type="text" name="Nom_prod" id="Nom_prod" value="<?= $Nom_prod ?>" class="form-control"/>
      </div>
  </div>
</div>
</div><br>
<div class="row">
  <div class="col col-md-2">
    <button type="submit" class="btn btn-outline-success ">
    <i class="fas fa-save"></i>
    Guardar
    </button>
  </div>
  <div class="col col-md-2">
      <a href="Producto.php" class="btn btn-secondary">
      <i class="fas fa-arrow-circle-left"></i>
      Cancelar
      </button>
  </a>
  </div>
   
</div>

</div>
</form>

</div>
</div> <br>
  		
  		<br>
  		<button type="submit" class="btn btn-success">Guardar</button>
     </form>
  	</div>
  	
  </div>
  
<?php require_once('footer.php') ?>	