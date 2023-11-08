<?php
include("usuarios.php");

$oUsuarios = new Usuarios();

if (!empty($_POST)) {
    $nombre = $_POST['nombre'];
    $clave = $_POST['clave'];

    //CIFRAMOS LA CLAVE
    //4bb50b37f08ac8d0b3f11228deccdc66a8f6c31a
    $lPassC = sha1(md5("clave" . $clave));
    //echo $lPassC;

    if ($oUsuarios->login($nombre, $clave) == 200) {
        //header("Location: http://localhost/yainygarcia/Php/ejer11SesionABM/ABM/Html/index.html/");
        header("Location: ../Html/index.html");
    } else {
        header("Location: ../Html/login.html?c=401");
        //header("Location: http://localhost/yainygarcia/Php/ejer11SesionABM/ABM/Html/login.html?c=401");
    }
} else {
    header("Location: ../Html/login.html?c=401");
}

?>