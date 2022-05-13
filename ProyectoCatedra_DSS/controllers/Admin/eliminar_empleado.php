<?php
include '../../libs/conexion.php';
include "../../models/metodosEmpleados.php";

if (!empty($_POST)) {
    $username = trim($_POST['username']);

    $obj = new MetodosEmpleados();
    $obj->eliminarEmpleado($username);

    header('Location: ../../views/Admin/ver_empleados.php');
}
