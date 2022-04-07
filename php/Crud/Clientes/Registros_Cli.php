<?php
require_once "metodosCrud.php";
require_once "../../conexion.php";

?>

<!DOCTYPE html>
<html>

<head>
    <title>CRUD</title>
    <link rel="stylesheet" type="text/css" href="../../../css/form.css">
    <link rel="stylesheet" href="../../../css/styles.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

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
        <div class="wrapper">
            <div class="title">
                <h1> Registrar cliente</h1>
            </div>
            <form action="insertar_Regis.php" method="post" class="form">
                <div class="inputfield">
                    <label>Nombre de usuario:</label>
                    <input type="text" name="txtusername" id="" required class="input"> <br>
                </div>
                <div class="inputfield">
                    <label>Contraseña:</label>
                    <input type="password" name="txtpassword" id="" required class="input"><br>
                </div>
                <div class="inputfield">
                    <label>Nombre:</label>
                    <input type="text" name="txtnombre" id="" required class="input"><br>
                </div>
                <div class="inputfield">
                    <label>Apellido:</label>
                    <input type="text" name="txtapellido" id="" required class="input"><br>
                </div>
                <!--
                <div class="inputfield">
                    <label>Selecciona una imagen:</label>
                    <input type="file" name="impimagen" id="archivo" class="input">
                    <label for="archivo" class="labelArchivo">
                        <span> Elegir un archivo&hellip;</span></label>
                </div>
                -->                                                                            

                <button class="btn btn-success" name="registrarse">Registrarse</button>
            </form>

        </div>
    </div>


</body>

</html>