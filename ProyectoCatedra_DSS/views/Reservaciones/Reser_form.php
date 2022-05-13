<?php
require_once "../../models/MetodosRes.php";
require_once "../../libs/connection.php";
session_start();
if (!isset($_SESSION['id_username'])) {
  header("Location: ../Login/admin/admin.php");
}
$usuario = $_SESSION['id_username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inicio</title>
  <link rel="stylesheet" type="text/css" href="../../public/css/index.css">
  <link rel="stylesheet" type="text/css" href="../../public/css/styles.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
            <a class="nav-link" href="#">|</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Reservaciones/MisReserva.php">Reservaciones</a>
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
          <a href="../../controllers/cerrar-sesion.php" class="btn btn-danger">Cerrar sesión</a>
        </form>
      </div>
    </div>
  </nav>

  <form action="../../controllers/Reservaciones/InsertarRes.php" method="post" enctype="Multipart/form-data" class="row g-3">

    <figure>
      <blockquote class="blockquote">
        <p>FORMULARIO DE RESERVACIONES.</p>
      </blockquote>
      <figcaption class="blockquote-footer">
        ingrese los siguientes datos <cite title="Source Title"></cite>
      </figcaption>
    </figure>


    <label class="form-label">Nombre y Apellido</label>
    <input type="text" name="txtnombre" class="form-control input" id="" required class="input"> <br>

    <label class="form-label">Telefono</label>
    <input type="text" name="txttelefono" class="form-control input" id="" required class="input"> <br>

    <label class="form-label">Usuario</label>
    <input type="text" name="txtusername" class="form-control input" id="" required class="input"> <br>

    <label class="form-label">Correo Electronico</label>
    <input type="email" name="txtcorreo" class="form-control input" id="" required class="input"> <br>

    <label class="form-label">N° de Invitados</label>
    <input type="number" name="txtcantidad" class="form-control input" id="" required class="input" min="1" max="25"><br>


    <label class="form-label">Fecha</label>
    <input type="date" name="txtfecha" class="form-control input" id="" required class="input"><br>



    <label for="inputState" class="form-label">Horarios Disponibles</label>
    <select id="inputState" class="form-select" name="txthora">
      <option value=8:00:00>8:00 AM</option>
      <option value=9:00:00>9:00 AM</option>
      <option value=10:00:00>10:00 AM</option>
      <option value=11:00:00>11:00 AM</option>
      <option value=12:00:00>12:00 PM</option>
      <option value=13:00:00>1:00 PM</option>
      <option value=14:00:00>2:00 PM</option>
      <option value=15:00:00>3:00 PM</option>
      <option value=16:00:00>4:00 PM</option>
      <option value=17:00:00>5:00 PM</option>
      <option value=18:00:00>6:00 PM</option>
    </select>

    <div class="col-12">
      <button class="btn btn-primary">RESERVAR</button>
    </div>
  </form>

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