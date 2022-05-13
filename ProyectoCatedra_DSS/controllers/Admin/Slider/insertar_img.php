<?php
require_once "../../../models/metodosSlider.php";
require_once "../../../libs/connection.php";


$estado = $_POST['txtEstado'];
$categoria = $_POST['txtCategoria'];
$Imagen = addslashes(file_get_contents($_FILES['impimagen']['tmp_name']));

$datos = array(
    $categoria,
    $Imagen,
    $estado
);
$obj = new metodos();
if ($obj->InsertarDatos($datos) == 1) {
    header('Location: ../../../views/Admin/Slider/vista_img.php');
} else {
    header('Location: ../../../views/Admin/Slider/vista.php');
}
