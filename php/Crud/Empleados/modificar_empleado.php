<?php
if (!empty($_POST)) {
    include 'connection.php';
    $nombre = trim($_POST['nombre']);
    $username = trim($_POST['username']);
    $password = md5(trim($_POST['password']));
    $correo = trim($_POST['correo']);
    $dui = trim($_POST['dui']);
    $fechanac = trim($_POST['fechanac']);
    $numero = trim($_POST['numero']);
    $genero = trim($_POST['genero']);
    $cargo = trim($_POST['cargo']);

    $cnu = Database::connect();
    $cnu->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = $cnu->prepare("UPDATE usuarios SET usuario_contra = ?, nombre_usuario = ?, correo_usuario = ?, dui = ?, fecha_nacimiento = ?, numero_telefono = ?, genero = ?, id_cargo = ? WHERE id_username = ?");
    $query->execute(array($password, $nombre, $correo, $dui, $fechanac, $numero, $genero, $cargo, $username));
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
    <title>Modificar empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <h2>Modificar empleado</h2>
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
            <form action="modificar_empleado.php" method="POST">
                <?php
                $id = null;
                if (!empty($_GET)) {
                    $id = $_GET['id'];
                    include 'connection.php';
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
            </form>
        </div>
    </div>

</body>

</html>