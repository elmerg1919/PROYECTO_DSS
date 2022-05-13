<?php
include '../../libs/conexion.php';
include "../../models/metodosEmpleados.php";

session_start();

if (!isset($_SESSION['id_username'])) {
    header("Location: ../../views/Admin/admin.php");
} else {
    $id = null;
    $id = $_GET['id'];

    $estado = "D";

    $obj = new MetodosEmpleados();
    $obj->inhabilitarEmpleado($estado, $id);

    header("Location: ../../views/Admin/ver_empleados.php");
}
