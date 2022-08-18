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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/StyleLogin.css">
    <title>Login</title>
</head>
<body>
    <h1>LOGIN</h1>
    <!--Formulario para iniciar sesion-->
    <form action="login.php" method="post">
        <input type="text" name="email" placeholder="Ingresa tu nombre de Usuario">
        <input type="password" name="password" placeholder="enter you passwor">
        <input type="submit" value="Send">
    </form>
    <samp>or <a href="registro.php">Registrarme aquí</a></samp>
    <?php
    if(!empty($message)):?>
    <p><?=$message ?></p>

    <?php endif ?>
    
</body>
</html>