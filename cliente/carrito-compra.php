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
    <title>Carrito</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">


</head>

<body>
<script type="text/javascript">
        function addCarrito(producto){
            if(!!producto){
                        $.ajax({
                            url: "http://localhost/IntegradoraB/faster-1.0.0/carrito-compra.php",
                            type: "GET",
                            data: "idProducto="+producto,
                            success: function(data){
                                window.location.href = 'http://localhost/IntegradoraB/faster-1.0.0/carrito-compra.php';
                            }
                        });
                    }         
        }
        function updateCarrito(producto){
                    if(!!producto){
                        $.ajax({
                            url: "http://localhost/IntegradoraB/faster-1.0.0/carrito-compra.php",
                            type: "GET",
                            data: "KeyProducto="+producto,
                            success: function(data){
                                window.location.href = 'http://localhost/IntegradoraB/faster-1.0.0/carrito-compra.php';
                            }
                        });
                    }
                };
                function deleteCarrito(){
                    $.ajax({
                            url: "http://localhost/IntegradoraB/faster-1.0.0/carrito-compra.php",
                            type: "GET",
                            data: "KeyUser="+1,
                            success: function(data){
                                window.location.href = 'http://localhost/IntegradoraB/faster-1.0.0/carrito-compra.php';
                            }
                    });
                };
    </script>
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
                    <i></i>MakeUpGold - CARRITO
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
       
    </script>
    <?php 
          
    ?>

    <section>
        <div style="background: #efe5efbf;" class="container jumbotron">
            <div class="row">
                <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Precio producto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Total</th>
                        <th scope="col">Agregar</th>
                        <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $usuario = 1;
                            $total_general = 0;
                            $query_carrito = mysqli_query($mysqli, "SELECT producto.Id, producto.Nom_prod,producto.Prec_prod,carrito_usuario.cantidad 
                            FROM producto
                            INNER JOIN carrito_usuario ON (carrito_usuario.id_producto = producto.Id)
                            WHERE carrito_usuario.id_usuario=$usuario");
                            while ($producto = mysqli_fetch_array($query_carrito)) {
                                $totalProducto = $producto['Prec_prod'];
                                $cantidad = $producto['cantidad'];
                                $total = $totalProducto * $cantidad;
                                $total_general = $total_general + $total;
                                pintarValores($producto);
                             }

                             if(isset($_GET['idProducto'])){
                                $producto_get = $_GET['idProducto'];
                                $usuario = 1;
                                $query_carrito_productos = mysqli_query($mysqli,"SELECT * FROM carrito_usuario WHERE id_producto = $producto_get AND id_usuario= $usuario");
                                $response_query =  mysqli_fetch_assoc($query_carrito_productos);
                                if($response_query['id_usuario']){
                                    $cantidad_db = $response_query['cantidad'];
                                    $cantidad_nueva = $cantidad_db + 1;
                                    $update_carrito = "UPDATE carrito_usuario SET cantidad=$cantidad_nueva WHERE id_usuario=$usuario AND id_producto = $producto_get";
                                    if (mysqli_query($mysqli, $update_carrito)) {
                                        $total_general = 0;
                                        $query_carrito = mysqli_query($mysqli, "SELECT producto.Id, producto.Nom_prod,producto.Prec_prod,carrito_usuario.cantidad 
                                        FROM producto
                                        INNER JOIN carrito_usuario ON (carrito_usuario.id_producto = producto.Id)
                                        WHERE carrito_usuario.id_usuario=$usuario");
                                        while ($producto = mysqli_fetch_array($query_carrito)) {
                                            $totalProducto = $producto['Prec_prod'];
                                            $cantidad = $producto['cantidad'];
                                            $total = $totalProducto * $cantidad;
                                            $total_general = $total_general + $total;
                                            pintarValores($producto);
                                        }
                                    } else {
                                        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
                                    }
                                }
                             }

                             if(isset($_GET['KeyProducto'])){
                                $producto_put = $_GET['KeyProducto'];
                                $usuario = 1;
                                $query_carrito_productos = mysqli_query($mysqli,"SELECT * FROM carrito_usuario WHERE id_producto = $producto_put AND id_usuario= $usuario");
                                $response_query =  mysqli_fetch_assoc($query_carrito_productos);
                                if($response_query['id_usuario']){
                                    $cantidad_db = $response_query['cantidad'];
                                    $cantidad_nueva = $cantidad_db - 1;
                                    $update_carrito = "UPDATE carrito_usuario SET cantidad=$cantidad_nueva WHERE id_usuario=$usuario AND id_producto = $producto_put";
                                    if (mysqli_query($mysqli, $update_carrito)) {
                                        $total_general = 0;
                                        $query_carrito = mysqli_query($mysqli, "SELECT producto.Id, producto.Nom_prod,producto.Prec_prod,carrito_usuario.cantidad 
                                        FROM producto
                                        INNER JOIN carrito_usuario ON (carrito_usuario.id_producto = producto.Id)
                                        WHERE carrito_usuario.id_usuario=$usuario");
                                        while ($producto = mysqli_fetch_array($query_carrito)) {
                                            $totalProducto = $producto['Prec_prod'];
                                            $cantidad = $producto['cantidad'];
                                            $total = $totalProducto * $cantidad;
                                            $total_general = $total_general + $total;
                                            pintarValores($producto);
                                        }
                                    } else {
                                        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
                                    }
                                }
                             }

                             if(isset($_GET['KeyUser'])){
                                $usuario = 1;
                                $query_carrito_productos = mysqli_query($mysqli,"DELETE FROM carrito_usuario WHERE id_usuario= $usuario");
                                $response_query =  mysqli_fetch_assoc($query_carrito_productos);
                                pintarValoresVacios();
                             }

                             function pintarValores($producto){
                                $totalProducto = $producto['Prec_prod'];
                                $cantidad = $producto['cantidad'];
                                $total = $totalProducto * $cantidad;
                                echo '
                                <tr>
                                <th scope="row">'.$producto['Id'].'</th>
                                <td>'.$producto['Nom_prod'].'</td>
                                <td>$'.$producto['Prec_prod'].'</td>
                                <td>'.$producto['cantidad'].'</td>
                                <td>$'.$total.'</td>
                                <td> 
                                    <button type="button" onclick="addCarrito('.$producto['Id'].')" class="btn btn-success">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" onclick="updateCarrito('.$producto['Id'].')" class="btn btn-danger">
                                        <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                    </button>
                                </td>
                                </tr>
                                ';
                             }

                             function pintarValoresVacios(){
                                echo '
                                <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                                ';
                             }
                        ?>
                    </tbody>
                </table>
                </div>
            </div>
            <div class="row">
                <div style="margin-left: 82%; margin-top: 2%;" class="col-md-12">
                    <button type="button" onclick="deleteCarrito()"  class="btn btn-danger">
                        <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Limpiar carrito
                    </button>
                </div>
            </div>
            <br>
        </div>
    </section>
    <section>
        <div class="container-fluid">
        <hr>
            <div class="row">
                <div class="col-md-12">
                    <?php
                    echo '<p><strong style="font-size: 160%; margin-left: 83%;">Total: </strong> $' . $total_general. '</p>';
                    ?>
                </div>
                <div id="smart-button-container" style="margin-left: 76%;margin-top: -120px; width: 21%;">
                    <div style="text-align: center"><input type="hidden" name="descriptionInput" id="description" maxlength="127" value="PAYPAL"></div>
                    <p id="descriptionError" style="visibility: hidden; color:red; text-align: center;">Please enter a description</p>
                    <div style="text-align: center"><input name="amountInput" type="hidden" id="amount" value="100" ></div>
                    <p id="priceLabelError" style="visibility: hidden; color:red; text-align: center;">Please enter a price</p>
                    <div id="invoiceidDiv" style="text-align: center; display: none;"><label for="invoiceid"> </label><input name="invoiceid" maxlength="127" type="text" id="invoiceid" value="" ></div>
                    <p id="invoiceidError" style="visibility: hidden; color:red; text-align: center;">Please enter an Invoice ID</p>
                    <div style="text-align: center; margin-top: 0.625rem;" id="paypal-button-container"></div>
                </div>
  <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=MXN" data-sdk-integration-source="button-factory"></script>
  <script>
  function initPayPalButton() {
    var description = document.querySelector('#smart-button-container #description');
    var amount = document.querySelector('#smart-button-container #amount');
    var descriptionError = document.querySelector('#smart-button-container #descriptionError');
    var priceError = document.querySelector('#smart-button-container #priceLabelError');
    var invoiceid = document.querySelector('#smart-button-container #invoiceid');
    var invoiceidError = document.querySelector('#smart-button-container #invoiceidError');
    var invoiceidDiv = document.querySelector('#smart-button-container #invoiceidDiv');

    var elArr = [description, amount];

    if (invoiceidDiv.firstChild.innerHTML.length > 1) {
      invoiceidDiv.style.display = "block";
    }

    var purchase_units = [];
    purchase_units[0] = {};
    purchase_units[0].amount = {};

    function validate(event) {
      return event.value.length > 0;
    }

    paypal.Buttons({
      style: {
        color: 'gold',
        shape: 'rect',
        label: 'paypal',
        layout: 'vertical',
        
      },

      onInit: function (data, actions) {
        actions.enable();

        if(invoiceidDiv.style.display === "block") {
          elArr.push(invoiceid);
        }

        elArr.forEach(function (item) {
          item.addEventListener('keyup', function (event) {
            var result = elArr.every(validate);
            if (result) {
              actions.enable();
            } else {
              actions.enable();
            }
          });
        });
      },

      onClick: function () {
        if (description.value.length < 1) {
          descriptionError.style.visibility = "visible";
        } else {
          descriptionError.style.visibility = "hidden";
        }

        if (amount.value.length < 1) {
          priceError.style.visibility = "visible";
        } else {
          priceError.style.visibility = "hidden";
        }

        if (invoiceid.value.length < 1 && invoiceidDiv.style.display === "block") {
          invoiceidError.style.visibility = "visible";
        } else {
          invoiceidError.style.visibility = "hidden";
        }

        purchase_units[0].description = description.value;
        purchase_units[0].amount.value = amount.value;

        if(invoiceid.value !== '') {
          purchase_units[0].invoice_id = invoiceid.value;
        }
      },

      createOrder: function (data, actions) {
        return actions.order.create({
          purchase_units: purchase_units,
        });
      },

      onApprove: function (data, actions) {
        return actions.order.capture().then(function (orderData) {

          // Full available details
          console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

          // Show a success message within this page, e.g.
          const element = document.getElementById('paypal-button-container');
          element.innerHTML = '';
          element.innerHTML = '<h3>Thank you for your payment!</h3>';

          // Or go to another URL:  actions.redirect('thank_you.html');
          
        });
      },

      onError: function (err) {
        console.log(err);
      }
    }).render('#paypal-button-container');
  }
  initPayPalButton();
  </script>
            </div>
            <hr>
        </div>
    </section>
  
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