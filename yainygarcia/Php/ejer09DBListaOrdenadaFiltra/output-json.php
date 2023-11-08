<?php
    include("resources/connection_DB.php");

    function esvalidoElParametro($parametro) {
        if (isset($_POST[$parametro]) && !is_null($_POST[$parametro]) && !empty($_POST[$parametro])) {
            return true;
        } else {
            return false;
        }
    }

    $criterioOrdenacion = "id";

   if (esvalidoElParametro('Criterio')) {
       $criterioOrdenacion = $_POST['Criterio'];
   }

    if (esvalidoElParametro('Filtro')) {
        $filtro = $_POST['Filtro'];

        $sql = "SELECT * FROM operaciones WHERE categoria = '$filtro' ORDER BY $criterioOrdenacion ";

    }elseif (esvalidoElParametro('FiltroPalabra')) {
        $filtroPalabra = $_POST['FiltroPalabra'];
        $campo = $_POST['CampoAFiltrar'];
        
        $sql = "SELECT * FROM operaciones WHERE $campo LIKE '$filtroPalabra%' ";

    }else {
        $sql = "SELECT * FROM operaciones ORDER BY $criterioOrdenacion";
    }


    if (!( $resultado = $conexion->query($sql))) {
        die();
    }

    $totalRegistros = $resultado->num_rows;
    $operaciones = [];

    while($fila = $resultado->fetch_assoc()) {
        $objOperacione = new stdClass();
        $objOperacione->Id = $fila['id'];
        $objOperacione->Username = $fila['username'];
        $objOperacione->Ticker = $fila['ticker'];
        $objOperacione->Categoria = $fila['categoria'];
        $objOperacione->Cantidad = $fila['cantidad'];
        $objOperacione->Fecha = $fila['fecha'];

        array_push($operaciones, $objOperacione);
    }

    $objOperaciones = new stdClass;
    $objOperaciones->operacion = $operaciones;
    $objOperaciones->totalOperaciones = $totalRegistros;
    $salidaJson = json_encode($objOperaciones);
    $conexion->close();
    echo $salidaJson;
?>