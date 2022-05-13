<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Costeña | Contacto</title>
    <link rel="stylesheet" href="../public/css/styles.css" />
    <link rel="stylesheet" href="../public/css/contact.css" />
    <link rel="stylesheet" href="../public/css/footer.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<?php
include 'dark-theme.php';
?>

<body>
    <?php
    require 'navbar.php';
    ?>

    <div class="contact">
        <h1 class="title">Contáctanos</h1>
        <h2 class="title2">Envíanos un comentario</h2>
        <form class="forms">
            <div class="inputfield">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="" class="input">
            </div>

            <div class="inputfield">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" id="" class="input">
            </div>

            <div class="inputfield">
                <label for="email">Email</label>
                <input type="text" name="email" id="" class="input">
            </div>

            <div class="inputfield">
                <label for="contrasena">Número de teléfono</label>
                <input type="number" id="Nombre" min="1" name="nombre" placeholder="(+503)" required class="input">
            </div>
            <div class="inputfield">
                <label for="apellido">Opiniones / sugerencias</label>
                <textarea class="input"></textarea>
            </div>
            <div class="inputfield">
                <input type="submit" value="Enviar" name="Enviar" class="btn">
            </div>

        </form>
    </div>

    <!-- dark mode -->
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
    <?php include 'footer.php'; ?>
</body>

</html>