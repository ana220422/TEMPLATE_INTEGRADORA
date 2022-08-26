<?php

session_start();
require 'BD.php';
$conexion = require_once("mysql.lib.php");
//requiere la conexion y se abre :) 
$mysqli = conectar();
//verifica que los campos no esten vacios !(diferente de vacio(EMPTY))
if (!empty($_POST['email']) && !empty($_POST['password'])){
    //prepara  query del select
    $record=$conn->prepare('SELECT *
    FROM usuario WHERE Nombre_usuario=:email');
    $record->bindParam(':email',$_POST['email']);
    $record->execute();
    //ejecuta el query lo guarda en result
    $result= $record->fetch(PDO::FETCH_ASSOC);

    //variables
    $message='';
    //Valisar que no este vacio
    if(count($result)>0 && password_verify($_POST['password'],$result['passwordU'])){
        //si existe se crea la variable de sesion $_SESSION
         $_SESSION['user_id']=$result['Id'];
         //valida el tipo de usuario para abrir su index
        if($result['Tipo'] === 'Admin'){
             header('location:../admin/index.html');
        }else{
            header('location:Cliente.html');
        }
       


    }
    // si no existe muestra el mensaje
    else{
        $message='El usuario o password no son validos';
    }

}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/styleLoginC.css">
</head>

<body>
    <div class="login-dark">
        <form method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Log In</button></div><a href="#" class="forgot">
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>