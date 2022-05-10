<?php
$id = $_GET['Clien_User'];

require_once "C:/wamp64/www/PROYECTO_DSS/php/Crud/Reservaciones/MetodosRes.php";
require_once "../../conexion.php";

$obj = new metodos();
if ($obj->EliminarDatos($id) == 1) {
    header("location:VerResClien.php");
} else {
    echo "FALLO FEO";
}
