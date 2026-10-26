<?php
date_default_timezone_set("America/Montevideo");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conexion = mysqli_connect("127.0.0.1", "rodge_user", "rodge2026", "rodge", 3306);
    mysqli_set_charset($conexion, "utf8mb4");
} catch (mysqli_sql_exception $e) {
    error_log('Error de conexión a MySQL: ' . $e->getMessage());
    http_response_code(500);
    die("Error de conexión: " . $e->getMessage());
}

//precio de una hora de cancha (se guarda en RESERVA.costo). 
if (!defined("PRECIO_HORA")) {
    define("PRECIO_HORA", 1000.00);
}
