<?php
session_start();
if (!isset($_SESSION['id_username'])) {
    header("Location: ../../views/Admin/admin.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar empleado</title>
    <link rel="stylesheet" type="text/css" href="../../public/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
                        <a class="nav-link" href="ver_empleados.php">Empleados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Platillos/Mostrar.php">Platillos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Reservaciones/VerResClien.php">Reservaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Slider/vista.php">Slider</a>
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
        <div class="form">
            <h2>Modificar empleado</h2>
            <form action="../../controllers//Admin/modificar_empleado.php" method="POST">
                <?php
                $id = null;
                if (!empty($_GET)) {
                    $id = $_GET['id'];
                    include '../../libs/conexion.php';
                    $cn = Database::connect();
                    $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $query = $cn->prepare("SELECT * FROM usuarios where id_username = ?");
                    $query->execute(array($id));
                    $data = $query->fetch(PDO::FETCH_ASSOC);
                    echo '
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" placeholder="" name="nombre" id="nombre" value="' . $data["nombre_usuario"] . '" required/><br>
                </div>
                <div class="form-group">
                    <label for="username">Nombre de usuario:</label>
                    <input type="text" class="form-control" placeholder="" name="username" id="username" value="' . $data["id_username"] . '" readonly /><br>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" id="Password" placeholder="" name="password" id="password" value="' . $data["usuario_contra"] . '" required/><br>
                </div>
                <div class="form-group">
                    <label for="correo">Correo electrónico</label>
                    <input type="email" class="form-control" placeholder="" name="correo" id="correo" value="' . $data["correo_usuario"] . '" pattern="[a-zA-Z0-9._-]*@[a-zA-Z]*\.[a-zA-Z]{2,3}" required/><br>
                </div>
                <div class="form-group">
                    <label for="dui">Dui</label>
                    <input type="text" class="form-control" placeholder="" name="dui" id="dui" value="' . $data["dui"] . '" pattern="[0-9]{8}-[0-9]{1}" required/><br>
                </div>
                <div class="form-group">
                    <label for="fechanac">Fecha de nacimiento</label>
                    <input type="date" class="form-control" placeholder="" name="fechanac" id="fechanac" value="' . $data["fecha_nacimiento"] . '" required/><br>
                </div>
                <div class="form-group">
                    <label for="numero">Número electrónico</label>
                    <input type="text" class="form-control" placeholder="" name="numero" id="numero" value="' . $data["numero_telefono"] . '" pattern="[267]{1}[0-9]{3}-[0-9]{4}" required/><br>
                </div>
                <div class="form-group">
                    <label for="genero">Género</label>
                    <select name="genero" id="genero" class="form-control">
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select><br>
                </div>
                <div class="form-group">
                    <label for="cargo">Cargo</label>
                    <select name="cargo" id="cargo" class="form-control">
                     ';

                    $cn = Database::connect();
                    $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $query = $cn->prepare("SELECT * FROM cargo");
                    $query->execute();
                    Database::disconnect();

                    $value = 1;
                    foreach ($query as $row) {
                ?>
                        <option value="<?php echo $value; ?>"><?php echo $row['nombre_cargo']; ?></option>
                <?php
                        $value++;
                    }

                    echo '
                    </select><br>
                </div>                   
            
            ';
                    Database::disconnect();
                }
                ?>
                <button type="submit" class="btn btn-success">Modificar</button>
            </form><br>
            <a href="ver_empleados.php" class="btn btn-dark">Regresar</a>
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