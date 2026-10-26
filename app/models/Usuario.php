<?php

require_once __DIR__ . "/../../config/conexion.php";

class Usuario
{
    public static function buscarPorEmail($email)
    {
        global $conexion;

        $sql = "SELECT * FROM usuarios WHERE email = ?";

        $stmt = $conexion->prepare($sql);

        $stmt->bind_param("s", $email);

        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }
}