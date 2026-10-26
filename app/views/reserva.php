<?php
// Si no inició sesión, no puede reservar
if (!isset($_SESSION["usuario_id"])) {
    header("Location: index.php");
    exit;
}

include(__DIR__ . "/../../conexion.php");

//traemos todas las canchas para mostrarlas en el formulario
$canchas = mysqli_query($conexion, "SELECT num_cancha, localizacion FROM CANCHA ORDER BY num_cancha");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Realizar reserva - Rodge</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5" style="max-width: 480px;">
        <h2>Realizar reserva</h2>

        <form action="procesar_reserva.php" method="post">

            <div class="mb-3">
                <label>Cédula (sin puntos ni guion)</label>
                <input type="number" name="ci_cliente" class="form-control" value="<?php echo $_SESSION["ci_cliente"] ?? ""; ?>" required>
            </div>

            <div class="mb-3">
                <label>Apellido</label>
                <input type="text" name="apellido" class="form-control" maxlength="50" required>
            </div>

            <div class="mb-3">
                <label>Teléfono</label>
                <input type="text" name="tel_cliente" class="form-control" maxlength="20">
            </div>

            <div class="mb-3">
                <label>Elegí el día</label>
                <input type="date" name="fecha" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Elegí el horario</label>
                <select name="hora" class="form-control" required>
                    <option value="">Seleccioná una hora</option>
                    <option value="17:00">17:00 a 18:00</option>
                    <option value="18:00">18:00 a 19:00</option>
                    <option value="19:00">19:00 a 20:00</option>
                    <option value="20:00">20:00 a 21:00</option>
                    <option value="21:00">21:00 a 22:00</option>
                    <option value="22:00">22:00 a 23:00</option>
                    <option value="23:00">23:00 a 00:00</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Elegí la cancha</label>
                <select name="num_cancha" class="form-control" required>
                    <option value="">Seleccioná una cancha</option>
                    <?php while ($cancha = mysqli_fetch_assoc($canchas)) { ?>
                        <option value="<?php echo $cancha["num_cancha"]; ?>">
                            <?php echo "Cancha " . $cancha["num_cancha"] . " - " . $cancha["localizacion"]; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <button type="submit" class="btn btn-success w-100">Confirmar reserva</button>
        </form>

        <p class="mt-3"><a href="index.php?page=dashboard">Volver</a></p>
    </div>
</body>
</html>