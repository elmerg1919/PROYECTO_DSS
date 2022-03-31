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

    <form action="insertar.php" method="post">
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
        <button>AGREGAR</button>
    </form>
    <br><br>
        <table style="border-collapse: collapse;" border="2">
            <tr>
                <td>CODIGO</td>
                <td>NOMBRE</td>
                <td>CATEGORIA</td>
                <td>IMAGEN</td>
                <td>ACTUALIZAR</td>
                <td>Eliminar</td>
                <!--<td>a</td>-->
            </tr>
<?php
$obj= new metodos();
$sql="SELECT Plat_Codigo,Plat_Nombre,Plat_Categoria,Plat_Imagen from platillo";
$datos=$obj->MostrarDatos($sql);
foreach($datos as $key){


?>
            <tr>
            <td><?php echo $key['Plat_Codigo'];?></td>
            <td><?php echo $key['Plat_Nombre'];?></td>
            <td><?php echo $key['Plat_Categoria'];?></td>
            <td><?php echo $key['Plat_Imagen'];?></td>
            <!--<td><?php/* echo $key['Admin_User'];*/?></td>-->
            <td><a href="editar.php?Clien_User=<?php echo $key['Clien_User']; ?>">Editar 
        </a></td>
        <td><a href="Eliminar.php?Clien_User=<?php echo $key['Clien_User']; ?>">Eliminar
        </a></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </body>
</html>