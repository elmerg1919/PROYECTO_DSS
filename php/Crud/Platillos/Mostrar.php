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

    <form action="insertar.php" method="post" enctype="Multipart/form-data">
        <label >CODIGO:</label>
        <p></p>
        <input type="number" name="txtCodigo" id="">
        <P></P>
        <label >NOMBRE:</label>
        <p></p>
        <input type="text" name="txtNombre" id="">
        <p></p>
        <label >CATEGORIA:</label>
        <P></P>
        <input type="text" name="txtCategoria" id="">
        <p></p>
        <label >Selecciones una imagen</label>
        <p></p>
        <input type="file" name="impimagen" id="">
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
            <td> 
            <img width="500" src="data:image/jpg;base64,<?php echo  base64_encode ($key['Plat_Imagen']);?>">
                </td>

            <!--<td><?php /*echo $key['Plat_Imagen'];?></td>-->
            <!--<td><?php/* echo $key['Admin_User'];*/?></td>-->
            <td><a href="editar.php?Plat_Codigo=<?php echo $key['Plat_Codigo']; ?>">Editar 
        </a></td>
        <td><a href="Eliminar.php?Plat_Codigo=<?php echo $key['Plat_Codigo']; ?>">Eliminar
        </a></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </body>
</html>