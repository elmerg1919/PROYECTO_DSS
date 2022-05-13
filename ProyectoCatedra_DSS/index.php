<?php
include 'libs/conexion.php';

date_default_timezone_set("America/El_Salvador");
$fecha = date("G");

$cn = Database::connect();
$cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($fecha >= 5 && $fecha <= 10) {
    $query = $cn->prepare("SELECT * FROM slider WHERE Estado = 'H' AND Categoria = 'Desayunos'");
} else if ($fecha > 10 && $fecha <= 15) {
    $query = $cn->prepare("SELECT * FROM slider WHERE Estado = 'H' AND Categoria = 'Almuerzo'");
} else if ($fecha > 15 && $fecha <= 22) {
    $query = $cn->prepare("SELECT * FROM slider WHERE Estado = 'H' AND Categoria = 'Cenas'");
} else {
    $query = $cn->prepare("SELECT * FROM slider WHERE Estado = 'H' AND Categoria = 'Extra'");
}
$query->execute();
Database::disconnect();
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Costeña</title>
    <link rel="stylesheet" href="public/css/footer.css" />
    <link rel="stylesheet" href="public/css/styles.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Verdana, sans-serif;
        }

        .mySlides {
            display: none;
        }

        img {
            vertical-align: middle;
            background-position: center;
            background-size: cover;
            width: 100%;
            height: 60vh;
            border-radius: 15px;
        }

        /* Slideshow container */
        .slideshow-container {
            width: 50%;
            height: 60vh;
            margin: 0 auto;
            margin-top: 20px;
        }

        .active {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            animation-name: fade;
            animation-duration: 3s;
        }

        @keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
            .text {
                font-size: 11px
            }
        }
    </style>
</head>

<?php
include 'views/dark-theme.php';
?>

<body>
    <div class="contenedor">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">La Costeña</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="views/about.php">Acerca de</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="views/contact.php">Contáctanos</a>
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
                        <a href="views/Login/login.php" class="btn btn-light" style="background-color:#01d28e; border:#01d28e;">Iniciar sesión</a>
                    </form>
                </div>
            </div>
        </nav>

        <h2>La Costeña</h2>
        <div class="slideshow-container">
            <?php
            foreach ($query as $row) {
            ?>
                <div class="mySlides fade">
                    <img src="data:image/jpg;base64,<?php echo  base64_encode($row['Imagen']); ?>">
                </div>
            <?php
            }
            ?>
        </div><br>
    </div>

    <?php
    require_once 'views/footer.php';
    ?>

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

        //SLIDER
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 3000);
        }
    </script>
</body>

</html>