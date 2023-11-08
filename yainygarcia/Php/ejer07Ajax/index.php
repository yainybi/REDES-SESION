<?php
if (isset($_POST['clave'])) {
    $clave = $_POST['clave']."<br>";
    echo "Clave: ".$clave."<br>";
    echo "Clave encriptada en md5: (128 bits o 16 pares hexadecimales)<br>".md5($clave)."<br><hr>";
    echo "Clave: ".$clave."<br>";
    echo "Clave encriptada en sha1: (160 bits o 20 pares hexadecimales)<br>".sha1($clave)."<br>";
}


