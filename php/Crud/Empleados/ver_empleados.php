<?php
include 'connection.php';

session_start();
if (!isset($_SESSION['id_username'])) {
    header("Location: ../Login/admin/admin.php");
} else {
    $cn = Database::connect();
    $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = $cn->prepare("SELECT * FROM usuarios u INNER JOIN cargo c ON u.id_cargo = c.id_cargo;");
    $query->execute();
    Database::disconnect();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver empleados</title>
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
        <a href="../Login/admin/cerrar-sesion.php">
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


    <div class="contenedor">
        <h2>Empleados registrados</h2>
        <div class="row">
            <div>
                <a href="registrar_empleado.php" class="btn btn-success">Registrar empleado</a>
            </div>
        </div>
        <div class="tabla">
            <table class="table">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Nombre Empleado</th>
                        <th>Dui</th>
                        <th>Correo Electrónico</th>
                        <th>Fecha de nacimiento</th>
                        <th>Número telefónico</th>
                        <th>Género</th>
                        <th>Cargo</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    foreach ($query as $row) {
                    ?>
                        <tr>
                            <td><?php echo $row['id_username']; ?></td>
                            <td><?php echo $row['nombre_usuario']; ?></td>
                            <td><?php echo $row['dui']; ?></td>
                            <td><?php echo $row['correo_usuario']; ?></td>
                            <td><?php echo $row['fecha_nacimiento']; ?></td>
                            <td><?php echo $row['numero_telefono']; ?></td>
                            <td><?php echo $row['genero']; ?></td>
                            <td><?php echo $row['nombre_cargo']; ?></td>
                            <td><?php echo $row['estado_usuario']; ?></td>
                            <td>
                                <?php
                                if ($row["estado_usuario"] == "H") {
                                    echo '                                                        
                                <a href="inhabilitar_empleado.php?id=' . $row["id_username"] . '" class="btn btn-light">Inhabilitar</a>	                                
                                ';
                                } else {
                                    echo '   
                                <a href="habilitar_empleado.php?id=' . $row["id_username"] . '" class="btn btn-dark">Habilitar</a>	
                                ';
                                }
                                ?>
                                <?php echo '                               							
							<a href="modificar_empleado.php?id=' . $row["id_username"] . '" class="btn btn-primary">Modificar</a>
							<a href="eliminar_empleado.php?id=' . $row["id_username"] . '" class="btn btn-danger">Eliminar</a>
							'; ?>
                            </td>

                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div>
                <a href="admin_home.php" class="btn btn-dark">Regresar</a>
            </div>
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