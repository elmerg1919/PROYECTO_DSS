<?php

require_once "metodosCrud.php";
require_once "../../conexion.php";

$username = $_POST['txtusername'];
$password = $_POST['txtpassword'];
$nombre = $_POST['txtnombre'];
$apellido = $_POST['txtapellido'];
$id = $_POST['id'];

$datos = array(
    $username,
    $password,
    $nombre,
    $apellido,
    $id
);
$obj = new metodos();
if ($obj->ActualizarDatos($datos) == 1) {
    header("location:Mostrar.php");
} else {
    echo "FALLO FEO";
}
