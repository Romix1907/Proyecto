<?php
  require_once("funciones.php");
  $emailLogueado=estaLogueado();
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="../css/menu.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Playfair+Display+SC:700i" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet"  integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<title>Chocolatemia</title>
</head>
<body>
  <header class="menu">
    <div class="nombreymenu">
      <h4 class="nombreh4"><a class="nombre" href="home.php">Chocolatemia</a></h4>
    </div>
    <!--<div class="">
    <img src="../Imagenes/img/menu2.png" alt="menu" class="hamburguesa">

    </div>-->
    <nav class="navegador">
      <input type="checkbox" class="menu-hamb-check" id="menu-hamb">
      <hr>
      <ul>
        <li><a href="home.php">Inicio</a></li>
<?php

if($emailLogueado==""){
  ?>
        <li><a href="register.php">Registrate</a></li>
        <li><a href="login.php">Iniciar Sesión</a></li>
<?php } ?>
        <li><a href="preguntas.php">Preguntas Frecuentes</a></li>
        <li><a href="#contacto">Contactate con nosotros</a></li>

<?php
if($emailLogueado!=""){
?>
    <li><a href="cerrarSesion.php">Cerrar Sesión</a></li>
<?php } ?>
      </ul>
      <label for="menu-hamb" class="label-hamb"><img src="../Imagenes/img/menu2.png" alt="menu" class="hamburguesa"></label>
    </nav>
  </header>
</body>
</html>
