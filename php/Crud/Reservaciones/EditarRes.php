<?php

require_once "../../Conexion.php";
$obj = new conectar();
$conexion = $obj->conexion();
$id = $_GET['Clien_User'];
$sql = "SELECT Res_Telefono,Clien_User,
Res_Nombre,
Res_Email,
Res_Cantidad,
Res_Fecha,
Res_Hora

from reservacion where Clien_User ='$id'";
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
            <label>Telefono:</label>
            <input type="text" name="txttelefono" value="<?php echo $ver[0] ?>" class="input">
        </div>

        <div class="inputfield">
            <label>Usuario:</label>
            <input type="text" name="txtUsername" value="<?php echo $ver[1] ?>" class="input">
        </div>
        
        <div class="inputfield">
            <label>Nombre:</label>
            <input type="text" name="txtnombre" value="<?php echo $ver[2] ?>" class="input">
        </div>

        <div class="inputfield">
            <label>Correo:</label>
            <input type="email" name="txtcorreo" value="<?php echo $ver[3] ?>" class="input">
        </div>

        <div class="inputfield">
            <label>N° de Invitados:</label>
            <input type="number" name="txtcantidad" value="<?php echo $ver[4] ?>" class="input">
        </div>

        <div class="inputfield">
            <label>Fecha:</label>
           
            <input type="datetime" name="txtfecha" value="<?php echo $ver[5] ?>" class="input">
        </div>

        <div class="inputfield">
            <label>Hora:</label>
            <input type="text" name="txthora" value="<?php echo $ver[6] ?>" class="input">
        </div>


        <button class="btn">Guardar Cambios</button>
    </form>
</div>

</html>