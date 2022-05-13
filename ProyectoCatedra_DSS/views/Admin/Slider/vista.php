<?php
require_once "../../../models/metodosSlider.php";
require_once "../../../libs/connection.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Imagenes</title>
    <link rel="stylesheet" type="text/css" href="../../../public/css/form.css">
    <link rel="stylesheet" type="text/css" href="../../../public/css/styles.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
        <div class="wrapper">
            <h2>Imagenes</h2>
            <form action="../../../controllers/Admin/Slider/insertar_img.php" method="post" enctype="Multipart/form-data" class="form">
                <legend>Ingresar imagen</legend>

                <label for="txtCategoria" class="form-label">Categoria:</label>
                <input type="text" name="txtCategoria" class="form-control" required>

                <div class="form-group">
                    <label for="estado" class="form-label">Estado</label>
                    <select name="txtEstado" class="form-select" required>
                        <option value="H">Habilitado</option>
                        <option value="D">Desabilitado</option>
                    </select><br>
                </div>

                <div class="inputfield">
                    <label>Selecciona una imagen</label>
                    <input type="file" name="impimagen" id="archivo" class="form-select" required>
                    <label for="archivo" class="labelArchivo"><span> Elegir un archivo&hellip;</span></label>

                </div>

                <button class="btn btn-success">Agregar</button><br>
            </form>
            <a href="vista_img.php">
                <button class="btn btn-primary">Ver imagenes</button>
            </a><br><br>
            <a href="../home.php">
                <button class="btn btn-dark">Regresar</button>
            </a>
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