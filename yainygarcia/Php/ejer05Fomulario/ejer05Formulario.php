<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ejer6FormularioGET</title>
    <style>
        label, input {
            display: block;
        }
    </style>
</head>
<body>
    <form action="respuesta.php" method="GET">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre">
        <label for="apellido">Apellido: </label>
        <input type="text" name="apellido">
        <input type="submit" value="Ingresar informacion">
    </form>
</body>
</html>