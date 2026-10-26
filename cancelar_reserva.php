<?php
session_start();
include("conexion.php");

//solo usuarios con sesión iniciada pueden cancelar
if (!isset($_SESSION["usuario_id"]) || $_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$id_reserva = (int) ($_POST["id_reserva"] ?? 0);
$ci_cliente = (int) ($_SESSION["ci_cliente"] ?? 0);

if ($id_reserva <= 0 || $ci_cliente <= 0) {
    header("Location: index.php?page=mis_reservas&error=datos");
    exit;
}

//comprobamos que la reserva exista, sea de este cliente y no haya pasado
$stmt = mysqli_prepare($conexion, "SELECT id_reserva FROM RESERVA
    WHERE id_reserva = ? AND ci_cliente = ? AND fecha >= CURDATE()");
mysqli_stmt_bind_param($stmt, "ii", $id_reserva, $ci_cliente);
mysqli_stmt_execute($stmt);
if (mysqli_num_rows(mysqli_stmt_get_result($stmt)) == 0) {
    header("Location: index.php?page=mis_reservas&error=no_encontrada");
    exit;
}

//borramos el pago (si tiene) y la reserva, todo junto
mysqli_begin_transaction($conexion);
try {
    $stmt = mysqli_prepare($conexion, "DELETE FROM PAGO WHERE id_reserva = ?");
    mysqli_stmt_bind_param($stmt, "i", $id_reserva);
    mysqli_stmt_execute($stmt);

    $stmt = mysqli_prepare($conexion, "DELETE FROM RESERVA WHERE id_reserva = ? AND ci_cliente = ?");
    mysqli_stmt_bind_param($stmt, "ii", $id_reserva, $ci_cliente);
    mysqli_stmt_execute($stmt);

    mysqli_commit($conexion);
} catch (mysqli_sql_exception $e) {
    mysqli_rollback($conexion);
    error_log("Error al cancelar reserva: " . $e->getMessage());
    header("Location: index.php?page=mis_reservas&error=bd");
    exit;
}

header("Location: index.php?page=mis_reservas&cancelada=1");
exit;
