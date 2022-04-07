<?php
require_once "metodosCrud.php";
require_once "../../conexion.php";

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
    header("location:Mostrar.php");
} else {
    echo "FALLO FEO";
}
