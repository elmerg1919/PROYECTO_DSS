<?php
require_once "C:/wamp64/www/PROYECTO_DSS/php/Crud/Reservaciones/MetodosRes.php";
require_once "../../conexion.php";

$telefono = $_POST['txttelefono'];
$nombre = $_POST['txtnombre'];
$correo = $_POST['txtcorreo'];
$cantidad = $_POST['txtcantidad'];
$fecha = $_POST['txtfecha'];
$hora=$_POST['txthora'];
$username = $_POST['txtusername'];


$datos = array(
    
    $telefono,
    $nombre,
    $correo,
    $cantidad,
    $fecha,
    $hora,
    $username

);
$obj = new metodos();
if ($obj->InsertarDatos($datos) == 1) {
    //echo "AQUI DEBE IR LA PAGINA PRINCIPAL";
    //echo "Menu y esas cosas pero en si si funciona";
   // header("location: ../Login/clientes/cliente.php");
   echo "EXITOOOOO";
} else {
    echo "FALLO FEO";
}