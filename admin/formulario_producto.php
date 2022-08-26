<?php
require_once('header.php');
$conexion = require_once("mysql.lib.php");
$mysqli = conectar();


extract( $_REQUEST ); //extraigo variables de url (accion y matricula)
//inserta alumno
if ( $accion == "alta") {
	$Id = " ";
	$Nom_prod    = "";
	$Marca_prod     = "";
	$Cost_prod      = "";
	$Caract_prod = "";
	$Exist_prod = "" ;
	$Id_categoria =  "";
	$urlimg = "";
}
//modifica alumno
 else if ($accion == "cambio" ){
$sql = "select * from producto where Id = '$Id'";
$rs = query( $sql );

if ($row = $rs->fetch_assoc() ){
	extract( $row ); //crea variables
} else {
		die("error, algo paso");

}

} else{
	die("error, algo paso");
}

?>

<main id="main" class="main">
<div class="container">
<form accion="procesa_producto.php" method="post">

<input type="hidden" name="accion" value="<?= $accion ?>">

<div class="row mt-5">

	<div class="col col-md-2">
		<div class="form-group">
		   <label for="matricula"><strong>Id: </strong></label>
		   <input type="text" name="id" id="id" value="<?= $Id ?>" class="form-control"
           <?= $accion == "cambio" ? " readonly" : "" ?>
		   />
	    </div>
	</div>

	<div class="col col-md-3">
		<div class="form-group">
		   <label for="Nom_prod"><strong>Nombre: </strong></label>
		   <input type="text" name="Nom_prod" id="Nom_prod" value="<?= $Nom_prod ?>" class="form-control"/>
	    </div>
	</div>

	<div class="col col-md-3">
		<div class="form-group">
		   <label for="Marca_prod"><strong>Marca: </strong></label>
		   <input type="text" name="Marca_prod" id="Marca_prod" value="<?= $Marca_prod ?>" class="form-control"/>
	    </div>
	</div>
	<div class="col col-md-2">
		<div class="form-group">
		   <label for="Cost_prod"><strong>Costo: </strong></label>
		   <input type="text" name="Cost_prod" id="Cost_prod" value="<?= $Cost_prod ?>" class="form-control"/>
	    </div>
	</div>

</div> <br>
<div class="row">

	    <div class="col col-md-4">
		   <label><strong>Existencia: </strong></label>&nbsp;&nbsp;&nbsp;
		   <div class="form-check form-check-inline">
		   	<label for="existenciay">Si</label>
		    <input type="radio" name="existencia" id="existenciay" class="form-check-input" value="Si"
              <?= $Exist_prod =="Si" ? " checked" : "" ?>
		     /> 
		   </div>
		   <div class="form-check form-check-inline">
		   <label for="existencian">No</label>
		   <input type="radio" name="existencia" id="existencian"  class="form-check-input" value="No"
            <?= $Exist_prod =="No" ? " checked" : "" ?>
		    /> 
		   </div>
	     </div>


		<?php
		$sql = "SELECT Id as idcategoriaselect, Nombre_cat from categoria";
		$rscar = query( $sql );
		?>
	     <div class="col col-md-5">
		 <div class="form-group">
		   <label for="Idcarrera" ><strong>Categoria: </strong></label>
		   <select name="Idcategoria" id="Idcategoria" class="form-control">
		   	<option value="">--Seleccione categoria</option>
		   		<?php while ($rowcar = $rscar->fetch_assoc() ):
				// /*
				// obtiene las variables:
				// */
				extract($rowcar);
				
				// if($nomcatedoriaant !== $Nombre_cat ) {
				// 	if ($nomcatedoriaant != ""){
				// 		echo '</optgroup>'."\n";
				// 	}
				// 	echo "\t\t".'<optgroup label="'.$Nombre_cat.'">'."\n";
				// 	$nomcatedoriaant = $Nombre_cat;
				// }

				 ?>
				<option value="<?= $idcategoriaselect ?>"
                    <?= $Id == $idcategoriaselect ? " selected" : "" ?>
					><?=$Nombre_cat ?> </option>
			<?php endwhile; ?>
		   </select>
	     </div>
	    </div>	    
</div>
<div id="mensaje">
<!-- 	<?php 
if (isset($_REQUEST['msgcode'])) {
	$sql = "SELECT mensaje from mensaje where msgcode = " .$_REQUEST['msgcode'];
	$rs = query($sql);
	if ( $row = $rs->fetch_assoc() ) {
		alerta( "danger" , $row["mensaje"] );
	}
}
?> </div>-->
<!-- <div class="form-group">           
	<input type="submit" name="submit" class="btn btn-primary" >           
	<a class="btn btn-primary" href="index.php">Regresar al inicio</a>         
 </div> -->	

<div class="row">
	<div class="col col-md-1">
		<button type="submit" class="btn btn-outline-success">
		<i class="fas fa-save"></i>
		Guardar
		</button>
	</div>
	<div class="col col-md-1">
	    <a href="Producto.php" class="btn btn-secondary">
	    <i class="fas fa-arrow-circle-left fa-2x"></i>
	    Cancelar
	    </button>
	</a>
	</div>
   
</div>

</div>
</form>

</div>
</div> <br>




<?php

require_once("footer.php");
$mysqli = desconectar();
?>
