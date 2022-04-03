<?php
require_once "metodosCrud.php";
require_once "C:/wamp64/www/PROYECTO_DSS/php/Conexion.php";

?>

<!DOCTYPE html>
<html>
    <head>
        <title>CRUD</title>
    </head>
    <body>

    <form action="insertar_Regis.php" method="post">
        <label >NOMBRE DE USUARIO:</label>
        <p></p>
        <input type="text" name="txtusername" id="">
        <P></P>
        <label >CONTRASEÑA:</label>
        <p></p>
        <input type="text" name="txtpassword" id="">
        <p></p>
        <label >NOMBRE</label>
        <P></P>
        <input type="text" name="txtnombre" id="">
        <p></p>
        <label >APELLIDO</label>
        <p></p>
        <input type="text" name="txtapellido" id="">
        <p></p>
        <input type="file" name="imagen" id="">
        <p></p>
        <button>Registrar</button>
    </form>

        
    </body>
</html>