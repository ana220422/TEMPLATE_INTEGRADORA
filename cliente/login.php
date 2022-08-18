<?php

session_start();
require 'BD.php';
$conexion = require_once("mysql.lib.php");
$mysqli = conectar();
if (!empty($_POST['email']) && !empty($_POST['password'])){
    $record=$conn->prepare('SELECT Id,Nombre_usuario,passwordU
    FROM usuario WHERE Nombre_usuario=:email');
    $record->bindParam(':email',$_POST['email']);
    $record->execute();
    $result= $record->fetch(PDO::FETCH_ASSOC);

    //variables
    $message='';
    //Valisar que no este vacio
    if(count($result)>0 && password_verify($_POST['password'],
    $result['passwordU'])){
$_SESSION['user_id']=$result['Id'];

header('location:Cliente.html');
    }
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
    <form action="login.php" method="post">
        <input type="text" name="email" placeholder="Ingresa tu nombre de Usuario">
        <input type="password" name="password" placeholder="enter you passwor">
        <input type="submit" value="Send">
    </form>
    <samp>or <a href="registro.php">Registrarme</a></samp>
    <?php
    if(!empty($message)):?>
    <p><?=$message ?></p>

    <?php endif ?>
    
</body>
</html>