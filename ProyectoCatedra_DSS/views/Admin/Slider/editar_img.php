<?php
require_once "../../../models/metodosSlider.php";
require_once "../../../libs/connection.php";

$obj = new conectar();
$conexion = $obj->conexion();

$id = $_GET['Id'];
$sql = "SELECT * from slider where Id ='$id'";
$result = mysqli_query($conexion, $sql);
$ver = mysqli_fetch_row($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="../../../public/css/form.css">
    <link rel="stylesheet" type="text/css" href="../../../public/css/styles.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Modificar imagen</title>
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
        <h2>Modificar imagen del slider</h2>
        <form action="../../../controllers/Admin/Slider/actualizar_img.php" method="post" enctype="Multipart/form-data" class="form">
            <label>Id Imagen:</label>
            <input type="text" value="<?php echo $id ?>" name="id" class="form-control" readonly><br>

            <label>Categoría:</label>
            <input type="text" name="txtCategoria" class="form-control" value="<?php echo $ver[1] ?>"><br>

            <label>Estado:</label>
            <input type="text" name="txtEstado" class="form-control" value="<?php echo $ver[3] ?>">
            <button type="submit" class="btn btn-primary">Modificar</button>
        </form>
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