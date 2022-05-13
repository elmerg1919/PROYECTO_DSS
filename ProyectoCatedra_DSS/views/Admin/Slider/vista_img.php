<?php
require_once "../../../models/metodosSlider.php";
require_once "../../../libs/connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../public/css/styles.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Imagenes Slider</title>
</head>

<?php
include '../../dark-theme.php';
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
                        <a class="nav-link" href="../../../index.php">La Costeña</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../about.php">Acerca de</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../contact.php">Contáctanos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">|</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../ver_empleados.php">Empleados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../Platillos/Mostrar.php">Platillos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../Reservaciones/VerResClien.php">Reservaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="vista.php">Slider</a>
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
                    <a href="../../../controllers/cerrar-sesion.php" class="btn btn-danger">Cerrar sesión</a>
                </form>
            </div>
        </div>
    </nav>

    <div class="contenedor">
        <div class="tabla">
            <div class="title2">
                <h2> Imagenes registradas</h2>
            </div>
            <?php
            $obj = new metodos();
            $sql = "SELECT * from slider";
            $datos = $obj->MostrarDatos($sql);

            if ($datos == null) {
            ?>
                <div class="wrapper">No hay Imagenes registradas</div>
            <?php

            } else {
            ?>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <td>#</td>
                            <td>Categoria</td>
                            <td>Estado</td>
                            <td>Imagen</td>
                            <td colspan="2">Acciones</td>
                        </tr>
                    </thead>

                    <?php
                    foreach ($datos as $key) {
                    ?>
                        <tr>
                            <td><?php echo $key['Id']; ?></td>
                            <td><?php echo $key['Categoria']; ?></td>
                            <td><?php echo $key['Estado']; ?></td>
                            <td>
                                <img class="imgTd" src="data:image/jpg;base64,<?php echo  base64_encode($key['Imagen']); ?>">
                            </td>
                            <td><a href="editar_img.php?Id=<?php echo $key['Id']; ?>" class="btn btn-primary">Editar </a></td>
                            <td><a href="../../../controllers/Admin/Slider/eliminar_img.php?Id=<?php echo $key['Id']; ?>" class="btn btn-danger">Eliminar</a></td>
                        </tr>
                <?php
                    }
                }
                ?>
                </table>
                <a href="vista.php">
                    <button class="btn btn-dark">Regresar</button>
                </a><br><br>
        </div>

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