<?php
require_once "../../models/metodosPlatillos.php";
require_once "../../libs/connection.php";
session_start();
if (!isset($_SESSION['id_username'])) {
    header("Location: ../Login/admin/admin.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Platillos</title>
    <link rel="stylesheet" type="text/css" href="../../public/css/form.css">
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
                        <a class="nav-link" href="Mostrar.php">Platillos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Reservaciones/VerResClien.php">Reservaciones</a>
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

    <div class="contenedor">
        <div class="datos">
            <?php
            $obj = new metodos();
            $sql = "SELECT Plat_Codigo,Plat_Nombre,Plat_Categoria,Plat_Imagen,plat_Descripcion,plat_Precio from platillo";
            $datos = $obj->MostrarDatos($sql);


            if ($datos == null) {
            ?>

                <div class="title2">
                    <h1> Platillos registrados</h1>
                </div>
                <div class="wrapper">No hay platillos registrados</div>
            <?php

            } else {
            ?>
                <br><br><br>
                <div class="title2">
                    <h1> Platillos Registrados</h1>
                </div>
                <table style="border-collapse: collapse;" class="table">
                    <tr>
                        <td>Codigo</td>
                        <td>Nombre</td>
                        <td>Precio</td>
                        <td>Categoria</td>
                        <td>Imagen</td>
                        <td>Descripcion</td>
                        <td colspan="2">Acciones</td>
                    </tr>
                    <?php
                    foreach ($datos as $key) {
                    ?>
                        <tr>
                            <td><?php echo $key['Plat_Codigo']; ?></td>
                            <td><?php echo $key['Plat_Nombre']; ?></td>
                            <td><?php echo '$'.$key['plat_Precio']; ?></td>
                            <td><?php echo $key['Plat_Categoria']; ?></td>
                            <td>
                                <img width="35" src="data:image/jpg;base64,<?php echo  base64_encode($key['Plat_Imagen']); ?>">
                            </td>
                            <td><?php echo $key['plat_Descripcion']; ?></td>

                            <!--<td><?php /*echo $key['Plat_Imagen'];?></td>-->
                <!--<td><?php/* echo $key['Admin_User'];*/ ?></td>-->
                            <td><a href="editar.php?Plat_Codigo=<?php echo $key['Plat_Codigo']; ?>" class="edit">Editar </a></td>
                            <td><a href="../../controllers/Platillos/Eliminar.php?Plat_Codigo=<?php echo $key['Plat_Codigo']; ?>" class="eliminar">Eliminar</a></td>
                        </tr>
                <?php
                    }
                }
                ?>
                </table>
                <a href="Mostrar.php">
                    <p class="btn btn-secondary">Regresar</p>
                </a>
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