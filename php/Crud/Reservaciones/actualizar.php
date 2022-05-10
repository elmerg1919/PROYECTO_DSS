<?php

require_once "C:/wamp64/www/PROYECTO_DSS/php/Crud/Reservaciones/MetodosRes.php";
require_once "../../conexion.php";

$telefono = $_POST['txttelefono'];
$username = $_POST['txtUsername'];
$nombre = $_POST['txtnombre'];
$correo = $_POST['txtcorreo'];
$cantidad = $_POST['txtcantidad'];
$fecha = $_POST['txtfecha'];
$hora=$_POST['txthora'];


$datos = array(
    $telefono,
    $username,
$nombre,
$correo,
$cantidad,
$fecha,
$hora

);
$obj = new metodos();
if ($obj->ActualizarDatos($datos) == 1) {
    
    header("location:VerResClien.php");
} else {
    echo "FALLO FEO";
}