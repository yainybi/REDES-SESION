<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Respuesta</title>
    <style>
        a {
            color: black;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <?php
    echo "Nombre = ".$_GET['nombre']."<br>";
    echo "Apellido = ".$_GET['apellido']."<br>";
    ?>
    <button><a href="./../index.html">cerrar</a></button>
</body>
</html>