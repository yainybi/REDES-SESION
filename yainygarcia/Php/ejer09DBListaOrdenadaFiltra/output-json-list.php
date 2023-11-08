<?php
 include("resources/connection_DB.php");
 $sql = "SELECT * FROM categoria";

if (!( $resultado = $conexion->query($sql))) {
    die();
}

$categorias = [];

while($fila = $resultado->fetch_assoc()) {
    $objCategoria = new stdClass();
    $objCategoria->Nombre = $fila['nombre'];

    array_push($categorias, $objCategoria);
}

$objCategorias = new stdClass;
$objCategorias->categoria = $categorias;

$salidaJson = json_encode($objCategorias);
$conexion->close();

echo $salidaJson;
?>