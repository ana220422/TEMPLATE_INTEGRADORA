<?php
require 'BD.php';
//consukta del ID
$conexion = require_once("mysql.lib.php");
$mysqli = conectar();
//variables
$message='';


if (!empty($_POST['email'])&& !empty($_POST['password'])){
$query_id = mysqli_query($mysqli, "SELECT max(Id) as total FROM usuario");
 $id = mysqli_fetch_assoc($query_id);
$newId =  $id['total'] + 1;

$sql="INSERT INTO usuario (Id,Nombre_usuario,passwordU, Tipo) values 
($newId,:email,:password,'UserC')";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':email',$_POST['email']);
//cifrado de la contraseña
$password=password_hash($_POST['password'],PASSWORD_BCRYPT);
$stmt->bindParam(':password',$password);

if ($stmt->execute()){
   
}else{
    $message='Sorry there have error in the coneccion sql in you password';  
}

}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/styleLoginC.css">
</head>

<body>
    <?php
    if(!empty($message)):
    ?>
     <p><?= $message ?></p>
    <?php endif?>
    <div class="login-dark">
        <form method="post">
            <h2 class="sr-only">Registro</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
           <form action="registro.php" method="post">
        <input type="text" name="email" placeholder="Enter you email">
        <input type="password" name="password" placeholder="enter you passwor">
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Registrarme</button></div><a href="#" class="forgot">
                    <samp>or <a href="login.php">Login</a></samp>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>