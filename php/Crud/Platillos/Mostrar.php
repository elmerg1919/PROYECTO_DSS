<?php
require_once "metodosCrud.php";
require_once "../../conexion.php";
session_start();
if (!isset($_SESSION['id_username'])) {
    header("Location: ../Login/admin/admin.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Platillos</title>
    <link rel="stylesheet" type="text/css" href="../../../css/form.css">
    <link rel="stylesheet" type="text/css" href="../../../css/styles.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<?php
include '../../dark-theme.php';
?>

<body>
    <div class="topnav">
        <a href="#">
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
        <a href="../Login/admin/cerrar-sesion.php">
            <p>Cerrar sesión</p>
        </a>
        <a href="#">
            <label class="switch">
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
                <h1> Platillos</h1>
            </div>

            <form action="insertar.php" method="post" enctype="Multipart/form-data" class="form">
                <legend>Ingresar platillos</legend><br>
                <div class="inputfield">
                    <label>Código:</label>
                    <input type="number" name="txtCodigo" id="" class="input" min="1" step="1" required>
                </div>

                <div class="inputfield">
                    <label>Nombre:</label>
                    <input type="text" name="txtNombre" id="" class="input" required>
                </div>
                <div class="inputfield">
                    <label>Categoria:</label>
                    <input type="text" name="txtCategoria" id="" class="input" required>
                </div>
                <div class="inputfield">
                    <label>Selecciona una imagen</label>
                    <input type="file" name="impimagen" id="archivo" class="input" required>
                    <label for="archivo" class="labelArchivo">
                        <span> Elegir un archivo&hellip;</span></label>

                </div>
                <button class="btn">Agregar</button>
            </form>
        </div>
    </div>

    <div class="datos">
        <?php
        $obj = new metodos();
        $sql = "SELECT Plat_Codigo,Plat_Nombre,Plat_Categoria,Plat_Imagen from platillo";
        $datos = $obj->MostrarDatos($sql);


        if ($datos == null) {
        ?>

            <div class="title2">
                <h1> Platillos registrados</h1>
            </div>
            <div class="wrapper">No hay platillos registrados</div>
        <?php

        } else {
        ?>
            <br><br><br>
            <div class="title2">
                <h1> Platillos Registrados</h1>
            </div>
            <table style="border-collapse: collapse;" class="table">
                <tr>
                    <td>Usuario</td>
                    <td>Contraseña</td>
                    <td>Nombre</td>
                    <td>Imagen</td>
                    <td colspan="2">Acciones</td>
                </tr>
                <?php
                foreach ($datos as $key) {
                ?>
                    <tr>
                        <td><?php echo $key['Plat_Codigo']; ?></td>
                        <td><?php echo $key['Plat_Nombre']; ?></td>
                        <td><?php echo $key['Plat_Categoria']; ?></td>
                        <td>
                            <img width="350" src="data:image/jpg;base64,<?php echo  base64_encode($key['Plat_Imagen']); ?>">
                        </td>

                        <!--<td><?php /*echo $key['Plat_Imagen'];?></td>-->
                <!--<td><?php/* echo $key['Admin_User'];*/ ?></td>-->
                        <td><a href="editar.php?Plat_Codigo=<?php echo $key['Plat_Codigo']; ?>" class="edit">Editar </a></td>
                        <td><a href="Eliminar.php?Plat_Codigo=<?php echo $key['Plat_Codigo']; ?>" class="eliminar">Eliminar</a></td>
                    </tr>
            <?php
                }
            }
            ?>
            </table>
            <a href="../Empleados/admin_home.php">
                <p class="btn btn-secondary">Regresar</p>
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