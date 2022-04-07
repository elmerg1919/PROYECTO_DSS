<?php

require_once "../../Conexion.php";
$obj = new conectar();
$conexion = $obj->conexion();
$id = $_GET['Clien_User'];
$sql = "SELECT Clien_User,Clien_Contra,Clien_Nombre,Clien_Apellido
from clientes where Clien_User ='$id'";
$result = mysqli_query($conexion, $sql);
$ver = mysqli_fetch_row($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../../css/form.css">
    <title>Editar Cliente</title>
</head>

<body>

</body>
<div class="wrapper">
    <div class="title">
        <h1> Editar cliente</h1>
    </div>
    <form action="actualizar.php" method="post" class="form">
        <div class="inputfield">
            <input type="text" hidden="" value="<?php echo $id ?>" name="id">
            <label>Nombre de usuario:</label>
            <input type="text" name="txtusername" value="<?php echo $ver[0] ?>" class="input">
        </div>

        <div class="inputfield">
            <label>Contraseña:</label>
            <input type="text" name="txtpassword" value="<?php echo $ver[1] ?>" class="input">
        </div>

        <div class="inputfield">
            <label>Nombre</label>
            <input type="text" name="txtnombre" value="<?php echo $ver[2] ?>" class="input">
        </div>

        <div class="inputfield">
            <label>Apellido</label>
            <input type="text" name="txtapellido" value="<?php echo $ver[3] ?>" class="input">
        </div>

        <button class="btn">Guardar Cambios</button>
    </form>
</div>

</html>