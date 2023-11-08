<?php
include("./mysql.php");

$oMySQL = new MySQL();
$response = "";

//$rq = "1";

//$ticketData = array(
//        "id" => "3",
//        "ticket" => "PRUEBA",
//        "categoria" => "PRUEBA",
//        "precio" => 67,
//        "fecha" => "2023-10-01"
//);

//$parametros = array(
//        "criterioOrden" => "id",
//        "filtro" => null,
//        "campoAFiltrar" => null,
//        "filtroPorPalabra" => null
//);



//$idEliminar = 12;


//$response = $oMySQL->getTickets($parametros);
if(isset($_POST['rq'])) {
    $rq = $_POST['rq'];

    //MOSTRAR CATEGORIAS
    if ($rq === "1") {
        $response = $oMySQL->getCategorias();
    } 

    //MOSTRAR DATA CON FILTROS
    else if ($rq === "2"){
        $parametros = array(
            "criterioOrden" => $_POST['criterioOrden'],
            "filtroCategoria" => $_POST['filtroCategoria'],
            "campoAFiltrar" => $_POST['campoAFiltrar'],
            "filtroPorPalabra" => $_POST['filtroPorPalabra']
        );
        $response = $oMySQL->getTickets($parametros);
    }   
}

//REALIZAR INSERT
if (isset($_POST['insertar'])) {
    $ticketDataInsert = array(
        "ticket" => $_POST['ticket'],
        "categoria" => $_POST['categoria'],
        "precio" => $_POST['precio'],
        "fecha" => $_POST['fecha']
        //"icono" => file_get_contents($_FILES['documentoPdf']['tmp_name'])
    );
    $response = $oMySQL->insertPDO($ticketDataInsert);
}

//REALIZAR CONSULTA POR ID
else if (isset($_POST['consultar'])) {
    $idTicket = $_POST['id'];
    $response = $oMySQL->getTicket($idTicket);
}

//REALIZAR UPDATE
else if (isset($_POST['modificar'])) {
    $ticketDataModif = array(
        "id" => $_POST['id'],
        "ticket" => $_POST['ticket'],
        "categoria" => $_POST['categoria'],
        "precio" => $_POST['precio'],
        "fecha" => $_POST['fecha']
    );
    $response = $oMySQL->updateTicket($ticketDataModif);

//REALIZAR DELETE
}else if (isset($_POST['eliminar'])) {
    if (isset($_POST['id'])) {
        $idEliminar = $_POST['id'];
        $response = $oMySQL->deleteTicket($idEliminar);
    }
}

echo $response;
?>

