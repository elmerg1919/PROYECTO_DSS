<?php
require_once "../../models/metodosPlatillos.php";
require_once "../../libs/connection.php";

$id = $_GET['Plat_Codigo'];

$obj = new metodos();
if ($obj->EliminarDatos($id) == 1) {
    header('Location: ../../views/Platillos/mostrar_platillos.php');
} else {
    header('Location: ../../views/Platillos/mostrar_platillos.php');
}
