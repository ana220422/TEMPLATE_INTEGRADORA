<?php require_once('header.php') ?>

<main id="main" class="main">

<div class="container mt-2 col-md-8">
    <div class="row">
        <div class="col-md-8">
            <div class="page-header">
                <h2>Agregar una nueva categoria</h2>
            </div>
           
            <form action="procesa_insert_usu.php" method="post">
                <div class="form-group">
                    <label>Id</label>
                    <input type="text" name="Id" class="form-control" required="">
                </div>                        
                <div class="form-group">
                    <label>Nombre (email)</label>
                    <!-- <input type="text" name="Nombre_usuario" class="form-control" required=""> -->
                    <input type="email" name="Nombre_usuario" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" class="form-control"  required="">
                </div>
                <div class="form-group">
                    <label>Contraseña</label>
                    <input type="password" name="passwordU" class="form-control" required="">
                </div>
                <div class="col col-md-8">
                     <div class="form-group">
                       <label for="Tipo" ><strong>Tipo: </strong></label>
                       <select name="Tipo" id="Tipo" class="form-control">
                        <option value="">--Tipo--</option>
                            <option >Admin</option>
                            <option >UserC</option>
                        </div> 
                    </div>  
                <br>
                <input type="submit" class="btn btn-primary" name="submit" value="Guardar">
                <a href="usuarios.php" class="btn btn-light">Cancelar</a>
            </form>
        </div>
    </div>        
</div><br><br><br> <br><br> <br><br><br><br> <br><br> <br>

<?php require_once('footer.php') ?>