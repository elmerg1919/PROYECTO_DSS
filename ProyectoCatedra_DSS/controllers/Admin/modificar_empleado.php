<?php
if (!empty($_POST)) {
    include '../../libs/conexion.php';
    include "../../models/metodosEmpleados.php";

    $nombre = trim($_POST['nombre']);
    $username = trim($_POST['username']);
    $password = md5(trim($_POST['password']));
    $correo = trim($_POST['correo']);
    $dui = trim($_POST['dui']);
    $fechanac = trim($_POST['fechanac']);
    $numero = trim($_POST['numero']);
    $genero = trim($_POST['genero']);
    $cargo = trim($_POST['cargo']);

    $obj = new MetodosEmpleados();
    $obj->actualizarEmpleado($password, $nombre, $correo, $dui, $fechanac, $numero, $genero, $cargo, $username);
    
    header('Location: ../../views/Admin/ver_empleados.php');
}
