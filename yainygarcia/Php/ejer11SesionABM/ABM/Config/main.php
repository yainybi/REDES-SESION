<?php
include("mysql.php");
include("../Sesion/usuarios.php");

$oMySQL = new MySQL();
$oUsuarios = new Usuarios();
$response = "";

//$nombre = "yainybi";
//$clave = "e8eace675fde703d21825ca2178daf1401f6fedc";


if (!empty($_POST)) {
    $oUsuarios->sesion = $oUsuarios->getInstancia();
    //$oUsuarios->sesion = $oUsuarios->iniciarSesion();
    $rolWeb = $oUsuarios->sesion->__get("rolWeb");

    if($rolWeb) {
        http_response_code(200);

            $rq = $_POST['rq'];

            if ($rq === "0" ) {
                $response = "Estas con una instancia de conexion. " . $rolWeb . " a\n";
            }
        
            if ($rq === "-1" ) {
                $rolWeb = $oUsuarios->sesion->cerrarSesion();
                $response = "¿La sesion se destruto correctamente ? : " . $rolWeb;
            }

            //MOSTRAR CATEGORIAS
            else if ($rq === "1") {
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
        
            //REALIZAR INSERT
            else if ($rq === "insertar"){
                $ticketDataInsert = array(
                    "ticket" => $_POST['ticket'],
                    "categoria" => $_POST['categoria'],
                    "precio" => $_POST['precio'],
                    "fecha" => $_POST['fecha'],
                    "icono" => file_get_contents($_FILES['documentoPdf']['tmp_name'])
                );
                $response = $oMySQL->insertPDO($ticketDataInsert);
            }
        
            //REALIZAR CONSULTA POR ID
            else if ($rq === "consultar"){
                $idTicket = $_POST['id'];
                $response = $oMySQL->getTicket($idTicket);
            }
            
            //REALIZAR UPDATE
            else if ($rq === "modificar") {
                $ticketDataModif = array(
                    "id" => $_POST['id'],
                    "ticket" => $_POST['ticket'],
                    "categoria" => $_POST['categoria'],
                    "precio" => $_POST['precio'],
                    "fecha" => $_POST['fecha']
                );
                $response = $oMySQL->updateTicket($ticketDataModif);
            }
        
            //REALIZAR DELETE
            else if ($rq === "eliminar"){
                if (isset($_POST['id'])) {
                    $idEliminar = $_POST['id'];
                    $response = $oMySQL->deleteTicket($idEliminar);
                }
            }

        echo $response;
        
    }else {
       // header("Location: http://localhost/yainygarcia/Php/ejer11SesionABM/ABM/Html/login.html");
        header("Location: ../Html/login.html");
        http_response_code(401);
    }

} else {
    header("Location: ../Html/login.html");
   http_response_code(401);
}




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

?>

