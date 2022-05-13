<?php
require_once "../../models/metodosCliente.php";
require_once "../../libs/conexion.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>CRUD</title>
    <link rel="stylesheet" type="text/css" href="../../public/css/form.css">
    <link rel="stylesheet" href="../../public/css/styles.css" />
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
                    <a href="../Login/login.php" class="btn btn-light" style="background-color:#01d28e; border:#01d28e;">Iniciar sesión</a>
                </form>
            </div>
        </div>
    </nav>

    <div class="contenedor">
        <div class="wrapper">
            <div class="title">
                <h1> Registrar cliente</h1>
            </div>
            <form action="../../controllers/Clientes/insertar_Regis.php" method="post" class="form">
                <div class="inputfield">
                    <label>Nombre de usuario:</label>
                    <input type="text" name="txtusername" id="" required class="input"> <br>
                </div>
                <div class="inputfield">
                    <label>Contraseña:</label>
                    <input type="password" name="txtpassword" id="" required class="input"><br>
                </div>
                <div class="inputfield">
                    <label>Nombre:</label>
                    <input type="text" name="txtnombre" id="" required class="input"><br>
                </div>
                <div class="inputfield">
                    <label>Apellido:</label>
                    <input type="text" name="txtapellido" id="" required class="input"><br>
                </div>

                <button class="btn btn-success" name="registrarse">Registrarse</button>
            </form>
            <a href="clientes.php"><button class="btn btn-dark" name="registrarse">Regresar</button></a>
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