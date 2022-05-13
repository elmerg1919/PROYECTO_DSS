<?php
if (!empty($_POST)) {
    include '../../libs/conexion.php';
    include '../../models/login_cliente.php';

    $pass1 = trim($_POST['pass1']);
    $pass2 = trim($_POST['pass2']);
    $username = trim($_POST['username']);

    if ($pass1 == $pass2) {
        $pass = md5($pass1);

        $obj = new MetodosLoginCliente();
        $obj->restablecerContrasenia($pass, $username);

        header("Location: ../../views/Clientes/clientes.php");
    } else {
        header("Location: ../../views/Clientes/form_nueva_contra_cliente.php?mensaje=Las contraseñas no coinciden.");
    }
}
