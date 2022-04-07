<?php
require_once "metodosCrud.php";
require_once "../../conexion.php";

$username = $_POST['txtusername'];
$password = $_POST['txtpassword'];
$nombre = $_POST['txtnombre'];
$apellido = $_POST['txtapellido'];

$datos = array(
    $username,
    $password,
    $nombre,
    $apellido
);
$obj = new metodos();
if ($obj->InsertarDatos($datos) == 1) {
    //echo "AQUI DEBE IR LA PAGINA PRINCIPAL";
    //echo "Menu y esas cosas pero en si si funciona";
    header("location: ../Login/clientes/cliente.php");
} else {
    echo "FALLO FEO";
}
