<?php
require_once "C:/wamp64/www/PROYECTO_DSS/php/Crud/Reservaciones/MetodosRes.php";
require_once "../../conexion.php";
session_start();
if (!isset($_SESSION['id_username'])) {
    header("Location: ../Login/admin/admin.php");
}
$usuario=$_SESSION['id_username'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio</title>
    <link rel="stylesheet" type="text/css" href="../../../css/index.css">
    <link rel="stylesheet" type="text/css" href="../../../css/styles.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<?php
include '../../dark-theme.php';
?>

<body>

    <div class="topnav">
        <a href="../../../index.php">
            <p>La Costeña</p>
        </a>
        <a href="#">
            <p>About</p>
        </a>
        <a href="#">
            <p>Contact</p>
        </a>
        <a href="#">
            <p>YouTube</p>
        </a>
        <a href="../Login/clientes/cerrar-sesion.php">
            <p>Cerrar sesión</p>
        </a>
        <a href="#">
            <label class="switch">
                <input class="btn btn-dark" type="checkbox" id="toggleTheme" <?php
                                                                                if (isset($_COOKIE["theme"])) {
                                                                                    if ($_COOKIE["theme"] == "dark") {
                                                                                        echo "checked";
                                                                                    }
                                                                                } ?>></label></a>

    </div>
    <h2>Usuario: <?php echo $_SESSION['id_username']; ?></h2>
    <div class="datos">
        <?php
        
        $obj = new metodos();
        $sql = "SELECT Res_Telefono,
        Clien_User,
        Res_Nombre,
        Res_Email,
        Res_Cantidad,
        Res_Fecha,
        Res_Hora from reservacion 
        where Clien_User='$usuario'";
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
                        </tr>
            <?php
                }
            }

        ?>
            </table>
    </div>
    <script>
        $("#toggleTheme").on('change', function() {
            if ($(this).is(':checked')) {
                $(this).attr('value', 'true');
                document.cookie = "theme=dark";
                location.reload();
            } else {
                $(this).attr('value', 'false');
                document.cookie = 'theme=light';
                location.reload();
            }
        });
    </script>
</body>

</html>