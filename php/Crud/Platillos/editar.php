<?php

require_once "C:/wamp64/www/PROYECTO_DSS/php/Conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();
$id=$_GET['Plat_Codigo'];
$sql="SELECT Plat_Codigo,Plat_Nombre,Plat_Categoria,Plat_Imagen
from platillo where Plat_Codigo ='$id'";
$result=mysqli_query($conexion,$sql);
$ver=mysqli_fetch_row($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
</head>
<body>
    
</body>
    <form action="actualizar.php" method="post"  enctype="Multipart/form-data">
        <input type="text" hidden="" value="<?php echo $id?>" name="id" >
        <label >NUEVO CODIGO:</label>
        <p></p>
        <input type="number" name="txtCodigo" value="<?php echo $ver[0]?>">
        <P></P>
        <label >NUEVO NOMBRE</label>
        <P></P>
        <input type="text" name="txtNombre" value="<?php echo $ver[1]?>">
        <p></p>
        <label >NUEVA CATEGORIA:</label>
        <p></p>
        <input type="text" name="txtCategoria" value="<?php echo $ver[2]?>">
        <p></p>
        
        <label >NUEVO IMAGEN</label>
        <p></p>
        <input type="file" name="impimagen" id="">
        <p></p>
        <!--<input type="file" name="imagen" id="">-->
        <p></p>
        <button>AGREGAR</button>
    </form>
</html>