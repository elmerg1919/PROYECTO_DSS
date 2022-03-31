<?php
$id=$_GET['Clien_User'];

require_once "metodosCrud.php";
require_once "C:/wamp64/www/PROYECTO_DSS/php/Conexion.php";

$obj= new metodos();
if($obj-> EliminarDatos($id)==1){
    header("location:Mostrar.php");
}
else{
    echo "FALLO FEO";
    }
?>