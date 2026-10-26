<?php
session_start();
include("conexion.php");

// Si no inició sesión, no puede reservar
if (!isset($_SESSION["usuario_id"])) {
    header("Location: index.php");
    exit;
}

// recibimos los datos del formulario
$ci_cliente  = (int) $_POST["ci_cliente"];
$apellido    = trim($_POST["apellido"]);
$telefono    = trim($_POST["tel_cliente"]);
$nombre      = $_SESSION["nombre"];
$num_cancha  = (int) $_POST["num_cancha"];
$fecha       = $_POST["fecha"];
$hora        = $_POST["hora"];          
$costo       = PRECIO_HORA;

if ($ci_cliente <= 0 || $num_cancha <= 0 || $fecha == "" || $hora == "") {
    echo "Faltan datos. <a href='index.php?page=reserva'>Volver</a>";
    exit;
}

//guardamos (o actualizamos) al cliente en la tabla CLIENTE
$stmt = mysqli_prepare($conexion, "INSERT INTO CLIENTE (ci_cliente, nombre, apellido, tel_cliente)
    VALUES (?, ?, ?, ?)
    ON DUPLICATE KEY UPDATE nombre = VALUES(nombre), apellido = VALUES(apellido), tel_cliente = VALUES(tel_cliente)");
mysqli_stmt_bind_param($stmt, "isss", $ci_cliente, $nombre, $apellido, $telefono);
mysqli_stmt_execute($stmt);

//recordamos la cédula para mostrar "Mis reservas"
$_SESSION["ci_cliente"] = $ci_cliente;

// revisamos que esa cancha no esté ya reservada ese día y esa hora
$stmt = mysqli_prepare($conexion, "SELECT id_reserva FROM RESERVA WHERE num_cancha = ? AND fecha = ? AND hora = ?");
mysqli_stmt_bind_param($stmt, "iss", $num_cancha, $fecha, $hora);
mysqli_stmt_execute($stmt);
if (mysqli_num_rows(mysqli_stmt_get_result($stmt)) > 0) {
    echo "Esa cancha ya está reservada en ese horario. <a href='index.php?page=reserva'>Volver</a>";
    exit;
}

//guardamos la reserva en la tabla RESERVA
$stmt = mysqli_prepare($conexion, "INSERT INTO RESERVA (hora, fecha, costo, ci_cliente, num_cancha) VALUES (?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "ssdii", $hora, $fecha, $costo, $ci_cliente, $num_cancha);
mysqli_stmt_execute($stmt);

header("Location: index.php?page=mis_reservas&confirmada=1");
exit;
