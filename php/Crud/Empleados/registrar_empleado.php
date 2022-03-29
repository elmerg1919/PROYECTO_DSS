<?php
include 'connection.php';
if (!empty($_POST)) {
    $nombre = trim($_POST['nombre']);
    $username = trim($_POST['username']);
    $password = md5(trim($_POST['password']));
    $correo = trim($_POST['correo']);
    $dui = trim($_POST['dui']);
    $fechanac = trim($_POST['fechanac']);
    $numero = trim($_POST['numero']);
    $genero = trim($_POST['genero']);
    $cargo = trim($_POST['cargo']);
    $estado = trim($_POST['estado']);

    $cn = Database::connect();
    $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = $cn->prepare("INSERT INTO usuarios(nombre_usuario, id_username, usuario_contra, correo_usuario, dui, fecha_nacimiento, numero_telefono, genero, id_cargo, estado_usuario) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $query->execute(array($nombre, $username, $password, $correo, $dui, $fechanac, $numero, $genero, $cargo, $estado));
    Database::disconnect();

    header('Location: ver_empleados.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-offset-2 col-md-8">
                        <h1>Crear un nuevo usuario</h1>
                    </div>
                </div>
            </div>
        </div>
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
                <form action="registrar_empleado.php" method="POST">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" placeholder="Ingresa tu nombre completo" name="nombre" id="nombre" required /><br>
                    </div>
                    <div class="form-group">
                        <label for="username">Nombre de usuario:</label>
                        <input type="text" class="form-control" placeholder="Ingresa tu nombre de usuario" name="username" id="username" required /><br>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="Password" placeholder="*****" name="password" id="password" required /><br>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo electrónico</label>
                        <input type="email" class="form-control" placeholder="Ej: correo@gmail.com" name="correo" id="correo" pattern="[a-zA-Z0-9._-]*@[a-zA-Z]*\.[a-zA-Z]{2,3}" required /><br>
                    </div>
                    <div class="form-group">
                        <label for="dui">Dui</label>
                        <input type="text" class="form-control" placeholder="Ej: 00000000-0" name="dui" id="dui" pattern="[0-9]{8}-[0-9]{1}" required /><br>
                    </div>
                    <div class="form-group">
                        <label for="fechanac">Fecha de nacimiento</label>
                        <input type="date" class="form-control" name="fechanac" id="fechanac" required /><br>
                    </div>
                    <div class="form-group">
                        <label for="numero">Número electrónico</label>
                        <input type="text" class="form-control" placeholder="Ej: 7777-7777" name="numero" id="numero" pattern="[267]{1}[0-9]{3}-[0-9]{4}" required /><br>
                    </div>
                    <div class="form-group">
                        <label for="genero">Género</label>
                        <select name="genero" id="genero" class="form-control" required>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select><br>
                    </div>
                    <div class="form-group">
                        <label for="cargo">Cargo</label>
                        <select name="cargo" id="cargo" class="form-control" required>
                            <?php
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
                            ?>
                        </select><br>
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select name="estado" id="estado" class="form-control" required>
                            <option value="H">Habilitado</option>
                            <option value="D">Desabilitado</option>
                        </select><br>
                    </div>

                    <button type="submit" class="btn btn-success">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>