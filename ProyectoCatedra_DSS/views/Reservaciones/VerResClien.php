<?php
require_once "../../models/MetodosRes.php";
require_once "../../libs/connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio</title>
    <link rel="stylesheet" type="text/css" href="../../public/css/index.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/styles.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<?php
include '../dark-theme.php';
?>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../../index.php">La Costeña</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../about.php">Acerca de</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../contact.php">Contáctanos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">|</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Admin/ver_empleados.php">Empleados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Platillos/Mostrar.php">Platillos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="VerResClien.php">Reservaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Admin/Slider/vista.php">Slider</a>
                    </li>
                    <li class="nav-item">
                        <a href="#">
                            <label class="switch">
                                <input class="btn btn-dark" type="checkbox" id="toggleTheme" <?php if (isset($_COOKIE["theme"])) {
                                                                                                    if ($_COOKIE["theme"] == "dark") {
                                                                                                        echo "checked";
                                                                                                    }
                                                                                                } ?>>
                            </label>
                        </a>
                    </li>
                </ul>
                <form class="d-flex">
                    <a href="../../controllers/cerrar-sesion.php" class="btn btn-danger">Cerrar sesión</a>
                </form>
            </div>
        </div>
    </nav>
    <div class="datos">
        <?php

        $obj = new metodos();
        $sql = "SELECT * from reservacion";
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
                    <th>#</th>
                    <th>Telefono</th>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>N° Invitados</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th colspan="2">Acciones</th>
                </tr>
                <?php
                foreach ($datos as $key) {
                ?>
                    <tr>
                        <td><?php echo $key['id_reserva']; ?></td>
                        <td><?php echo $key['Res_Telefono']; ?></td>
                        <td><?php echo $key['Clien_User']; ?></td>
                        <td><?php echo $key['Res_Nombre']; ?></td>
                        <td><?php echo $key['Res_Email']; ?></td>
                        <td><?php echo $key['Res_Cantidad']; ?></td>
                        <td><?php echo $key['Res_Fecha']; ?></td>
                        <td><?php echo $key['Res_Hora']; ?></td>
                        <td><a href="EditarRes.php?Clien_User=<?php echo $key['id_reserva']; ?>" class="edit">Editar</a></td>
                        <td><a href="../../controllers/Reservaciones/EliminarRES.php?Clien_User=<?php echo $key['id_reserva']; ?>" class="eliminar">Eliminar</a></td>
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