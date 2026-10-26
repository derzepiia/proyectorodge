<?php
session_start();
include("conexion.php");

//recibimos los datos que escribió el usuario en el formulario
$nombre   = $_POST["nombre"];
$email    = $_POST["email"];
$password = $_POST["password"];


//cheaquear si ese correo ya está registrado
$consulta = mysqli_query($conexion, "SELECT * FROM usuarios WHERE email = '$email_limpio'");
if (mysqli_num_rows($consulta) > 0) {
    echo "Ese correo ya está registrado. <a href='index.php?page=registro'>Volver</a>";
    exit;
}

//ciframos la contraseña (nunca se guarda tal cual la escribió el usuario)
$clave_cifrada = password_hash($password, PASSWORD_DEFAULT);

//guardamos el usuario en la base de datos
mysqli_query($conexion, "INSERT INTO usuarios (nombre, email, password)
        VALUES ('$nombre_limpio', '$email_limpio', '$clave_cifrada')");

//dejamos la sesión iniciada y vamos a la página de la cuenta
$_SESSION["usuario_id"] = mysqli_insert_id($conexion);
$_SESSION["nombre"] = $nombre;
header("Location: index.php?page=dashboard");
exit;
?>