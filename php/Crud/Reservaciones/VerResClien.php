<?php
require_once "MetodosRes.php";
require_once "../../conexion.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio</title>
    <link rel="stylesheet" type="text/css" href="../../../css/index.css">
    <link rel="stylesheet" type="text/css" href="../../../css/styles.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="datos">
        <?php
        
        $obj = new metodos();
        $sql = "SELECT Res_Telefono,
        Clien_User,
        Res_Nombre,
        Res_Email,
        Res_Cantidad,
        Res_Fecha,
        Res_Hora from reservacion";
        $datos = $obj->MostrarDatos($sql);
        if ($datos == null) {
        ?>

            <div class="title2">
                <h1> Clientes registrados</h1>
            </div>
            <div class="wrapper">No hay clientes registrados</div>
        <?php

        } else {
        ?>
            <div class="title2">
                <h1> Clientes registrados</h1>
            </div>
            <table style="border-collapse: collapse;" class="table">
                <tr>
                    <td>Telefono</td>
                    <td>Usuario</td>
                    <td>Nombre</td>
                    <td>Correo</td>
                    <td>N° Invitados</td>
                    <td>Fecha</td>
                    <td>Hora</td>
                </tr>
                <?php
                foreach ($datos as $key) {
                ?>
                    <tr>
                        <td><?php echo $key['Res_Telefono']; ?></td>
                        <td><?php echo $key['Clien_User']; ?></td>
                        <td><?php echo $key['Res_Nombre']; ?></td>
                        <td><?php echo $key['Res_Email']; ?></td>
                        <td><?php echo $key['Res_Cantidad']; ?></td>
                        <td><?php echo $key['Res_Fecha']; ?></td>
                        <td><?php echo $key['Res_Hora']; ?></td>
                        <td><a href="EditarRes.php?Clien_User=<?php echo $key['Clien_User']; ?>" class="edit">Editar</a></td>
                        <td><a href="EliminarRES.php?Clien_User=<?php echo $key['Clien_User']; ?>" class="eliminar">Eliminar</a></td>
                    </tr>
            <?php
                }
            }

        ?>
            </table>
    </div>
</body>
</html>