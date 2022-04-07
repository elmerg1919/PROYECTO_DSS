<?php
session_start();
if (!isset($_SESSION['id_user_contra'])) {
    header("Location: recuperar-contra.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva contraseña</title>
    <link rel="stylesheet" href="../../../../css/styles.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<?php
include '../../../dark-theme.php';
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
        <a href="php/Crud/Login/index.php">
            <p>Iniciar sesión</p>
        </a>
        <a href="#"><label class="switch">
                <input class="btn btn-dark" type="checkbox" id="toggleTheme" <?php
                                                                                if (isset($_COOKIE["theme"])) {
                                                                                    if ($_COOKIE["theme"] == "dark") {
                                                                                        echo "checked";
                                                                                    }
                                                                                } ?>></label></a>

    </div>

    <form action="nueva-contra.php" method="POST">
        <h2>Nueva contraseña</h2>
        <label for="username">Usuario</label><br>
        <input class="form-control" type="text" name="username" value="<?php echo $_SESSION['id_user_contra'] ?>" readonly><br>
        <label for="pass1">Ingresa tu nueva contraseña:</label><br>
        <input class="form-control" type="password" name="pass1"><br>
        <label for="pass2">Confirma tu contraseña:</label><br>
        <input class="form-control" type="password" name="pass2"><br><br>

        <button class="btn btn-secondary" type="submit" name="submit">Cambiar</button>
    </form>
    <?php
    # si hay un mensaje, mostrarlo
    if (isset($_GET["mensaje"])) { ?>
        <div class="alert alert-info">
            <?php echo $_GET["mensaje"] ?>
        </div>
    <?php } ?>
    <p><a href="admin.php">Regresar</a></p>

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
<?php
if (!empty($_POST)) {
    include '../conexion.php';
    include 'metodos-login-admin.php';

    $pass1 = trim($_POST['pass1']);
    $pass2 = trim($_POST['pass2']);
    $username = trim($_POST['username']);

    if ($pass1 == $pass2) {
        $pass = md5($pass1);

        $obj = new MetodosLoginAdmin();
        $obj->restablecerContrasenia($pass, $username);

        header("Location: admin.php");
    } else {
        header("Location: nueva-contra.php?mensaje=Las contraseñas no coinciden.");
    }
}
?>