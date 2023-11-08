<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PROGRAMACION EN AMBIENTE DE REDES</title>
</head>
<header><h1>Mostrar Variables de Tipo Objeto</h1></header>  
<body>
    <?php
        $listadoDeEmpleados = [];

        $reglonDatosEmpleado = new  stdClass();
        echo "<h2 style='color:blue'> \$reglonDatosEmpleado </h2>";

        $reglonDatosEmpleado -> apellido = "RUIZ";
        $reglonDatosEmpleado -> sueldo = 40000;
        array_push($listadoDeEmpleados, $reglonDatosEmpleado);


        $reglonDatosEmpleado = new stdClass();
        $reglonDatosEmpleado -> apellido = "GARCIA";
        $reglonDatosEmpleado -> sueldo = 80000;
        array_push($listadoDeEmpleados, $reglonDatosEmpleado);


        $reglonDatosEmpleado = new stdClass();
        $reglonDatosEmpleado -> apellido = "DIAZ";
        $reglonDatosEmpleado -> sueldo = 60000;
        array_push($listadoDeEmpleados, $reglonDatosEmpleado);

    
        foreach ( $listadoDeEmpleados as $reglonDatosEmpleado ) {
            echo "<br> Apellido ".$reglonDatosEmpleado -> apellido.
                " Suelo: ".$reglonDatosEmpleado -> sueldo = 60000;
            }

        echo "<h1>Tipo de <span style='color:blue'> \$reglonDatosEmpleado </span>: ".gettype(reglonDatosEmpleado);
    ?>
</body>
<footer>
    <h2>Datos del Alumno</h2>
    <div>Yainy Garcia</div>
    <div><a href="mailto:yainy.garcia@comunidad.ub.edu.ar">yainy.garcia@comunidad.ub.edu.ar</a></div>
</footer>
</html>