<?php
require_once "metodosCrud.php";
require_once "../../conexion.php";

?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro de clientes</title>
    <link rel="stylesheet" type="text/css" href="../../../css/form.css">
    <link rel="stylesheet" href="../../../css/styles.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<html>

<?php
include '../../dark-theme.php';
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
        <div class="wrapper">
            <div class="title">
                <h1> Registrar cliente</h1>
            </div>
            <form action="insertar.php" method="post" class="form">
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
    <!--
    <div class="datos">
        <?php
        /*
        $obj = new metodos();
        $sql = "SELECT Clien_User,Clien_Contra,Clien_Nombre,Clien_Apellido from clientes";
        $datos = $obj->MostrarDatos($sql);
        if ($datos == null) {
        ?>

            <div class="title2">
                <h1> Clientes registrados</h1>
            </div>
            <div class="wrapper">No hay clientes registrados</div>
        <?php

        } else {
        ?>
            <div class="title2">
                <h1> Clientes registrados</h1>
            </div>
            <table style="border-collapse: collapse;" class="table">
                <tr>
                    <td>Usuario</td>
                    <td>Contraseña</td>
                    <td>Nombre</td>
                    <td>Apellido</td>
                    <td>Imagen</td>
                    <td>Actualizar</td>
                    <td>Eliminar</td>
                    <!--<td>a</td>-->
                </tr>
                <?php
                foreach ($datos as $key) {
                ?>
                    <tr>
                        <td><?php echo $key['Clien_User']; ?></td>
                        <td><?php echo $key['Clien_Contra']; ?></td>
                        <td><?php echo $key['Clien_Nombre']; ?></td>
                        <td><?php echo $key['Clien_Apellido']; ?></td>
                        <td><img width="500" src="data:image/jpg;base64,<?php //echo  base64_encode($key['Clien_Imagen']); ?>"></td>
                        <td><a href="editar.php?Clien_User=<?php echo $key['Clien_User']; ?>" class="edit">Editar</a></td>
                        <td><a href="Eliminar.php?Clien_User=<?php echo $key['Clien_User']; ?>" class="eliminar">Eliminar</a></td>
                    </tr>
            <?php
                }
            }
*/
        ?>
            </table>
    </div>
        -->
    <div>
        <a href="../Login/clientes/cliente.php" class="regresar btn btn-secondary">Regresar</a>
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