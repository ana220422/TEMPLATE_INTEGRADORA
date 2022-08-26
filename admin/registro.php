<?php  session_start(); include_once "conexion.php";
 ?>
<form class="registro" action="" method="post">
<div><label>Usuario:</label> <input type="text" name="usuario"></div>
<div><label>Clave:</label> <input type="password" name="password"></div>
<div><label>Repetir Clave:</label> <input type="password" name="repassword"></div>
<div><input type="submit" name="enviar" value="Registrar"></div>
</form>
<?php  

if(isset($_POST['enviar'])) { 
    if($_POST['usuario'] == '' or $_POST['password'] == '' or $_POST['repassword'] == '') { 
        echo 'Por favor llene todos los campos.'; 
    } else { 
        $sql = 'SELECT * FROM usuarios'; 
        $rec = mysql_query($sql); 
        $verificar_usuario = 0; 
        while($result = mysql_fetch_object($rec)) { 
            if($result->usuario == $_POST['usuario']) { 
                $verificar_usuario = 1; 
            } 
        } 
        if($verificar_usuario) { 
            if($_POST['password'] == $_POST['repassword']) { 
                $usuario = $_POST['usuario']; 
                $password = $_POST['password']; 
                $sql = "INSERT INTO usuarios (usuario,password) VALUES ('$usuario','$password')"; 
                mysql_query($sql); 
                echo 'Usted se ha registrado correctamente.'; 
            } else { 
                echo 'Las claves no son iguales, intente nuevamente.'; 
            } 
        } else {
            echo 'Este usuario ya ha sido registrado anteriormente.'; 
        } 
    } 
}

?>