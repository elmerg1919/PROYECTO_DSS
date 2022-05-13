<?php
require_once "../../../models/metodosSlider.php";
require_once "../../../libs/connection.php";

$id = $_POST['id'];
$estado = $_POST['txtEstado'];
$categoria = $_POST['txtCategoria'];

$datos = array(
    $id, $categoria, $estado
);
$obj = new metodos();
if ($obj->ActualizarDatos($datos) >= 1) {
    header('Location: ../../../views/Admin/Slider/vista_img.php');
} else {
    header('Location: ../../../views/Admin/Slider/vista_img.php');
}
