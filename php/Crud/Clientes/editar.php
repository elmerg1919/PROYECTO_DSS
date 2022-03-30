<?php

require_once "C:/wamp64/www/PROYECTO_DSS/php/Conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();
$id=$_GET['Clien_User'];
$sql="SELECT Clien_User,Clien_Contra,Clien_Nombre,Clien_Apellido
from clientes where Clien_User ='$id'";
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
    <form action="actualizar.php" method="post">
        <input type="text" hidden="" value="<?php echo $id?>" name="id" >
        <label >NOMBRE DE USUARIO:</label>
        <p></p>
        <input type="text" name="txtusername" value="<?php echo $ver[0]?>">
        <P></P>
        <label >CONTRASEÑA:</label>
        <p></p>
        <input type="text" name="txtpassword" value="<?php echo $ver[1]?>">
        <p></p>
        <label >NOMBRE</label>
        <P></P>
        <input type="text" name="txtnombre" value="<?php echo $ver[2]?>">
        <p></p>
        <label >APELLIDO</label>
        <p></p>
        <input type="text" name="txtapellido" value="<?php echo $ver[3]?>">
        <p></p>
        <!--<input type="file" name="imagen" id="">-->
        <p></p>
        <button>AGREGAR</button>
    </form>
</html>