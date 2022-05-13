<?php
session_start();
if (!isset($_SESSION['numTries'])) {
    $_SESSION['numTries'] = 0;
}
if (isset($_SESSION["locked"])) {
    $difference = time() - $_SESSION["locked"];
    if ($difference > 30) {
        unset($_SESSION["locked"]);
        unset($_SESSION["numTries"]);
    }
}
if (isset($_SESSION['id_username'])) {
    header("Location: home.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes Login</title>
    <link rel="stylesheet" href="../../public/css/styles.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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

    <div class="contenedor-cliente">
        <h2>Login Clientes</h2>
        <p>Intentos fallidos: <?php
                                if (isset($_SESSION['numTries'])) {
                                    echo $_SESSION['numTries'];
                                }
                                ?>
        </p>
        <div class="contenido">
            <form action="../../controllers/Clientes/login_cliente.php" method="POST">
                <label for="id">Nombre de usuario o correo electrónico:</label><br>
                <input class="form-control" type="text" name="id" required><br>
                <label for="password">Contraseña:</label><br>
                <input class="form-control" type="password" name="password" required><br><br>
                <div class="g-recaptcha" data-sitekey="6LfI1EsfAAAAAHlQaXJClOI778RjiduMKeOctzfU"></div>
                <br>

                <?php
                if (isset($_SESSION['numTries'])) {
                    if ($_SESSION["numTries"] > 2) {
                        $_SESSION["locked"] = time();
                        echo 'Ha superado el limite de intentos permitidos. Vuelve a intentarlo mas tarde.';
                    } else {

                ?>
                        <button class="btn btn-success" type="submit" name="btnAcceder" id="submit">Acceder</button>
                <?php

                    }
                }

                ?>
            </form>
            <hr>
            <?php
            # si hay un mensaje, mostrarlo
            if (isset($_GET["mensaje"])) { ?>
                <div class="alert alert-info">
                    <?php echo $_GET["mensaje"] ?>
                </div>
            <?php } ?>
            <div class="btnRegis">
                <a href="Registros_Cli.php">
                    <button class="btn btn-primary">Registrarse</button>
                </a><br><br>
            </div>
        </div>
        <a href="form_recuperar_contra.php"><button class="btn btn-danger">Olvide mi contraseña</button></a>
        <a href="../Login/login.php"><button class="btn btn-dark">Regresar</button></a>
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