<?php
session_start();
include("conexion.php");

// 1. Recibimos los datos del formulario
$email    = mysqli_real_escape_string($conexion, $_POST["email"]);
$password = $_POST["password"];

// 2. Buscamos al usuario por su correo
$consulta = mysqli_query($conexion, "SELECT * FROM usuarios WHERE email = '$email'");

// 3. Si existe, comprobamos la contraseña
if (mysqli_num_rows($consulta) == 1) {
    $usuario = mysqli_fetch_assoc($consulta);

    if (password_verify($password, $usuario["password"])) {
        $_SESSION["usuario_id"] = $usuario["id"];
        $_SESSION["nombre"] = $usuario["nombre"];
        header("Location: index.php?page=dashboard");
        exit;
    }
}

// 4. Si algo falló, avisamos
echo "Correo o contraseña incorrectos. <a href='index.php'>Volver</a>";
?>