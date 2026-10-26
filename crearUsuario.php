<?php

require_once __DIR__ . "/config/conexion.php";

$nombre = "admin";
$email = "admin@admin.com";
$password = password_hash("admin", PASSWORD_DEFAULT);

$stmt = $conexion->prepare("INSERT INTO usuarios(nombre,email,password) VALUES (?,?,?)");
$stmt->bind_param("sss", $nombre, $email, $password);
$stmt->execute();

echo "Usuario creado";