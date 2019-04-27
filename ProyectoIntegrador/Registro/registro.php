<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Index/ecommercestyle.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display+SC:700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <title>Chocolatemia</title>
  </head>
  <body>

  <?php
  require('../Menu/menu.php');
  ?>
<main>
<form class="register" action="login.html" method="post">
  <br>
  <br>
<p>
<label for="">Nombre</label>
<input type="text" name="nombre" value="" placeholder="Ingrese su nombre aquí..." required>
</p>
<p>
<label for="nombre">Apellido</label>
<input id="nombre"type="text" name="apellido" value=""placeholder="Ingrese su apellido aquí..." required>
</p>
<p>
<label for="fecha">Fecha de Nacimiento</label>
<input id="fecha"type="text" name="fecha" value="" placeholder="DD/MM/AAAA">
</p>
<p>
<label for="email">Email</label>
<input id="email" type="email" name="email" value=""placeholder="nombre@nombre.com" required>
</p>
<p>
<label for="pass">Contraseña</label>
<input id="pass"type="password" name="pass" value="">
</p>
<br>
<p>
<label for="pais">País de Origen</label>
<select class="" name="pais" id="pais">
  <option value="ar">Argentina</option>
  <option value="ur">Uruguay</option>
  <option value="br">Brasil</option>
  <option value="ch">Chile</option>
  <option value="pr">Perú</option>
  <option value="bl">Bolivia</option>
  <option value="ot">Otros</option>
  </select>
</p>
<p>
<br>
<label for="genero">Género</label>
<br>
<input id="genero"type="radio" name="genero" value="f">F
<br>
<input id="genero"type="radio" name="genero" value="m">M
<br>
<input id="genero"type="radio" name="genero" value="o">Otros
</p>
<p>
<br>
<label for="favoritos">Seleccione su sabor preferido de Chocolate</label>
<br>
<input id="favoritos"type="checkbox" name="favoritos" value="b">Blanco
<br>
<input id="favoritos"type="checkbox" name="favoritos" value="a">Amargo
<br>
<input id="favoritos"type="checkbox" name="favorios" value="l">Con Leche
<br>
<input id="favoritos"type="checkbox" name="favoritos" value="fs">Con Frutos Secos
<br>
<input id="favoritos"type="checkbox" name="favoritos" value="r">Con Rellenos
</p>
<p>
<br>
<label class="com"for="com">COMENTARIOS</label>
<br>
<textarea id="com" name="com" rows="8" cols="80"></textarea>
</p>
<p>
<button type="submit" name="button">ENVIAR</button>
<button type="reset" name="button">REINICIAR</button>
</p>
<br>
<br>
</form>
</main>
<br>
<?php
include('../Footer/footer.php');
?>
</body>
</html
