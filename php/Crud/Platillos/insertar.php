<?php
require_once "metodosCrud.php";
require_once "C:/wamp64/www/PROYECTO_DSS/php/Conexion.php";

$username=$_POST['txtusername'];
$password=$_POST['txtpassword'];
$nombre=$_POST['txtnombre'];
$apellido=$_POST['txtapellido'];

$datos=array(
    $username,
    $password,
    $nombre,
    $apellido
);
$obj= new metodos();
if($obj->InsertarDatos($datos)==1){
    header("location:Mostrar.php");


}
else{
    echo "FALLO FEO";
    }

?>