<?php
require_once "../../models/MetodosRes.php";
require_once "../../libs/connection.php";

$id = $_GET['Clien_User'];

$obj = new metodos();
if ($obj->EliminarDatos($id) == 1) {
    header("location: ../../views/Reservaciones/VerResClien.php");
} else {
    echo "FALLO FEO";
}
