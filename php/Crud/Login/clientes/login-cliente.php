<?php
session_start();
if (isset($_POST['btnAcceder']) && $_POST['g-recaptcha-response'] != "") {
    include '../conexion.php';
    include 'metodos-login-cliente.php';

    $secret = '6LfI1EsfAAAAADj8_Hw1_FVTrvhpi0xKj9Dxp-WT';
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);

    if ($responseData->success) {
        $usuario = trim($_POST['id']);
        $contrasena = trim($_POST['password']);
        $pass = md5($contrasena);

        $obj = new MetodosLoginCliente();
        $obj->buscarCliente($usuario, $pass);
    }
} else {
    header("Location: admin.php?mensaje=Completa la verificación de Captcha.");
}
