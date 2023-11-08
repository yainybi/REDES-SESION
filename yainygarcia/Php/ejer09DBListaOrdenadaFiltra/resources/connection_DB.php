<?php
    $host = "localhost";
    $baseDatos = "REDES";
    $usuario = "yainybi97";
    $pass = "admin123456";

    $conexion = new mysqli($host, $usuario, $pass, $baseDatos);

    if ($conexion->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
}
?>