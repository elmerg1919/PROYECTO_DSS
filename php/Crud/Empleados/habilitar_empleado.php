<?php

include 'connection.php';
$id = null;
$id = $_GET['id'];

$username = trim($_POST['username']);
$estado = "H";

$cnu = Database::connect();
$cnu->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = $cnu->prepare("UPDATE usuarios SET estado_usuario = ? WHERE id_username = ?");
$query->execute(array($estado, $id));
Database::disconnect();
header("Location: ver_empleados.php");
