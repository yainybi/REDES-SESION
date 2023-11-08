<?php
//include("DB.php");
include("usuarios.php");
//include("sesion.php");

//$oDB = new DB();

//$oUsuarios = new Usuarios();
$oUsuarios = new Usuarios();

//$oSesion = new Sesion();
$response = "";

$nombre = "yainybi";
//$clave = "e8eace675fde703d21825ca2178daf1401f6fedc";

$clave = "1234";

//$response = $oDB->deleteTicket($nombre, $clave);
//$response = $oDB->conexionPDO();


//$response = $oSesion->conexionPDO();

//$response = $oUsuarios->conexionPDO();
//$response = $oUsuarios->login();

if ($response == 200) {
    echo "Inicio de sesión exitoso.";
    // Redirigir o realizar otras acciones después del inicio de sesión.
} elseif ($response == 401) {
    echo "Inicio de sesión fallido. Verifica tus credenciales.";
    // Mostrar un mensaje de error al usuario.
} else {
    echo "Error desconocido durante el inicio de sesión.";
    // Mostrar un mensaje de error genérico si el código de error no es reconocido.
}

?>