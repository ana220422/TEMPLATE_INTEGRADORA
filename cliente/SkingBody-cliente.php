<?php
require 'BD.php';
$conexion = require_once("mysql.lib.php");
$mysqli = conectar();
$message='';
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
        function showCarrito(){
            window.location.href = 'http://localhost/IntegradoraB/faster-1.0.0/carrito-compra.php';         
        }
        function carrito(producto){
                    if(!!producto){
                        $.ajax({
                            url: "SkingBody-cliente.php",
                            type: "GET",
                            data: {idProducto:producto},
                            success: function(data){
                                console.log(data);
                            }
                        });
                    }
                };
    </script>
    <?php 
    //Valida que exista el producto
        if(isset($_GET['idProducto'])){
            //Se guadar en la variable el id del producto obtenido del get
            $producto_id = $_GET['idProducto'];
            $usuario_id = 1;
            //consulta para verificar si en el carrito del usuario ya existe el producto 
            $query_inventario = mysqli_query($mysqli, 
            "SELECT * FROM carrito_usuario WHERE id_producto = $producto_id AND id_usuario= $usuario_id");
            $response_query =  mysqli_fetch_assoc($query_inventario);
            if($response_query['id_usuario']){
                $cantidad_db = $response_query['cantidad'];
                $cantidad_nueva = $cantidad_db + 1;
                $update_carrito = "UPDATE carrito_usuario SET cantidad=$cantidad_nueva WHERE id_usuario=$usuario_id AND id_producto = $producto_id";
                if (mysqli_query($mysqli, $update_carrito)) {
                    echo 'El producto ha sido actualizado';
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
                }
            }else{
                $sql = "INSERT INTO carrito_usuario (id_sesion, id_producto, id_usuario, cantidad)
                VALUES ($usuario_id, $producto_id, $usuario_id,1)";
                if (mysqli_query($mysqli, $sql)) {
                    echo 'El producto ha sido agregado';
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
                }
            }
        }
          
    ?>

    <section>
        <?php
        //Query para pbtener todos los productos
        $query_productos = mysqli_query($mysqli, "SELECT * FROM producto WHERE id_categoria=3");
        while ($producto = mysqli_fetch_array($query_productos)) {
            $var1 = 'img/';
            $var2 = $producto['URLIMG'];

            $texto_completo = $var1 . $var2;
            echo '<div class="card estilo-a col-4\" mtd-4 >
            <div class="img-contain">';
            echo '<img src="'.$texto_completo.'" alt="Imagen" />';  
            echo '</div>';
            echo '<p> <strong>Nombre :</strong>' . $producto['Nom_prod'] . '</p>';
            echo '<select class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option selected>Sucursales</option>';
            //Query para pbtener todas las sucrsales
            $query_sucursal = mysqli_query($mysqli, "SELECT * FROM SUCURSAL");
            while ($sucursal = mysqli_fetch_array($query_sucursal)) {
                echo '<option value="' . $sucursal['Id'] . '">' . $sucursal['Nom_suc'] . '</option>';
            }
            echo '</select>';
            echo '<br>';
            echo '<p> <strong>En inventario :</strong>' . $producto['Nom_prod'] . '</p>';
            echo '<div>
                <button onclick="carrito('.$producto['Id'].')">
                <i class="fa fa-cart-plus"></i>&nbsp;Agregar al carrito
                </button>
            </div>';
            echo '<div>
            <button onclick="showCarrito()">
                <i class="fa fa-list"></i>&nbsp;Ver carrito
            </button>
            </div>';
            echo '</div>';
            echo '</div>';

        }
        ?>
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