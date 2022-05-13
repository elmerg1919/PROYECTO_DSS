<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Costeña | Acerca de</title>
    <link rel="stylesheet" href="../public/css/styles.css" />
    <link rel="stylesheet" href="../public/css/about.css" />
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

    <div class="Todo">
        <!-- 1 -->
        <div class="historia">
            <div class="info">
                <h1>Historia</h1>
                <p>El negocio tiene como idea principal ofrecer comida saludable, Las tendencias más fuertes en la actualidad son: la cocina saludable, las parrillas, los bistrós, la cocina de autor y de fusión, todos a base de ingredientes de primera calidad (sobre todo en ciudades medianas y grandes). Siempre vigentes también, y con gran participación de mercado, están las cocinas internacionales de especialidad y la cocina tradicional salvadoreña. También queremos generar trabajo para jóvenes que estén dispuestos a darlo todo. En una industria donde hay de todo y para todos, con conceptos tradicionales muy probados o con propuestas totalmente innovadoras. Para grandes y para chicos, con pequeñas inversiones y conceptos modestos, o con propuestas gastronómicas que trascienden las fronteras.</p>
            </div>
        </div><br>
        <div class="wrapper">
            <img src="../public/img/wallpaper.jpg">
        </div><br>
        <!-- 2 -->
        <div class="mision-vision">
            <div class="title">
                <h1>Conoce más de nosotros</h1>
            </div>
            <div class="container-cards">
                <div class="card">
                    <h4>Misión</h4>
                    <p class="cardtext">Somos una empresa dedicada a brindar momentos inolvidables y servicios gastronómicos de alta calidad; ponemos todo nuestro “amor” y máximo empeño en beneficio de nuestros clientes; desarrollamos nuestro servicio a partir de los talentos y los valores de nuestros colaboradores, somos una empresa que día a día lucha por desarrollar mejores condiciones laborales y un mejor nivel de vida para nuestros colaboradores y sus familias, en beneficio de la organización. </p>
                </div>
                <div class="card">
                    <h4>Visión</h4>
                    <p class="cardtext">Ser reconocidos por brindar a nuestros clientes sensaciones agradables y momentos felices. Posicionarnos en el corazón de las familias y de todos los que nos visitan. Contribuir y aportar nuestro granito de arena, para generar un El Salvador feliz y en paz; que brinde un mejor futuro a nuestras próximas generaciones.</p>
                </div>
                <div class="card">
                    <h4>Valores</h4>
                    <ul class="cardtext">
                        <li>Respeto</li><br>
                        <li>Cortesía</li><br>
                        <li>Honestidad</li><br>
                        <li>Solidaridad</li>
                    </ul>

                </div>
            </div>

        </div>
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