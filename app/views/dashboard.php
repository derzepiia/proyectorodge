<?php
if (!isset($_SESSION["usuario_id"])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi cuenta - Rodge</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h2>Hola, <?php echo $_SESSION["nombre"]; ?></h2>
        <p>Iniciaste sesión correctamente.</p>

        <a href="index.php?page=reserva" class="btn btn-success">Realizar reserva</a>
<a href="index.php?page=mis_reservas" class="btn btn-primary">Ver mis reservas</a>
<a href="index.php" class="btn btn-outline-secondary">Volver al inicio</a>
<a href="cerrar_sesion.php" class="btn btn-outline-danger">Cerrar sesión</a>
    </div>
</body>
</html>