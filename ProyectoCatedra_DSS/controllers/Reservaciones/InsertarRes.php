<?php
require_once "../../models//MetodosRes.php";
require_once "../../libs/connection.php";

$telefono = $_POST['txttelefono'];
$nombre = $_POST['txtnombre'];
$correo = $_POST['txtcorreo'];
$cantidad = $_POST['txtcantidad'];
$fecha = $_POST['txtfecha'];
$hora = $_POST['txthora'];
$username = $_POST['txtusername'];

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
if ($obj->InsertarDatos($datos) == 1) {
    header('Location: ../../views/Reservaciones/MisReserva.php');
} else {
    //header('Location: ../../views/Reservaciones/MisReserva.php');
    print_r($datos);
}
