<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PROGRAMACION EN AMBIENTE DE REDES</title>
</head>
<header><h1>Mostrar Variables del Servidor</h1></header>     
<body>
    <table border=1 style="width:50%; border-spacing: none;">
        <tr>
            <td style="background-color: #b1b7f4;">SERVER_ADDR</td>
            <td style="background-color: #b1b7f4;"><?php echo $_SERVER['SERVER_ADDR'];?></td>
        </tr>
        <tr>
            <td style="background-color: #b1b7f4;">SERVER_PORT</td>
            <td style="background-color: #b1b7f4;"><?php echo $_SERVER['SERVER_PORT'];?></td>
        </tr>
        <tr>
            <td style="background-color: #b1b7f4;">SERVER_NAME</td>
            <td style="background-color: #b1b7f4;"><?php echo $_SERVER['SERVER_NAME'];?></td>
        </tr>
        <tr>
            <td style="background-color: #b1b7f4;">DOCUMENT_ROOT</td>
            <td style="background-color: #b1b7f4;"><?php echo $_SERVER['DOCUMENT_ROOT'];?></td>
        </tr>
    </table>
    <h1>Variables de cliente</h1>
    <table border=1 style="width:50%; border-spacing: none;">
        <tr>
            <td style="background-color: #b1b7f4;">REMOTE_ADDR</td>
            <td style="background-color: #b1b7f4;"><?php echo $_SERVER['REMOTE_ADDR'];?></td>
        </tr>
        <tr>
            <td style="background-color: #b1b7f4;">REMOTE_PORT</td>
            <td style="background-color: #b1b7f4;"><?php echo $_SERVER['REMOTE_PORT'];?></td>
        </tr>
    </table>
    </table>
    <h1>Variables de requerimiento</h1>
    <table border=1 style="width:50%; border-spacing: none;">
        <tr>
            <td style="background-color: #b1b7f4;">SCRIPT_NAME</td>
            <td style="background-color: #b1b7f4;"><?php echo $_SERVER['SCRIPT_NAME'];?></td>
        </tr>
        <tr>
            <td style="background-color: #b1b7f4;">REQUEST_METHOD</td>
            <td style="background-color: #b1b7f4;"><?php echo $_SERVER['REQUEST_METHOD'];?></td>
        </tr>
    </table>
    <h1>Todas</h1>  
    <?php
    foreach($_SERVER as $key_name => $key_value) {
        echo "Nombre: ".$key_name. " |Valor: ".$key_value."<br>";
    }
    ?>
</body>
<footer>
    <h2>Datos del Alumno</h2>
    <div>Yainy Garcia</div>
    <div><a href="mailto:yainy.garcia@comunidad.ub.edu.ar">yainy.garcia@comunidad.ub.edu.ar</a></div>
</footer>
</html>