<?php
session_start();
if (!isset($_SESSION['intentos-admin'])) {
    $_SESSION['intentos-admin'] = 0;
}
if (isset($_SESSION["locked-admin"])) {
    $difference = time() - $_SESSION["locked-admin"];
    if ($difference > 30) {
        unset($_SESSION["locked-admin"]);
        unset($_SESSION["intentos-admin"]);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador Login</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="../../../../css/styles.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<?php
include '../../../dark-theme.php';
?>

<body>

    <div class="topnav">
        <a href="../../../../index.php">
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
        <a href="../index.php">
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

    <div class="contenedor">
        <h2>Login Administrador</h2>
        <p>Intentos fallidos: <?php
                                if (isset($_SESSION['intentos-admin'])) {
                                    echo $_SESSION['intentos-admin'];
                                }
                                ?>
        </p>
        <div class="contenido">
            <form action="login-admin.php" method="POST">
                <label for="id">Nombre de usuario o correo electrónico:</label><br>
                <input class="form-control" type="text" name="id" id="input" required><br>
                <label for="password">Contraseña:</label><br>
                <input class="form-control" type="password" name="password" required><br><br>
                <div class="g-recaptcha" data-sitekey="6LfI1EsfAAAAAHlQaXJClOI778RjiduMKeOctzfU"></div>
                <br>
                <?php
                if (isset($_SESSION['intentos-admin'])) {
                    if ($_SESSION["intentos-admin"] > 2) {
                        $_SESSION["locked-admin"] = time();
                        echo 'Ha superado el limite de intentos permitidos. Vuelve a intentarlo mas tarde.';
                    } else {

                ?>
                        <button class="btn btn-dark" type="submit" name="btnAcceder" id="submit">Acceder</button>
                <?php

                    }
                }

                ?>
            </form>
            <br>
            <?php
            # si hay un mensaje, mostrarlo
            if (isset($_GET["mensaje"])) { ?>
                <div class="alert alert-info">
                    <?php echo $_GET["mensaje"] ?>
                </div>
            <?php } ?>
            <a href="form-contra.php">
                <p>Olvide mi contraseña</p>
            </a>
        </div>
        <a href="../index.php">
            <p>Regresar</p>
        </a>
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