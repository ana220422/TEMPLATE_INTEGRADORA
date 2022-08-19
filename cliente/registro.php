<?php
require 'BD.php';
//consukta del ID
$conexion = require_once("mysql.lib.php");
$mysqli = conectar();

//variables
$message='';
if (!empty($_POST['email'])&& !empty($_POST['password'])){
// $query_productos = mysqli_query($mysqli, "SELECT max(Id) as total FROM usuario");
// $id = mysqli_fetch_assoc($query_productos);
// $newId =  $id['total'] + 1;

$sql="INSERT INTO usuario (Id,Nombre_usuario,passwordU, Tipo) values 
(1,:email,:password,'Admin')";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':email',$_POST['email']);
//cifrado de la contraseña
$password=password_hash($_POST['password'],PASSWORD_BCRYPT);
$stmt->bindParam(':password',$password);

if ($stmt->execute()){
    $message='Successfully created new user';
}else{
    $message='Sorry there have error in the coneccion sql in you password';  
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/StyleLogin.css">
</head>
<body>
    <?php
    if(!empty($message)):
    ?>
    <p><?= $message ?></p>
    <?php endif?>
    <h1>REGISTRATE AQUÍ </h1>
    <samp>or <a href="login.php">Login</a></samp>
    <form action="registro.php" method="post">
        <input type="text" name="email" placeholder="Enter you email">
        <input type="password" name="password" placeholder="enter you passwor">
        
        <input type="submit" value="Aceptar">
    </form>
    
</body>
</html>