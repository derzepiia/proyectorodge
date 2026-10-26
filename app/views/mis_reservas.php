<?php
if (!isset($_SESSION["usuario_id"])) {
    header("Location: index.php");
    exit;
}

include(__DIR__ . "/../../conexion.php");

//las reservas se buscan por la cédula del cliente (tabla CLIENTE / RESERVA)
if (isset($_GET["ci"])) {
    $_SESSION["ci_cliente"] = (int) $_GET["ci"];
}
$ci_cliente = (int) ($_SESSION["ci_cliente"] ?? 0);

$stmt = mysqli_prepare($conexion, "SELECT r.id_reserva, r.fecha, r.hora, r.costo, c.num_cancha, c.localizacion
    FROM RESERVA r JOIN CANCHA c ON c.num_cancha = r.num_cancha
    WHERE r.ci_cliente = ? ORDER BY r.fecha, r.hora");
mysqli_stmt_bind_param($stmt, "i", $ci_cliente);
mysqli_stmt_execute($stmt);
$reservas = mysqli_stmt_get_result($stmt);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis reservas - Rodge</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h2>Reservas activas</h2>

        <?php if (isset($_GET["confirmada"])) { ?>
            <div class="alert alert-success">¡Tu reserva se guardó correctamente!</div>
        <?php } ?>

        <?php if (isset($_GET["cancelada"])) { ?>
            <div class="alert alert-warning">La reserva fue cancelada.</div>
        <?php } ?>

        <?php if (isset($_GET["error"])) { ?>
            <div class="alert alert-danger">No se pudo cancelar la reserva. Revisá que sea tuya y que no haya pasado la fecha.</div>
        <?php } ?>

        <form method="get" class="mb-3 d-flex gap-2" style="max-width: 360px;">
            <input type="hidden" name="page" value="mis_reservas">
            <input type="number" name="ci" class="form-control" placeholder="Tu cédula" value="<?php echo $ci_cliente ?: ""; ?>" required>
            <button class="btn btn-outline-primary">Buscar</button>
        </form>

        <table class="table table-bordered bg-white">
            <tr>
                <th>Cancha</th>
                <th>Fecha</th>
                <th>Horario</th>
                <th>Costo</th>
                <th></th>
            </tr>

            <?php while ($reserva = mysqli_fetch_assoc($reservas)) { ?>

                <tr>
                    <td><?php echo "Cancha " . $reserva["num_cancha"] . " - " . $reserva["localizacion"]; ?></td>
                    <td><?php echo $reserva["fecha"]; ?></td>
                    <td><?php echo substr($reserva["hora"], 0, 5); ?></td>
                    <td>$<?php echo $reserva["costo"]; ?></td>
                    <td>
                        <?php if ($reserva["fecha"] >= date("Y-m-d")) { ?>
                            <form action="cancelar_reserva.php" method="post" class="m-0">
                                <input type="hidden" name="id_reserva" value="<?php echo $reserva["id_reserva"]; ?>">
                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('¿Seguro que querés cancelar esta reserva?');">Cancelar</button>
                            </form>
                        <?php } ?>
                    </td>
                </tr>

            <?php } ?>
        </table>

        <a href="index.php?page=reserva" class="btn btn-success">Realizar otra reserva</a>
        <a href="index.php?page=dashboard" class="btn btn-outline-secondary">Volver a mi cuenta</a>
    </div>
</body>
</html>