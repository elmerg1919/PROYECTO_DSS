<?php
require_once "../../../models/metodosSlider.php";
require_once "../../../libs/connection.php";

$id = $_GET['Id'];

$obj = new metodos();
if ($obj->EliminarDatos($id) == 1) {
    header('Location: ../../../views/Admin/Slider/vista_img.php');
} else {
    header('Location: ../../../views/Admin/Slider/vista_img.php');
}
