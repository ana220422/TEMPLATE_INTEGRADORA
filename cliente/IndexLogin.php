<?php
session_start();
require 'BD.php';

if(isset($_SESSION['user_id']))
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="css/StyleLogin.css">
</head>
<body>
    <header>
        <a href=""></a>
    </header>
    <h1>Por favor inicia sesión o registrate</h1>
    <a href="login.php">login</a> or
    <a href="registro.php">Registrarme</a>
</body>
</html>