<?php
require_once "metodosCrud.php";
require_once "C:/wamp64/www/GIT_P/php/Conexion.php";

?>

<!DOCTYPE html>
<html>
    <head>
        <title>CRUD</title>
    </head>
    <body>
        <table style="border-collapse: collapse;" border="2">
            <tr>
                <td>USUARIO</td>
                <td>CONTRASEÑA</td>
                <td>NOMBRE</td>
                <td>APELLIDO</td>
                <td>a</td>
            </tr>
<?php
$obj= new metodos();
$sql="SELECT Clien_User,Clien_Contra,Clien_Nombre,Clien_Apellido,Admin_User from clientes";
$datos=$obj->MostrarDatos($sql);
foreach($datos as $key){


?>
            <tr>
            <td><?php echo $key['Clien_User'];?></td>
            <td><?php echo $key['Clien_Contra'];?></td>
            <td><?php echo $key['Clien_Nombre'];?></td>
            <td><?php echo $key['Clien_Apellido'];?></td>
            <td><?php echo $key['Admin_User'];?></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </body>
</html>