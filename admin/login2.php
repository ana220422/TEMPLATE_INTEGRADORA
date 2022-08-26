<?php

// Inicializa la sesión

session_start();

 

/* Verifique si el usuario ya ha iniciado sesión, si es así, 

rediríjalo a la página de bienvenida (index.php)*/

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

  header("location: index.php");

  exit;

}

 

// Incluir el archivo de configuración

require_once "config.php";

 

// Definir variables e inicializar con valores vacíos

$username = $password = $username_err = $password_err = "";

 

// Procesamiento de datos del formulario cuando se envía el formulario

if($_SERVER["REQUEST_METHOD"] == "POST"){

 

    // Comprobar si el nombre de usuario está vacío

    if(empty(trim($_POST["username"]))){

        $username_err = "Por favor ingrese su usuario.";

    } else{

        $username = trim($_POST["username"]);

    }

    

    // Comprobar si la contraseña está vacía

    if(empty(trim($_POST["password"]))){

        $password_err = "Por favor ingrese su contraseña.";

    } else{

        $password = trim($_POST["password"]);

    }

    

    // Validar información del usuario

    if(empty($username_err) && empty($password_err)){

        // Preparar la consulta select

        $sql = "SELECT id, username, password FROM users WHERE username = ?";

        

        if($stmt = mysqli_prepare($link, $sql)){

            /* Vincular variables a la declaración preparada como parámetros, s es por la

			variable de tipo string*/

            mysqli_stmt_bind_param($stmt, "s", $param_username);

            

            // Asignar parámetros

            $param_username = $username;

            

            // Intentar ejecutar la declaración preparada

            if(mysqli_stmt_execute($stmt)){

                // almacenar el resultado de la consulta

                mysqli_stmt_store_result($stmt);

                

                /*Verificar si existe el nombre de usuario, si es así,

				verificar la contraseña*/

                if(mysqli_stmt_num_rows($stmt) == 1){                    

                    // Vincular las variables del resultado

                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);

					//obtener los valores de la consulta

                    if(mysqli_stmt_fetch($stmt)){

						/*comprueba que la contraseña ingresada sea igual a la 

						almacenada con hash*/

                        if(password_verify($password, $hashed_password)){

                            // La contraseña es correcta, así que se inicia una nueva sesión

                            session_start();

                            

                            // se almacenan los datos en las variables de la sesión

                            $_SESSION["loggedin"] = true;

                            $_SESSION["id"] = $id;

                            $_SESSION["username"] = $username;                            

                            

                            // Redirigir al usuario a la página de inicio

                            header("location: index.php");

                        } else{

                            // Mostrar un mensaje de error si la contraseña no es válida

                            $password_err = "La contraseña que ha ingresado no es válida.";

                        }

                    }

                } else{

                    // Mostrar un mensaje de error si el nombre de usuario no existe

                    $username_err = "No existe cuenta registrada con ese nombre de usuario.";

                }

            } else{

                echo "Algo salió mal, por favor vuelve a intentarlo.";

            }

        }

        

        // Cerrar la sentencia de consulta

        mysqli_stmt_close($stmt);

    }

    

    // Cerrar laconexión

    mysqli_close($link);

}

?>

 

<!DOCTYPE html>

<html lang="es">

	<head>

		<meta charset="UTF-8">

		<!link href="CSS/estilo_form.css" rel="stylesheet" type="text/css">

		<title>Inicio de sesión</title>

	</head>

<body>

    

        <h2>Inicio de sesión</h2>

        <p>Por favor, introduzca usuario y contraseña para iniciar sesión.</p>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <label>Usuario</label>

                <input type="text" name="username"  value="<?php echo $username; ?>">

                <span ><?php echo $username_err; ?></span><br>

              

                <label>Contraseña</label>

                <input type="password" name="password">

                <span ><?php echo $password_err; ?></span><br>

            

            

                <input type="submit"  value="Ingresar"><br>

                <p>¿No tienes una cuenta? <a href="register.php">Regístrate ahora</a>.</p>

        </form>

     

</body>

</html>