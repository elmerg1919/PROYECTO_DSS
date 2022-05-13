<?php
require_once "../../models/metodosPlatillos.php";
require_once "../../libs/connection.php";

$Codigo = $_POST['txtCodigo'];
$Nombre = $_POST['txtNombre'];
$Categoria = $_POST['txtCategoria'];
$Imagen = addslashes(file_get_contents($_FILES['impimagen']['tmp_name']));

$datos = array(
    $Codigo,
    $Nombre,
    $Categoria,
    $Imagen
);
$obj = new metodos();
if ($obj->InsertarDatos($datos) == 1) {
    header('Location: ../../views/Platillos/mostrar_platillos.php');
} else {
    header('Location: ../../views/Admin/Mostrar.php');
}
