<?php
require_once "../../models/MetodosRes.php";
require_once "../../libs/connection.php";

$telefono = $_POST['txttelefono'];
$username = $_POST['txtUsername'];
$nombre = $_POST['txtnombre'];
$correo = $_POST['txtcorreo'];
$cantidad = $_POST['txtcantidad'];
$fecha = $_POST['txtfecha'];
$hora = $_POST['txthora'];
$id = $_POST['id'];

$datos = array(
    $telefono,
    $username,
    $nombre,
    $correo,
    $cantidad,
    $fecha,
    $hora,
    $id
);

$obj = new metodos();
if ($obj->ActualizarDatos($datos) == 1) {
    header("location: ../../views/Reservaciones/VerResClien.php");
} else {
    echo "FALLO FEO";
    print_r($datos);
}
