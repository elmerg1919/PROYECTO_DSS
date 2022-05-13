<?php
if (!empty($_POST)) {
    include '../../libs/conexion.php';
    include '../../models/login_admin.php';

    $pass1 = trim($_POST['pass1']);
    $pass2 = trim($_POST['pass2']);
    $username = trim($_POST['username']);

    if ($pass1 == $pass2) {
        $pass = md5($pass1);

        $obj = new MetodosLoginAdmin();
        $obj->restablecerContrasenia($pass, $username);

        header("Location: ../../views/Admin/admin.php");
    } else {
        header("Location: ../../views/Admin/form_nueva_contra.php?mensaje=Las contraseñas no coinciden.");
    }
}
