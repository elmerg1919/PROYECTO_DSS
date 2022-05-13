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
        <div class="wrapper">
            <div class="title">
                <h1> Platillos</h1>
            </div>

            <form action="../../controllers/Platillos/insertar.php" method="post" enctype="Multipart/form-data" class="form">
                <legend>Ingresar platillos</legend><br>
                <div class="inputfield">
                    <label>Código:</label>
                    <input type="number" name="txtCodigo" id="" class="input" min="1" step="1" required>
                </div>

                <div class="inputfield">
                    <label>Nombre:</label>
                    <input type="text" name="txtNombre" id="" class="input" required>
                </div>
                <div class="inputfield">
                    <label>Precio:  $</label>
                    <input type="text" name="txtPrecio" id="" class="input" required>
                </div>
                <div class="inputfield">
                    <label>Categoria:</label>

                    <select id="inputState" class="form-select" name="txtCategoria" class="input" required>
                        <option value=Desayuno>Desayuno</option>
                        <option value=Almuerzo>Almuerzo</option>
                        <option value=Cena>Cena</option>
                        <option value=Extras>Extras</option>
    </select>
                </div>
                <div class="inputfield">
                    <label>Selecciona una imagen</label>
                    <input type="file" name="impimagen" id="archivo" class="input" required>
                    <label for="archivo" class="labelArchivo">
                        <span> Elegir un archivo&hellip;</span></label>

                </div>
                <div class="inputfield">
                    <label>Descripcion:</label>
                    <textarea class="input" rows="3"  name="txtDescripcion" required></textarea>
                    
                </div>
                
                <button class="btn">Agregar</button>
            </form>
            <a href="mostrar_platillos.php">
                <button class="btn btn-primary">Ver platillos</button>
            </a><br><br>
            <a href="../Admin/home.php">
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