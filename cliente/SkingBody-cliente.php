<?php
require 'BD.php';
$conexion = require_once("mysql.lib.php");
$mysqli = conectar();
$message='';
$sucursal_name_b = '';
$sucursal_name = 'No seleccionada';
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SkinBody</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!--AJAX-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!--estilos de bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">


</head>

<body>
    <div class="container-fluid bg-dark">
        <div class="row py-2 px-lg-5">
            <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center text-white">
                    <small><i class="fa fa-phone-alt mr-2"></i>+55 4428770115</small>
                    <small class="px-3">|</small>
                    <small><i class="fa fa-envelope mr-2"></i>MakeupGolden1000</small>
                </div>
            </div>
        </div>
    </div>
    <!--Segundo nav-->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-lg-5">
            <a href="index.html" class="navbar-brand ml-lg-3">
                <h1>
                    <i></i>MakeUpGold - SKIN BODY
                </h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
            </div>
            <a class="text-white px-2" style="margin-top: 1%;" href="Cliente.html">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </a>
        </nav>
    </div>


    <hr>

    <!--Fin nav2-->

    <!--inicio del card-->
    <!--INICIO DE UN CATALOGO-->

    <!--Data idP y IdUsu-->
    <script type="text/javascript">
        //Funcion para ver el carrito
        function showCarrito(){
            window.location.href = 'http://localhost/IntegradoraExtra/cliente/carrito-compra.php';        
        }
        //Funcion para agregar al carrito
        function carrito(producto){
            let id = "cantidadCarrito-"+producto;
            let cantidad = document.getElementById(id).value;
            let sucursal_id  = window.localStorage.getItem('sucursal');
                    if(!!producto && !!sucursal_id){
                        $.ajax({
                            url: "SkingBody-cliente.php",
                            type: "GET",
                            data: {idProducto:producto, sucursal_id: sucursal_id, cantidad: cantidad},
                            success: function(data){
                                console.log(data);
                            }
                        });
                    }
        }
        //Funcion para lanzar la consulta al cambio de sucursal
        function changeSucursal(e){
            window.localStorage.setItem('sucursal', e)
            window.location.href = "http://localhost/IntegradoraExtra/cliente/SkingBody-cliente.php?idSucursal="+e;
        }
    </script>
    <?php 
    //Valida que exista el producto
        if(isset($_GET['idProducto'])){
            //Se guadar en la variable el id del producto obtenido del get
            $producto_id = $_GET['idProducto'];
            $sucursal_id = $_GET['sucursal_id'];
            $cantidad = $_GET['cantidad'];
            $usuario_id = 1;
            //consulta para verificar si en el carrito del usuario ya existe el producto 
            $query_inventario = mysqli_query($mysqli, 
            "SELECT * FROM carrito_usuario WHERE id_producto = $producto_id AND id_usuario= $usuario_id");
            $response_query =  mysqli_fetch_assoc($query_inventario);
            echo "ando en el query";
            if($response_query['id_usuario']){
                $cantidad_db = $response_query['cantidad'];
                $cantidad_nueva = $cantidad_db + $cantidad;
                $update_carrito = "UPDATE carrito_usuario SET cantidad=$cantidad_nueva WHERE id_usuario=$usuario_id AND id_producto = $producto_id";
                if (mysqli_query($mysqli, $update_carrito)) {
                    echo 'El producto ha sido actualizado';
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
                }
            }else{
                $sql = "INSERT INTO carrito_usuario (id_sesion, id_producto, id_usuario, cantidad)
                VALUES ($usuario_id, $producto_id, $usuario_id,$cantidad)";
                if (mysqli_query($mysqli, $sql)) {
                    echo 'El producto ha sido agregado';
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
                }
            }
        }
          
    ?>

    <div class="row" style="margin-top: 1%; margin-block-end: 2%;">
         <div class="col" style="text-align: center;">
                   <strong>Sucursal: </strong><?= $sucursal_name_b ?>
                </div>
        <div class="col" style="text-align: center;">
                <select class="form-select" style="width: 29%;" onchange="changeSucursal(this.value)">
                    <option selected>Cambiar sucursal</option>
                    <option value="1">MakeupGoldQRO</option>
                    <option value="2">MakeUpGoldPuebla</option>
                    <option value="3"> MakeUpGoldMorelia</option>
                </select>
        </div>
               
    </div>
    <hr>
    <section>
        <div class="row" style="margin-left: 1%;margin-right: 1%;">
            <?php
            $sucursal_name = 'No seleccionada';
        //Query para pbtener todos los productos
        if(isset($_GET['idSucursal'])){
            $sucursal = $_GET['idSucursal'];
             $query_productos = mysqli_query($mysqli, "SELECT producto.Id,
                            producto.Nom_prod,
                            producto.Marca_prod,
                            producto.Prec_prod,
                            producto.Id as productoKey,
                            categoria.Nombre_cat as categoria,
                            producto.Caract_prod,
                            producto.Exist_prod,
                            producto.Id_categoria,
                            producto.URLIMG,
                            sucursal.Nom_suc,
                            sucursal.Id,
                            inventario.Cant_inv
                FROM producto 
                INNER JOIN categoria on producto.Id_categoria=categoria.Id
                INNER JOIN inventario on (inventario.Id_prod=producto.Id)
                INNER JOIN sucursal on(sucursal.Id=inventario.Id_suc)
                WHERE id_suc = $sucursal 
                AND  producto.Exist_prod != 'No' ORDER BY producto.Id") or die( mysqli_error($db));
        }else{
            $query_productos = mysqli_query($mysqli, "SELECT p.Id,
                        p.Nom_prod,
                        p.Marca_prod,
                        p.Prec_prod,
                        p.Caract_prod,
                        p.Exist_prod,
                        c.Id as categoria,
                        p.URLIMG
                FROM producto p 
                INNER JOIN categoria c
                ON p.id_categoria = c.Id
                WHERE p.Exist_prod != 'No' ORDER BY p.Id") or die( mysqli_error($db));
        }
       ;
        while ($producto = mysqli_fetch_array($query_productos)) {
            if(isset($_GET['idSucursal'])){
                $sucursal_name = $producto['Nom_suc'];
                $inventario = $producto['Cant_inv'];
                $sucursal_name_b = $sucursal_name;
            }else{
                $sucursal_name = 'No seleccionada';
                $inventario = 0;
            }
            $var1 = 'img/';
            $var2 = $producto['URLIMG'];
            $id_input = 'cantidadCarrito-';
            $producto_id_input = $producto['productoKey'];
            $texto_completo = $var1 . $var2;
            $idInput = $id_input . $producto_id_input;
        ?>
        <div class="col-md-4">
             <div class="card" style="width: 90%; margin-block-end: 8%;">
                <img class="card-img-top" style="height: 40%;" src="<?=$texto_completo?>" alt="Card image cap">
                  <div class="card-body">
                        <h5 class="card-title"><?=$producto['Nom_prod']?></h5>
                        <p class="card-text"><?=$producto['Caract_prod']?></p>
                        <p class="card-text"><?=$sucursal_name?></p>
                        <p class="card-text">En existencia: <?=$inventario?></p>
                        <input type="hidden" id="maximo" value="<?=$inventario?>">
                        <h4>$<?=$producto['Prec_prod']?></h4>
                        <hr>
                        <div style="text-align: center;">
                            <input id="<?=$idInput?>" style="width: 35%; text-align: center;" type="number"  value="1" min="1" max="<?=$inventario?>" onKeyDown="return false">
                           
                        </div>
                        
                        <hr>
                        <div class="row">
                            <div class="col" style="text-align: center;">
                                <button type="button" class="btn btn-info" onclick="carrito(<?=$producto_id_input?>)">
                                    <i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;Agregar
                                </button>
                            </div>
                            <div class="col" style="text-align: center;">
                                <button type="button" class="btn btn-secondary" onclick="showCarrito()">
                                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>&nbsp;Ver carrito
                                </button>
                            </div>
                        </div>
                  </div>
            </div>
        </div>
         <?php } ?>
        </div>
    </section>
    <!--Fin del catlago-->
    <!--fin del card-->
    <!--Footer-->
    <div class="container-fluid bg-dark text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-7 col-md-6">
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <h3 class="text-primary mb-4">Redes sociales</h3>
                        <p><i class="fa fa-map-marker-alt mr-2"></i>Real de Valencian #133 Col.Franc.Javier Mina</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+55 4428770115</p>
                        <p><i class="fa fa-envelope mr-2"></i>montse.osorio.j@gmail.com</p>
                        <div class="d-flex justify-content-start mt-4">
                            <a class="btn btn-outline-light btn-social mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social mr-2" href="#"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social mr-2" href="#"><i
                                    class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-6 mb-5">
                        <h3 class="text-primary mb-4">Comentarios y sugerencias</h3>
                        <p>Nos importa tu opinión, si tienes algun comentario, sugerencia o queja puedes dejarnos tus
                            comentarios aqui.
                            GRACIAS!!</p>
                        <div class="w-100">
                            <div class="input-group">
                                <input type="text" class="form-control border-light" style="padding: 30px;"
                                    placeholder="Escribe aquí">
                                <div class="input-group-append">
                                    <button class="btn btn-primary px-4">Envíar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5"
                style="border-color: #3E3E4E !important;">
                <div class="row">
                    <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                        <p class="m-0 text-white">&copy; <a href="#">MakeUpGold</a>.SVC.


                    </div>
                    <div class="col-lg-6 text-center text-md-right">
                        <ul class="nav d-inline-flex">
                            <li class="nav-item">
                                <a class="nav-link text-white py-0" href="#">Privacy</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white py-0" href="#">Terms</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white py-0" href="#">Help</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--Fin footer-->


</body>

</html>