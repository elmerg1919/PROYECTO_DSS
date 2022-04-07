<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña</title>
    <link rel="stylesheet" href="../../../../css/styles.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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

    <div class="contenedor">
        <h2>Recuperar contraseña</h2>
        <form action="cliente-recuperar-contra.php" method="POST">
            <label for="username">Ingresa tu nombre de usuario:</label><br>
            <input type="text" name="username" required><br><br>
            <div class="g-recaptcha" data-sitekey="6LfI1EsfAAAAAHlQaXJClOI778RjiduMKeOctzfU"></div>
            <br>

            <button class="btn btn-success" type="submit" name="submit">Enviar</button>
        </form>
        <?php
        # si hay un mensaje, mostrarlo
        if (isset($_GET["mensaje"])) { ?>
            <div class="alert alert-info">
                <?php echo $_GET["mensaje"] ?>
            </div>
        <?php } ?>
        <p><a href="cliente.php">Regresar</a></p>
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