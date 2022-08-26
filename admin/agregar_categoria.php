<?php require_once('header.php') ?>

<main id="main" class="main">

<div class="container mt-2 col-md-8">
    <div class="row">
        <div class="col-md-8">
            <div class="page-header">
                <h2>Agregar una nueva categoria</h2>
            </div>
           
            <form action="procesa_insert_cat.php" method="post">
                <div class="form-group">
                    <label>Id</label>
                    <input type="text" name="Id" class="form-control" required="">
                </div>                        
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="Nombre_cat" class="form-control" required="">
                </div>
                <br>
                <input type="submit" class="btn btn-primary" name="submit" value="Guardar">
            </form>
        </div>
    </div>        
</div><br><br>

<?php require_once('footer.php') ?>