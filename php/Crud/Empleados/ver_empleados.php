<?php
include 'connection.php';

$cn = Database::connect();
$cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = $cn->prepare("SELECT * FROM usuarios u INNER JOIN cargo c ON u.id_cargo = c.id_cargo;");
$query->execute();
Database::disconnect();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <h2>Empleados registrados</h2>

    <div class="contenedor">
        <div class="row">
            <div class="col-offset-2 col-md-8">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <a href="registrar_empleado.php" class="btn btn-success">Registrar empleado</a>
                    </div>
                </div>
            </div>
        </div>
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
                        <td><?php echo '								
							<a href="modificar_empleado.php?id=' . $row["id_username"] . '" class="btn btn-primary">Modificar</a>
							<a href="eliminar_empleado.php?id=' . $row["id_username"] . '" class="btn btn-danger">Eliminar</a>
							'; ?></td>

                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div class="row">
            <div class="col-offset-2 col-md-8">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <a href="admin_home.php" class="btn btn-dark">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>