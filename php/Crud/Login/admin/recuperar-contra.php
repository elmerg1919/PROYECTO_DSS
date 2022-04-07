<?php
session_start();
if (isset($_POST['submit']) && $_POST['g-recaptcha-response'] != "") {
    include '../conexion.php';
    include 'metodos-login-admin.php';

    $secret = '6LfI1EsfAAAAADj8_Hw1_FVTrvhpi0xKj9Dxp-WT';
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);

    $username = trim($_POST['username']);
    $correo = trim($_POST['correo']);
    $estadoH = "H";

    $obj = new MetodosLoginAdmin();
    $obj->buscarUsuarioContra($correo, $username, $estadoH);
} else {
    header("Location: form-contra.php?mensaje=Completa la verificación de Captcha.");
}
