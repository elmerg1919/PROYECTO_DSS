<?php
if (!empty($_POST)) {
    include 'connection.php';
    $username = trim($_POST['username']);

    $cnu = Database::connect();
    $cnu->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = $cnu->prepare("DELETE FROM usuarios WHERE id_username = ?");
    $query->execute(array($username));
    Database::disconnect();
    header("Location: ver_empleados.php");
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <h2>Eliminar empleado</h2>
    <div class="row">
        <div class="col-offset-2 col-md-8">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <a href="ver_empleados.php" class="btn btn-dark">Back</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <h3>Datos del empleado que se va a eliminar</h3>
            <form action="eliminar_empleado.php" method="POST">
                <?php
                $id = null;
                if (!empty($_GET)) {
                    $id = $_GET['id'];
                    include 'connection.php';
                    $cn = Database::connect();
                    $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $query = $cn->prepare("SELECT * FROM usuarios u INNER JOIN cargo c ON u.id_cargo = c.id_cargo;");
                    $query->execute(array($id));
                    $data = $query->fetch(PDO::FETCH_ASSOC);
                    echo '
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" placeholder="" name="nombre" id="nombre" value="' . $data["nombre_usuario"] . '" readonly/><br>
                    </div>
                    <div class="form-group">
                        <label for="username">Nombre de usuario:</label>
                        <input type="text" class="form-control" placeholder="" name="username" id="username" value="' . $data["id_username"] . '" readonly /><br>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="Password" placeholder="" name="password" id="password" value="' . $data["usuario_contra"] . '" readonly/><br>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo electrónico</label>
                        <input type="email" class="form-control" placeholder="" name="correo" id="correo" value="' . $data["correo_usuario"] . '" readonly/><br>
                    </div>
                    <div class="form-group">
                        <label for="dui">Dui</label>
                        <input type="text" class="form-control" placeholder="" name="dui" id="dui" value="' . $data["dui"] . '" readonly/><br>
                    </div>
                    <div class="form-group">
                        <label for="fechanac">Fecha de nacimiento</label>
                        <input type="date" class="form-control" placeholder="" name="fechanac" id="fechanac" value="' . $data["fecha_nacimiento"] . '" readonly/><br>
                    </div>
                    <div class="form-group">
                        <label for="numero">Número electrónico</label>
                        <input type="text" class="form-control" placeholder="" name="numero" id="numero" value="' . $data["numero_telefono"] . '" readonly/><br>
                    </div>
                    <div class="form-group">
                        <label for="genero">Género</label>
                        <input type="text" class="form-control" placeholder="" name="numero" id="numero" value="' . $data["genero"] . '" readonly/><br>
                    </div>
                    <div class="form-group">
                        <label for="cargo">Cargo</label>
                        <input type="text" class="form-control" placeholder="" name="numero" id="numero" value="' . $data["nombre_cargo"] . '" readonly/><br><br>
                    </div>                   
                
                ';
                    Database::disconnect();
                }
                ?>
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>

</body>

</html>