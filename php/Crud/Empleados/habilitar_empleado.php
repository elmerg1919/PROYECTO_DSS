<?php
include 'connection.php';
include("metodos-empleados.php");
session_start();
if (!isset($_SESSION['id_username'])) {
    header("Location: ../Login/admin/admin.php");
} else {
    $id = null;
    $id = $_GET['id'];
    $estado = "H";

    $obj = new MetodosEmpleados();
    $obj->habilitarEmpleado($estado, $id);

    header("Location: ver_empleados.php");
}
