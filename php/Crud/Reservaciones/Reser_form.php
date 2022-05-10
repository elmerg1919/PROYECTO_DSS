<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio</title>
    <link rel="stylesheet" type="text/css" href="../../../css/index.css">
    <link rel="stylesheet" type="text/css" href="../../../css/styles.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<form action="../Reservaciones/InsertarRes.php" method="post" enctype="Multipart/form-data" class="row g-3">

<figure>
<blockquote class="blockquote">
<p>FORMULARIO DE RESERVACIONES.</p>
</blockquote>
<figcaption class="blockquote-footer">
ingrese los siguientes datos <cite title="Source Title"></cite>
</figcaption>
</figure>

<div class="col-md-8">
<label  class="form-label">Nombre y Apellido</label>
<input type="text" name="txtnombre"  class="input" id="" required class="input"> <br>
</div>
<div class="col-md-5">
<label  class="form-label">Telefono</label>
<input type="text" name="txttelefono"  class="input" id="" required class="input"> <br>
</div>
<div class="col-md-5">
<label  class="form-label">Usuario</label>
<input type="text" name="txtusername"  class="input" id="" required class="input"> <br>
</div>
<div class="col-md-6">
<label  class="form-label">Correo Electronico</label>
<input type="text" name="txtcorreo"   class="input" id="" required class="input"> <br>
</div>
<div class="col-md-2">
<label  class="form-label">N° de Invitados</label>
<input type="number" name="txtcantidad" class="input" id="" required class="input" min="1" max="25"><br>
</div>

<div class="col-md-2">
<label  class="form-label">Fecha</label>
<input type="date" name="txtfecha" class="input" id="" required class="input"><br>
</div><br>
<br>
<div class="col-md-3">
<label for="inputState" class="form-label">Horarios Disponibles</label>
<select id="inputState" class="input" name="txthora">
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
</select>
</div>




<div class="col-12">
<button class="btn btn-primary" >RESERVAR</button>
</div>
</form>
</body>
</html>