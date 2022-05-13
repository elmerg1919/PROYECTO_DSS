<?php

require_once "../../libs/connection.php";

$obj = new conectar();
$conexion = $obj->conexion();
$id = $_GET['Clien_User'];
$sql = "SELECT * from reservacion where id_reserva ='$id'";
$result = mysqli_query($conexion, $sql);
$ver = mysqli_fetch_row($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../public/css/form.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/index.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/styles.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Editar Cliente</title>
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
    <div class="wrapper">
        <div class="title">
            <h1> Editar cliente</h1>
        </div>
        <form action="../../controllers/Reservaciones/actualizar.php" method="post" class="form">
            <div class="inputfield">
                <input type="text" hidden="" value="<?php echo $id ?>" name="id">
                <label>Id:</label>
                <input type="text" name="id" value="<?php echo $ver[0] ?>" class="input" readonly>
            </div>

            <div class="inputfield">
                <input type="text" hidden="" value="<?php echo $id ?>" name="id">
                <label>Telefono:</label>
                <input type="text" name="txttelefono" value="<?php echo $ver[1] ?>" class="input">
            </div>

            <div class="inputfield">
                <label>Usuario:</label>
                <input type="text" name="txtUsername" value="<?php echo $ver[2] ?>" class="input">
            </div>

            <div class="inputfield">
                <label>Nombre:</label>
                <input type="text" name="txtnombre" value="<?php echo $ver[3] ?>" class="input">
            </div>

            <div class="inputfield">
                <label>Correo:</label>
                <input type="email" name="txtcorreo" value="<?php echo $ver[4] ?>" class="input">
            </div>

            <div class="inputfield">
                <label>N° de Invitados:</label>
                <input type="number" name="txtcantidad" value="<?php echo $ver[5] ?>" class="input">
            </div>

            <div class="inputfield">
                <label>Fecha:</label>

                <input type="datetime" name="txtfecha" value="<?php echo $ver[6] ?>" class="input">
            </div>

            <div class="inputfield">
                <label>Hora:</label>
                <input type="text" name="txthora" value="<?php echo $ver[7] ?>" class="input">
            </div>


            <button class="btn">Guardar Cambios</button>
        </form>
    </div>
</body>

</html>