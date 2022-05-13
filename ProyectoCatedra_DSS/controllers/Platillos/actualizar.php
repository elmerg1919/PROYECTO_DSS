<?php

require_once "../../models/metodosPlatillos.php";
require_once "../../libs/connection.php";

$Nombre = $_POST['txtNombre'];
$precios = $_POST['txtPrecio'];
$Categoria = $_POST['txtCategoria'];
$Descripcion = $_POST['txtDescripcion'];
$Imagen = addslashes(file_get_contents($_FILES['impimagen']['tmp_name']));
$id = $_POST['id'];

$datos = array(
    $Nombre,
    $precios,
    $Categoria,
    $Descripcion,
    $Imagen,
    $id
);
$obj = new metodos();
if ($obj->ActualizarDatos($datos) == 1) {
    header('Location: ../../views/Platillos/mostrar_platillos.php');
} else {
    header('Location: ../../views/Platillos/mostrar_platillos.php');
    //print_r($datos);
}
