<?php
$obj = new stdclass; 

$obj -> Id = $_POST["id"];
$obj -> Correo = $_POST["correo"];
$obj -> Apellido = $_POST["ape"];
$obj -> Nombre = $_POST["nom"];
$obj -> FechaNacimiento = $_POST["nac"];


echo $obj -> Id.", ".$obj -> Correo.", ".$obj -> Apellido.", ".$obj -> Nombre.", ".$obj -> FechaNacimiento;

?>

