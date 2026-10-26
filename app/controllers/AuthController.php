<?php
session_start();
header("Location: home.php");
$email = $_POST["email"];
$password = $_POST["password"];

$Usuario = Usuario::buscarPorEmail($email);

if ($Usuario) {

    if (password_verify($password, $Usuario["password"])) {

        $_SESSION["id"] = $Usuario["id"];
        $_SESSION["nombre"] = $Usuario["nombre"];

        header("Location: ../views/home.php");
        exit();

    } else {

        echo "Contraseña incorrecta";

    }

} else {

    echo "Usuario no encontrado";

}